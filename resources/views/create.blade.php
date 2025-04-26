<x-app-layout>
<div class="bg-gray-100 dark:bg-gray-900 font-sans flex items-center justify-center min-h-screen">
    <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md w-full max-w-lg">
        <h1 class="text-blue-600 text-4xl text-center mb-6 dark:text-white">Добавление задачи</h1>

        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-xl text-gray-700 dark:text-white" for="title">Название задачи</label>
                <input type="text" id="title" name="title" required 
                    class="mt-2 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            </div>

            <div class="mb-4 flex justify-center">
                <button type="submit" 
                    class="bg-blue-600 dark:bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition duration-300">
                    Добавить задачу
                </button>
            </div>
        </form>
    </div>
</div>
</x-app-layout>