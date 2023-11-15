<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Add Queue</title>
    <!-- Add your head content here -->
    <script>
        function showSuccessMessage() {
            alert('Queue created Successfully');
        }
    </script>
</head>

<body class="antialiased">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <form action="{{ route('queue.store') }}" method="POST" class="w-full max-w-sm"
                onsubmit="showSuccessMessage()">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Name:</label>
                    <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded">
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Create Queue</button>
            </form>
        </div>
    </div>
</body>

</html>