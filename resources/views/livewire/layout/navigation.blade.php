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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a href="{{ route('dashboard') }}" wire:navigate>
        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}" wire:navigate>
                {{ __('Dashboard') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('create.list') ? 'active' : '' }}" href="{{ route('create.list') }}" wire:navigate>
                {{ __('Todo List') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('file-uploads') ? 'active' : '' }}" href="{{ route('file-uploads') }}" wire:navigate>
                {{ __('File Uploads') }}
            </a>
        </li>
        <!--
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('import-users') ? 'active' : '' }}" href="{{ route('import-users') }}" wire:navigate>
                {{ __('Import Excel') }}
            </a>
        </li>-->
      </ul>
      <!-- Right-aligned dropdown -->
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <div x-data="{{ json_encode(['name' => auth()->user()->name]) }}" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="{{ route('profile') }}" wire:navigate>{{ __('Profile') }}</a></li>
            <li><button class="dropdown-item" wire:click="logout">{{ __('Log Out') }}</button></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>
