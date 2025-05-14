<!-- resources/views/tasks/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>قائمة المهام</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light p-5">

<div class="container">
    <h1 class="mb-4">قائمة المهام</h1>

    {{-- نموذج إضافة مهمة جديدة --}}
    <form action="{{ route('tasks.store') }}" method="POST" class="mb-4">
        @csrf
        <div class="input-group">
            <input type="text" name="title" class="form-control" placeholder="عنوان المهمة" required>
            <button type="submit" class="btn btn-primary">إضافة</button>
        </div>
        @error('title')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </form>

    {{-- عرض المهام --}}
    @foreach($tasks as $task)
        <div class="card mb-2">
            <div class="card-body d-flex justify-content-between align-items-center">
                <div>
                    <strong>{{ $task->title }}</strong>
                </div>
                <div>
                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-warning">تعديل</a>

                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد؟')">حذف</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach

</div>

</body>
</html>
