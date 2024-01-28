<x-app-layout>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


    <style>
        button {
            padding: 8px;
            margin-top: 10px;
            margin-left: 17px;
        }
    </style>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Queue List') }}
        </h2>
    </x-slot>

    @if(session('success'))
    <div class="bg-green-400">
        {!! session('success') !!}
    </div>
    @elseif(session('error'))
    <div class="bg-red-400">
        {{ session('error') }}
    </div>
    @endif

    <div class="relative overflow-x-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Queue #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Type of Transaction
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Registrar
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($queues as $queue)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $queue->id }}
                    </th>
                    <td class="px-6 py-4">
                        {{$queue->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$queue->type_of_transaction}}
                    </td>
                    <td class="px-6 py-4
                    @if($queue->status == 'Queueing') bg-red-300 
                    @elseif($queue->status == 'In Progress') bg-yellow-100 
                    @elseif($queue->status == 'Done') bg-green-100 
                    @else bg-white @endif">
                        {{$queue->status}}
                    </td>
                    <td class=" px-6 py-4">
                        {{$queue->registrar}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $queues->links() !!}

        <div class="flex flex-row">
            <form method="POST" action="{{ route('update.queue.status') }}" onsubmit="inProgressMessage()">
                @csrf
                <button type="submit" class="bg-blue-500 hover:bg-blue-400 rounded-md">
                    Take a Queue
                </button>
            </form>


            <form method="POST" action="{{ route('mark.as.done') }}" onsubmit="markAsDone()">
                @csrf
                <button type="submit" class="bg-green-500 hover:bg-blue-400 rounded-md">
                    Mark as Done
                </button>
            </form>


            <form action="{{ route('queues.delete') }}" method="post">
                @csrf
                @method('delete')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded ml-96">{{ __('Delete All Queues')
                    }}</button>
            </form>

        </div>
    </div>



    </div>

    <script>
        function inProgressMessage() {
            alert('Queue Updated Successfully');
        }

        function markAsDone() {
            alert('Button Clicked!');
        }
    </script>

</x-app-layout>