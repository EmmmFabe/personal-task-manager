<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Personal Task Manager</h1>
        <p>Manage your tasks and stay organized.</p>
    </div>

    <div class="top-bar">
        <h2>My Tasks</h2>

        <a href="{{ route('tasks.create') }}" class="add-button">
            + Add New Task
        </a>
    </div>

    @if(session('success'))
        <div class="success">
            ✓ {{ session('success') }}
        </div>
    @endif

    <div class="task-count">
        Total Tasks: {{ $tasks->count() }}
    </div>

    @forelse($tasks as $task)

        <div class="task-card">

            <div class="task-header">

                <h2>{{ $task->task_name }}</h2>

                @if($task->status == 'Completed')
                    <span class="status completed">
                        ✓ Completed
                    </span>
                @else
                    <span class="status pending">
                        ⏳ Pending
                    </span>
                @endif

            </div>

            <div class="task-info">
                <strong>Description</strong>

                <p>
                    {{ $task->description ?? 'No description provided.' }}
                </p>
            </div>

            <div class="task-info">
                <strong>Due Date</strong>

                <p>
                    {{ $task->due_date ?? 'No due date' }}
                </p>
            </div>

            <div class="task-actions">

                <a href="{{ route('tasks.edit', $task->id) }}"
                   class="edit-button">
                    ✏ Edit
                </a>

                <form action="{{ route('tasks.destroy', $task->id) }}"
                      method="POST"
                      class="delete-form">

                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="delete-button"
                            onclick="return confirm('Are you sure you want to delete this task?')">
                        🗑 Delete
                    </button>

                </form>

            </div>

        </div>

    @empty

        <div class="empty-card">

            <h2>No Tasks Yet</h2>

            <p>
                You don't have any tasks yet.
                Create your first task to get started.
            </p>

            <a href="{{ route('tasks.create') }}"
               class="add-button">
                + Create Your First Task
            </a>

        </div>

    @endforelse

</div>

</body>
</html>