@extends('layouts.app')

@section('title', 'Conversation with ' . $otherUser['name'] . ' - Stay & Travel Morocco')

@section('styles')
<style>
    /* Import fonts */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap');
    
    /* Minimal custom styles */
    .message-container {
        height: 400px;
        overflow-y: auto;
        scroll-behavior: smooth;
    }
    
    .message-sent {
        background-color: #3084e3;
        color: white;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
        border-bottom-left-radius: 1rem;
    }
    
    .message-received {
        background-color: #f3f4f6;
        color: #1f2937;
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
        border-bottom-right-radius: 1rem;
    }
    
    .section-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 40px;
        background: linear-gradient(to right, #3084e3, #f65d17);
    }
</style>
@endsection

@section('content')
<div class="bg-gray-50 min-h-screen py-8">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto">
            <!-- Breadcrumbs -->
            <div class="mb-6 flex items-center text-sm">
                <a href="{{ route('messages.index') }}" class="text-blue-600 hover:text-blue-800 flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i> Back to Messages
                </a>
            </div>
            
            <!-- Page Header -->
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800 font-['Playfair_Display'] relative pb-2 section-title">
                    Conversation with {{ $otherUser['name'] }}
                </h1>
            </div>
            
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Header -->
                <div class="px-6 py-4 bg-blue-600 text-white flex items-center">
                    @if($otherUser['profile_image'])
                        <img src="{{ asset('storage/profiles/' . $otherUser['profile_image']) }}" 
                            alt="{{ $otherUser['name'] }}" 
                            class="w-12 h-12 rounded-full object-cover border-2 border-white mr-3">
                    @else
                        <div class="w-12 h-12 rounded-full bg-blue-500 flex items-center justify-center mr-3 border-2 border-white">
                            <i class="fas fa-user text-white text-xl"></i>
                        </div>
                    @endif
                    <div>
                        <h2 class="font-bold text-lg">{{ $otherUser['name'] }}</h2>
                        <p class="text-sm text-blue-100">{{ ucfirst($otherUser['role'] ?? 'User') }}</p>
                    </div>
                </div>
                
                <!-- Messages -->
                <div class="p-6 message-container" id="message-container">
                    @if(count($messages) > 0)
                        @foreach($messages as $message)
                            <div class="mb-5 {{ $message->sender_id == Auth::id() ? 'text-right' : 'text-left' }}">
                                <div class="inline-block px-4 py-3 max-w-xs sm:max-w-md 
                                    {{ $message->sender_id == Auth::id() ? 'message-sent' : 'message-received' }}">
                                    <p class="break-words">{{ $message->content }}</p>
                                    <p class="text-xs {{ $message->sender_id == Auth::id() ? 'text-blue-100' : 'text-gray-500' }} mt-1 flex justify-end items-center">
                                        {{ date('M d, h:i A', strtotime($message->created_at)) }}
                                        @if($message->sender_id == Auth::id())
                                            @if($message->is_read)
                                                <span><i class="fas fa-check-double ml-1"></i></span>
                                            @else
                                                <span><i class="fas fa-check ml-1"></i></span>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="h-64 flex items-center justify-center">
                            <div class="text-center text-gray-500">
                                <div class="text-5xl mb-4 text-blue-200"><i class="far fa-comment-dots"></i></div>
                                <p class="font-medium text-gray-600">No messages yet</p>
                                <p class="text-sm">Start the conversation by sending a message below.</p>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Message Form -->
                <div class="border-t border-gray-200 p-4 bg-gray-50">
                    <form method="POST" action="{{ route('messages.send') }}" id="message-form">
                        @csrf
                        <input type="hidden" name="receiver_id" value="{{ $otherUser['id'] }}">
                        <div class="flex">
                            <textarea name="content" id="content" rows="2" required 
                                placeholder="Type your message here..."
                                class="flex-1 resize-none rounded-lg shadow-sm py-3 px-4 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 border border-gray-300"></textarea>
                            <button type="submit" 
                                class="ml-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg px-5 flex items-center justify-center transition-colors duration-200">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                        @error('content')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="text-xs text-gray-500 mt-2">Press Enter to send, Shift+Enter for a new line</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scroll to bottom of message container
        const messageContainer = document.getElementById('message-container');
        messageContainer.scrollTop = messageContainer.scrollHeight;
        
        // Submit form on Enter key (but allow Shift+Enter for new line)
        const textarea = document.getElementById('content');
        textarea.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' && !e.shiftKey) {
                e.preventDefault();
                document.getElementById('message-form').submit();
            }
        });
    });
</script>
@endsection

@endsection