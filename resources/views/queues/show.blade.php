<!-- resources/views/queue/show.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Add your head content here -->
    <title>Queue Number Generated</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
    <style>
        .blue {
            background: #0F6184;
            color: white;
            padding: 15px;
        }

        .qId {
            color: #000;
            font-family: Inter;
            font-size: 175px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }

        .name-transaction {
            color: #000;
            font-family: Inter;
            font-size: 31px;
            font-style: normal;
            font-weight: 400;
            line-height: normal;
        }
    </style>
</head>

<body class="antialiased">
    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="justify-center gap-5 grid" style="background: #D9D9D9;">
            <div class="blue text-center">Queue Number is Successfully Generated</div>
            <p class="qId text-center"><span id="queueNumber">{{ $queue->id }}</span></p>
            <p class="name-transaction"><span id="queueName">{{ $queue->name }} -</span> <span id="typeOfTransaction">{{
                    $queue->type_of_transaction }}</span></p>

            <!-- You can add more details or customize the display as needed -->

            <!-- Button to trigger print -->
            <div>
                <a href="{{ route('queue.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Queue Again</a>
                <button onclick="printQueueDetails()" class="bg-blue-500 text-white px-4 py-2 rounded">Print Queue
                    Details</button>
            </div>

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