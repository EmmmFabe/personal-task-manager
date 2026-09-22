<!DOCTYPE html>
<html>
<head>
    <title>Edit Task - Personal Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Edit Task</h1>
        <p>Update the details of your task.</p>
    </div>

    <div class="form-card">

        <form action="{{ route('tasks.update', $task->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="task_name">Task Name</label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    value="{{ old('task_name', $task->task_name) }}"
                    required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description">{{ old('description', $task->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>

                <select id="status" name="status">

                    <option value="Pending"
                        {{ old('status', $task->status) == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ old('status', $task->status) == 'Completed' ? 'selected' : '' }}>
                        Completed
                    </option>

                </select>
            </div>

            <div class="form-group">
                <label for="due_date">Due Date</label>

                <input
                    type="date"
                    id="due_date"
                    name="due_date"
                    value="{{ old('due_date', $task->due_date) }}">
            </div>

            <button type="submit" class="submit-button">
                Update Task
            </button>

        </form>

        <a href="{{ route('tasks.index') }}" class="back-link">
            ← Back to Tasks
        </a>

    </div>

</div>

</body>
</html>