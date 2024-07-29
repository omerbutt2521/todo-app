<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel APP') }}</title>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @livewire('layout.navigation')    
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Todo App</h2>
                    </div>
                    <div class="card-body">
                    @livewire('todo-list.create-list')
                    @livewire('todo-list.todo-list-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include EditTodoListModal component -->
    @livewire('todo-list.edit-todo-list-modal')
    @livewireScripts
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <x-livewire-alert::scripts />
</body>
</html>