<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel APP') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>Todo App</h2>
                    </div>
                    <div class="card-body">
                    @include('livewire.todo-list.create')
                    @livewire('todo-list.todo-list-table')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Include EditTodoListModal component -->
    @livewire('todo-list.edit-todo-list-modal')
    @livewireScripts
</body>
</html>