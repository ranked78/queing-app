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
            printWindow.document.write('<html><head><title>Queue Number</title></head><body>');
            printWindow.document.write('<p>Queue ID: ' + queueNumber + '</p>');
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</body>

</html>