@extends('layouts.app')

@section('title', 'Messages - Stay & Travel Morocco')

@section('styles')
<style>
    /* Import fonts */
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap');
    
    /* Global styles and variables */
    :root {
        /* Primary Colors */
        --primary-900: #0f3460;
        --primary-800: #16498c;
        --primary-700: #1e5daa;
        --primary-600: #2571c8;
        --primary-500: #3084e3;
        --primary-400: #5a9fe8;
        --primary-300: #84b9ee;
        --primary-200: #aed3f4;
        --primary-100: #d9ecfa;
        --primary-50: #eef7ff;
        
        /* Accent Colors */
        --accent-900: #8c2a0d;
        --accent-800: #b33410;
        --accent-700: #d03f12;
        --accent-600: #e84914;
        --accent-500: #f65d17;
        --accent-400: #ff7e42;
        --accent-300: #ff9a69;
        --accent-200: #ffb690;
        --accent-100: #ffd2b8;
        --accent-50: #fff0e8;
        
        /* Neutrals */
        --neutral-900: #111827;
        --neutral-800: #1f2937;
        --neutral-700: #374151;
        --neutral-600: #4b5563;
        --neutral-500: #6b7280;
        --neutral-400: #9ca3af;
        --neutral-300: #d1d5db;
        --neutral-200: #e5e7eb;
        --neutral-100: #f3f4f6;
        --neutral-50: #f9fafb;
        
        /* Functional Colors */
        --success-500: #10b981;
        --success-100: #d1fae5;
        --warning-500: #f59e0b;
        --warning-100: #fef3c7;
        --error-500: #ef4444;
        --error-100: #fee2e2;
        --info-500: #3b82f6;
        --info-100: #dbeafe;
        
        /* Fonts */
        --font-primary: 'Poppins', sans-serif;
        --font-display: 'Playfair Display', serif;
    }
    
    /* Page styles */
    .page-container {
        background-color: var(--neutral-50);
        min-height: calc(100vh - 64px);
    }
    
    /* Page header */
    .page-header {
        margin-bottom: 1.5rem;
    }
    
    .page-title {
        font-family: var(--font-display);
        font-size: 1.75rem;
        font-weight: 600;
        color: var(--neutral-800);
        position: relative;
        padding-bottom: 0.5rem;
    }
    
    .page-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        height: 3px;
        width: 40px;
        background: linear-gradient(to right, var(--primary-500), var(--accent-500));
    }
    
    /* Messages container */
    .messages-container {
        background-color: white;
        border-radius: 1rem;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    }
    
    .messages-header {
        background-color: var(--primary-50);
        border-bottom: 1px solid var(--primary-100);
        padding: 1.25rem 1.5rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    
    .messages-header-content h2 {
        color: var(--primary-700);
        font-weight: 600;
        font-size: 1.125rem;
        margin-bottom: 0.25rem;
    }
    
    .messages-count {
        color: var(--primary-500);
        font-size: 0.875rem;
    }
    
    .unread-badge {
        background-color: var(--error-500);
        color: white;
        border-radius: 2rem;
        padding: 0.25rem 0.75rem;
        font-size: 0.75rem;
        font-weight: 600;
    }
    
    /* Conversation list */
    .conversation-list {
        max-height: 600px;
        overflow-y: auto;
    }
    
    .conversation-item {
        padding: 1.25rem 1.5rem;
        border-bottom: 1px solid var(--neutral-200);
        transition: all 0.2s;
        display: flex;
        align-items: flex-start;
    }
    
    .conversation-item:hover {
        background-color: var(--neutral-50);
    }
    
    .conversation-item:last-child {
        border-bottom: none;
    }
    
    .avatar-container {
        position: relative;
        margin-right: 1rem;
        flex-shrink: 0;
    }
    
    .avatar {
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        overflow: hidden;
    }
    
    .avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .avatar-placeholder {
        width: 100%;
        height: 100%;
        background-color: var(--primary-100);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-500);
    }
    
    .unread-indicator {
        position: absolute;
        top: -4px;
        right: -4px;
        background-color: var(--error-500);
        color: white;
        border-radius: 50%;
        width: 1.25rem;
        height: 1.25rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.75rem;
        font-weight: 600;
        border: 2px solid white;
    }
    
    .conversation-content {
        flex: 1;
        min-width: 0; /* Enables text-overflow to work properly */
    }
    
    .conversation-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 0.5rem;
    }
    
    .user-name {
        font-weight: 600;
        color: var(--neutral-800);
    }
    
    .message-time {
        font-size: 0.75rem;
        color: var(--neutral-500);
    }
    
    .message-preview {
        color: var(--neutral-600);
        font-size: 0.875rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    
    .from-me {
        color: var(--neutral-500);
        font-weight: 500;
    }
    
    /* Empty state */
    .empty-state {
        padding: 4rem 2rem;
        text-align: center;
    }
    
    .empty-icon {
        font-size: 4rem;
        color: var(--primary-200);
        margin-bottom: 1.5rem;
    }
    
    .empty-title {
        font-family: var(--font-display);
        font-weight: 600;
        font-size: 1.5rem;
        color: var(--neutral-700);
        margin-bottom: 0.75rem;
    }
    
    .empty-description {
        color: var(--neutral-500);
        max-width: 400px;
        margin: 0 auto 1.5rem;
    }
    
    .empty-action {
        display: inline-flex;
        align-items: center;
        padding: 0.75rem 1.5rem;
        background-color: var(--primary-500);
        color: white;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s;
    }
    
    .empty-action:hover {
        background-color: var(--primary-600);
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }
    
    .empty-action i {
        margin-right: 0.5rem;
    }
    
    /* Responsive design */
    @media (max-width: 768px) {
        .page-title {
            font-size: 1.5rem;
        }
        
        .messages-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .unread-badge {
            margin-top: 0.5rem;
        }
        
        .conversation-item {
            padding: 1rem;
        }
    }
</style>
@endsection

@section('content')
<div class="page-container py-8">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-6">
            <!-- Sidebar -->
            <div class="w-full md:w-1/4">
                @include('partials.sidebar', ['sidebar_title' => 'Messages'])
            </div>
            
            <!-- Main Content -->
            <div class="w-full md:w-3/4">
                <div class="page-header">
                    <h1 class="page-title">My Messages</h1>
                </div>
                
                <div class="messages-container">
                    @if(count($conversations) > 0)
                        <div class="messages-header">
                            <div class="messages-header-content">
                                <h2>Your Conversations</h2>
                                <p class="messages-count">{{ count($conversations) }} conversation(s)</p>
                            </div>
                            @if($unreadTotal > 0)
                                <div class="unread-badge">
                                    <i class="fas fa-bell mr-1"></i> {{ $unreadTotal }} unread
                                </div>
                            @endif
                        </div>
                        
                        <div class="conversation-list">
                            @foreach($conversations as $conversation)
                                <a href="{{ route('messages.conversation', $conversation['user']['id']) }}" class="conversation-item block">
                                    <div class="avatar-container">
                                        @if($conversation['user']['profile_image'])
                                            <div class="avatar">
                                                <img src="{{ asset('storage/profiles/' . $conversation['user']['profile_image']) }}" alt="{{ $conversation['user']['name'] }}">
                                            </div>
                                        @else
                                            <div class="avatar">
                                                <div class="avatar-placeholder">
                                                    <i class="fas fa-user"></i>
                                                </div>
                                            </div>
                                        @endif
                                        
                                        @if($conversation['unread_count'] > 0)
                                            <span class="unread-indicator">
                                                {{ $conversation['unread_count'] }}
                                            </span>
                                        @endif
                                    </div>
                                    
                                    <div class="conversation-content">
                                        <div class="conversation-header">
                                            <span class="user-name">{{ $conversation['user']['name'] }}</span>
                                            <span class="message-time">{{ \Carbon\Carbon::parse($conversation['last_message']['created_at'])->diffForHumans() }}</span>
                                        </div>
                                        
                                        <p class="message-preview">
                                            @if($conversation['last_message']['is_from_me'])
                                                <span class="from-me">You:</span>
                                            @endif
                                            {{ $conversation['last_message']['content'] }}
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h2 class="empty-title">No messages yet</h2>
                            <p class="empty-description">
                                When you book a property or communicate with hosts/travelers, your messages will appear here.
                            </p>
                            <a href="{{ route('properties.index') }}" class="empty-action">
                                <i class="fas fa-search"></i> Browse Properties
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection