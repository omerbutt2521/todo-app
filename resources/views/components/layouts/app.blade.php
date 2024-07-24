<!DOCTYPE html>
<html>
<head>
    <title>Todo App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @livewireStyles
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
                    @livewire('todo-list.create-list')
                    </div>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>