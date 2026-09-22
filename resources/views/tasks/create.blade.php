<!DOCTYPE html>
<html>
<head>
    <title>Add Task - Personal Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Add New Task</h1>
        <p>Create a new task for your task manager.</p>
    </div>

    <div class="form-card">

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="task_name">Task Name</label>

                <input
                    type="text"
                    id="task_name"
                    name="task_name"
                    placeholder="Enter task name"
                    value="{{ old('task_name') }}"
                    required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>

                <textarea
                    id="description"
                    name="description"
                    placeholder="Enter task description">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>

                <select id="status" name="status">

                    <option value="Pending"
                        {{ old('status') == 'Pending' ? 'selected' : '' }}>
                        Pending
                    </option>

                    <option value="Completed"
                        {{ old('status') == 'Completed' ? 'selected' : '' }}>
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
                    value="{{ old('due_date') }}">
            </div>

            <button type="submit" class="submit-button">
                Save Task
            </button>

        </form>

        <a href="{{ route('tasks.index') }}" class="back-link">
            ← Back to Tasks
        </a>

    </div>

</div>

</body>
</html>