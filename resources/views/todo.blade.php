<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Todo Page</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Страница Todo</h1>
        <div class="bg-white shadow-lg rounded-lg p-4">
            <ul class="space-y-4">
                @foreach($tasks as $todo)
                <li class="flex justify-between items-center p-3 bg-gray-50 rounded-lg shadow-sm">
                    <span class="text-xl text-gray-700">{{ $todo->title }}</span>


                    <span class="flex items-center space-x-2">
                    <label for="modal-{{ $todo->id }}" class="cursor-pointer hover:text-blue-700 text-gray-500 pr-4">
                            <i class="fas fa-pencil-alt"></i>
                        </label>

                        <input type="checkbox" id="modal-{{ $todo->id }}" class="hidden peer">
                        <div
                            class="fixed inset-0 bg-black/30 hidden peer-checked:flex items-center justify-center z-50">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-96 relative">
                                <label for="modal-{{ $todo->id }}"
                                    class="absolute top-2 right-3 text-gray-500 cursor-pointer text-xl">&times;</label>

                                <h2 class="text-2xl font-semibold mb-4">Редактировать задачу</h2>
                                <form action="{{ route('tasks.update.title', $todo->id) }}" method="POST" class="space-y-4">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="title" value="{{ $todo->title }}"
                                        class="w-full border border-gray-300 p-2 rounded" required>
                                    <button type="submit"
                                        class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Сохранить</button>
                                </form>
                            </div>
                        </div>
                        <form action="{{ route('tasks.update', $todo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                class="px-4 py-2 rounded-full 
                                    {{ $todo->completed ? 'bg-green-500 text-white hover:bg-green-700' : 'bg-red-500 hover:bg-red-700 text-white' }} 
                                    hover:bg-opacity-80 focus:outline-none">
                                {{ $todo->completed ? 'Выполнено' : 'Не выполнено' }}
                            </button>
                        </form>

                        <form action="{{ route('tasks.delete', $todo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="hover:text-red-700 text-gray-500 focus:outline-none pl-4">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </span>
                </li>
                @endforeach
            </ul>
            <div class="text-center mt-6">
                <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white text-xl text- px-4 py-2 rounded-lg hover:bg-blue-700">
                    +
                </a>
            </div>
        </div>
    </div>
</body>

</html>