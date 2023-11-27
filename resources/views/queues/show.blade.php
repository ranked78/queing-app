<!-- resources/views/queue/show.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Add your head content here -->
    <title>Queue Number Generated</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>

<body class="antialiased">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center gap-5">
            <p>Queue ID: <span id="queueNumber">{{ $queue->id }}</span></p>
            <!-- You can add more details or customize the display as needed -->

            <!-- Button to trigger print -->
            <button onclick="printQueueNumber()" class="bg-blue-500 text-white px-4 py-2 rounded">Print Queue
                Number</button>
        </div>
    </div>

    <script>
        function printQueueNumber() {
            var queueNumber = document.getElementById('queueNumber').innerText;
            var printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Queue Number</title>');
            printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite/css/flowbite.css"></head><body class="font-sans antialiased bg-gray-100">');
            printWindow.document.write('<div class="container mx-auto p-8">');
            printWindow.document.write('<h1 class="text-3xl font-bold mb-6">Queue ID</h1>');
            printWindow.document.write('<p class="text-lg">Queue ID: ' + queueNumber + '</p>');
            printWindow.document.write('</div></body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>