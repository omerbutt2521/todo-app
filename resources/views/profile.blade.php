<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container"> <!-- Replace max-w-7xl with container class -->
            <div class="row justify-content-center"> <!-- Replace sm:px-6 lg:px-8 with justify-content-center -->
                <div class="col-lg-8"> <!-- Replace sm:rounded-lg with col-lg-8 -->

                    <!-- Update Profile Information Form -->
                    <div class="card mb-4">
                        <div class="card-header">
                            {{ __('Update Profile Information') }}
                        </div>
                        <div class="card-body">
                            <livewire:profile.update-profile-information-form />
                        </div>
                    </div>

                    <!-- Update Password Form -->
                    <div class="card mb-4">
                        <div class="card-header">
                            {{ __('Update Password') }}
                        </div>
                        <div class="card-body">
                            <livewire:profile.update-password-form />
                        </div>
                    </div>

                    <!-- Delete User Form -->
                    <div class="card">
                        <div class="card-header">
                            {{ __('Delete Account') }}
                        </div>
                        <div class="card-body">
                            <livewire:profile.delete-user-form />
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
