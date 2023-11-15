<!-- resources/views/queue/show.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Add your head content here -->
    <title>Queue Number Generated</title>
</head>

<body class="antialiased">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <p>Queue ID: {{ $queue->id }}</p>
            <!-- You can add more details or customize the display as needed -->
        </div>
    </div>
</body>

</html>