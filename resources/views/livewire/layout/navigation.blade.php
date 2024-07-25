<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Primary Navigation Menu -->
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center h-100">
            <div class="d-flex">
                <!-- Logo -->
                <div class="me-3 d-flex align-items-center">
                    <a href="{{ route('dashboard') }}" wire:navigate>
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="d-none d-sm-flex space-x-3">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="d-none d-sm-flex space-x-3">
                    <x-nav-link :href="route('create.list')" :active="request()->routeIs('create.list')" wire:navigate>
                        {{ __('Todo List') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="d-none d-sm-flex align-items-center ms-3">
                <div class="dropdown">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>

                        <div class="ms-1">
                            <svg class="bi bi-person-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 0C5.78 0 4 1.78 4 4c0 2.017 1.328 3.755 3.169 4.382.117.964.362 1.823.717 2.564a5.347 5.347 0 0 0-2.886 1.432A3.974 3.974 0 0 1 2 10c0-2.22 1.78-4 4-4h4c2.22 0 4 1.78 4 4 0-1.149-.496-2.193-1.286-2.918a5.347 5.347 0 0 0-2.886-1.432c.355-.74.6-1.6.717-2.564C10.672 7.755 12 6.017 12 4c0-2.22-1.78-4-4-4z"/>
                            </svg>
                        </div>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                        <li><a class="dropdown-item" href="{{ route('profile') }}" wire:navigate>{{ __('Profile') }}</a></li>
                        <li><button class="dropdown-item" wire:click="logout">{{ __('Log Out') }}</button></li>
                    </ul>
                </div>
            </div>

            <!-- Hamburger -->
            <div class="ms-2 d-flex align-items-center">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </li>
        </ul>

        <!-- Responsive Settings Options -->
        <div class="mt-3 mt-lg-0">
            <div class="px-4">
                <div class="fw-bold text-base text-gray-800" x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
                <div class="text-sm text-gray-500">{{ auth()->user()->email }}</div>
            </div>

            <div class="mt-3">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <x-responsive-nav-link :href="route('profile')" wire:navigate>
                            {{ __('Profile') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="nav-item">
                        <button class="dropdown-item w-100 text-start" wire:click="logout">{{ __('Log Out') }}</button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
