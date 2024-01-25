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
        <div class="justify-center gap-5 grid">
            <p>Queue ID: <span id="queueNumber">{{ $queue->id }}</span></p>
            <p>Queue Name: <span id="queueName">{{ $queue->name }}</span></p>
            <p>Type of Transaction: <span id="typeOfTransaction">{{ $queue->type_of_transaction }}</span></p>
            <!-- You can add more details or customize the display as needed -->

            <!-- Button to trigger print -->
            <button onclick="printQueueDetails()" class="bg-blue-500 text-white px-4 py-2 rounded">Print Queue
                Details</button>
        </div>
    </div>

    <script>
        function printQueueDetails() {
            var queueNumber = document.getElementById('queueNumber').innerText;
            var queueName = document.getElementById('queueName').innerText;
            var typeOfTransaction = document.getElementById('typeOfTransaction').innerText;

            var printWindow = window.open('', '_blank');
            printWindow.document.write('<html><head><title>Queue Details</title>');
            printWindow.document.write('<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flowbite/css/flowbite.css"></head><body class="font-sans antialiased bg-gray-100">');
            printWindow.document.write('<div class="container mx-auto p-8">');
            printWindow.document.write('<h1 class="text-3xl font-bold mb-6">Queue Details</h1>');
            printWindow.document.write('<p class="text-lg">Queue ID: ' + queueNumber + '</p>');
            printWindow.document.write('<p class="text-lg">Queue Name: ' + queueName + '</p>');
            printWindow.document.write('<p class="text-lg">Type of Transaction: ' + typeOfTransaction + '</p>');
            printWindow.document.write('</div></body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>

</html>