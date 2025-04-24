<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Добавить задачу</title>
</head>
<body class="bg-gray-100 font-sans flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-lg">
        <h1 class="text-blue-600 text-4xl text-center mb-6">Добавление задачи</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-xl text-gray-700" for="title">Название задачи</label>
                <input type="text" id="title" name="title" required 
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-4 flex justify-center">
                <button type="submit" 
                    class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                    Добавить задачу
                </button>
            </div>
        </form>
    </div>

</body>
</html>