<!-- resources/views/tasks/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>تعديل المهمة</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-5">

<div class="container">
    <h1 class="mb-4">تعديل المهمة</h1>

    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">عنوان المهمة</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $task->title }}" required>
            @error('title')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">تحديث</button>
        <a href="{{ url('/') }}" class="btn btn-secondary">رجوع</a>
    </form>
</div>

</body>
</html>
