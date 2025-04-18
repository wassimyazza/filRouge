<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Repositories\TransactionRepository;
use App\Repositories\ReservationRepository;
use Stripe\Webhook;
use Stripe\Exception\SignatureVerificationException;

class StripeWebhookController extends Controller
{
    protected $transactionRepository;
    protected $reservationRepository;

    public function __construct(
        TransactionRepository $transactionRepository,
        ReservationRepository $reservationRepository
    ) {
        $this->transactionRepository = $transactionRepository;
        $this->reservationRepository = $reservationRepository;
    }

    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent(
                $payload, $sigHeader, $endpointSecret
            );
        } catch (SignatureVerificationException $e) {
            // Invalid signature
            Log::error('Webhook signature verification failed: ' . $e->getMessage());
            return response()->json(['error' => 'Webhook signature verification failed'], 400);
        } catch (\Exception $e) {
            Log::error('Webhook error: ' . $e->getMessage());
            return response()->json(['error' => 'Webhook error'], 400);
        }

        switch ($event->type) {
            case 'payment_intent.succeeded':
                $paymentIntent = $event->data->object;
                $this->handleSuccessfulPayment($paymentIntent);
                break;
            case 'payment_intent.payment_failed':
                $paymentIntent = $event->data->object;
                $this->handleFailedPayment($paymentIntent);
                break;
            default:
                Log::info('Received unknown event type: ' . $event->type);
        }

        return response()->json(['status' => 'success']);
    }

    private function handleSuccessfulPayment($paymentIntent)
    {
        $transaction = $this->transactionRepository->findByPaymentId($paymentIntent->id);
        
        if (!$transaction) {
            Log::error('Transaction not found for payment intent: ' . $paymentIntent->id);
            return;
        }
        
        $reservation_id = $transaction->reservation_id;

        $this->transactionRepository->update($transaction->id, [
            'status' => 'completed'
        ]);

        $this->reservationRepository->update($reservation_id, [
            'status' => 'confirmed'
        ]);

        Log::info('Payment successful and reservation confirmed for reservation ID: ' . $reservation_id);
    }

    private function handleFailedPayment($paymentIntent)
    {
        $transaction = $this->transactionRepository->findByPaymentId($paymentIntent->id);
        
        if (!$transaction) {
            Log::error('Transaction not found for payment intent: ' . $paymentIntent->id);
            return;
        }
        
        $reservation_id = $transaction->reservation_id;

        $this->transactionRepository->update($transaction->id, [
            'status' => 'failed'
        ]);

        Log::info('Payment failed for reservation ID: ' . $reservation_id);
    }
}