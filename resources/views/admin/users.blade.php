@extends('layouts.app')

@section('title', 'User Management - Admin Dashboard - Stay & Travel')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 mb-8 md:mb-0 md:pr-6">
            @include('partials.sidebar', ['sidebar_title' => 'Admin Dashboard'])
        </div>
        
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-900">User Management</h1>
                <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:text-blue-800">
                    <i class="fas fa-arrow-left mr-1"></i> Back to Dashboard
                </a>
            </div>
            
            <!-- Filter Tabs -->
            <div class="bg-white rounded-lg shadow-md mb-6">
                <div class="flex border-b border-gray-200">
                    <a href="{{ route('admin.users') }}" class="px-4 py-3 text-center flex-1 {{ !$role ? 'text-blue-600 border-b-2 border-blue-600 font-medium' : 'text-gray-600 hover:text-gray-800' }}">
                        All Users
                    </a>
                    <a href="{{ route('admin.users', ['role' => 'traveler']) }}" class="px-4 py-3 text-center flex-1 {{ $role == 'traveler' ? 'text-blue-600 border-b-2 border-blue-600 font-medium' : 'text-gray-600 hover:text-gray-800' }}">
                        Travelers
                    </a>
                    <a href="{{ route('admin.users', ['role' => 'host']) }}" class="px-4 py-3 text-center flex-1 {{ $role == 'host' ? 'text-blue-600 border-b-2 border-blue-600 font-medium' : 'text-gray-600 hover:text-gray-800' }}">
                        Hosts
                    </a>
                    <a href="{{ route('admin.users', ['role' => 'admin']) }}" class="px-4 py-3 text-center flex-1 {{ $role == 'admin' ? 'text-blue-600 border-b-2 border-blue-600 font-medium' : 'text-gray-600 hover:text-gray-800' }}">
                        Admins
                    </a>
                </div>
            </div>
            
            <!-- Users Table -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="px-6 py-4 bg-blue-50 border-b border-blue-100">
                    <div class="flex justify-between items-center">
                        <h2 class="font-semibold text-blue-800">
                            {{ $role ? ucfirst($role) . 's' : 'All Users' }}
                        </h2>
                        <div class="text-sm text-blue-600">
                            {{ count($users) }} users found
                        </div>
                    </div>
                </div>
                
                @if(count($users) > 0)
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Contact
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    @if($user->profile_image)
                                                        <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/profiles/' . $user->profile_image) }}" alt="{{ $user->name }}">
                                                    @else
                                                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center">
                                                            <i class="fas fa-user text-blue-500"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                                    <div class="text-sm text-gray-500">ID: {{ $user->id }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full
                                                {{ $user->role == 'admin' ? 'bg-purple-100 text-purple-800' : '' }}
                                                {{ $user->role == 'host' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $user->role == 'traveler' ? 'bg-blue-100 text-blue-800' : '' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                            <div class="text-sm text-gray-500">{{ $user->phone ?? 'No phone' }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                                {{ $user->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                {{ $user->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if(!$user->isAdmin())
                                                <form method="POST" action="{{ route('admin.users.toggle', $user->id) }}" class="inline-block">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit" class="text-blue-600 hover:text-blue-900 mr-3">
                                                        {{ $user->is_active ? 'Deactivate' : 'Activate' }}
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-gray-400">No actions</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="p-6 text-center">
                        <p class="text-gray-500">No users found matching the selected criteria.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
