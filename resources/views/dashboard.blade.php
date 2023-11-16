<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Section for the first generated number -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <!-- Section for the count of queues -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Queue Count') }}</h3>
                    <p>{{ __('Total Queues: :count', ['count' => \App\Models\Queue::count()]) }}</p>
                </div>
            </div>

            <!-- Section for the delete button -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Delete Queues') }}</h3>
                    <form action="{{ route('queues.delete') }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">{{ __('Delete All Queues')
                            }}</button>
                    </form>
                </div>
            </div>

            <!-- Section for generating serving queue number -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Generate Serving Queue') }}</h3>
                    <form action="{{ route('queues.generate') }}" method="post">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ __('Generate Queue')
                            }}</button>
                    </form>
                </div>
            </div>

            <!-- Section for displaying the latest serving queue ID -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Latest Serving Queue ID') }}</h3>
                    @php
                    $latestServingQueue = \App\Models\ServingQueue::latest()->first();
                    @endphp
                    @if ($latestServingQueue)
                    <p>{{ __('Latest Queue ID: :id', ['id' => $latestServingQueue->id]) }}</p>
                    @else
                    <p>{{ __('No serving queues available.') }}</p>
                    @endif
                </div>
            </div>

            <!-- Section for deleting all records from serving_queue -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Reset Queues') }}</h3>
                    <form action="{{ route('queues.deleteAllServingQueues') }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">{{ __('Reset Queues')
                            }}</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @push('scripts')
    <script>
        // Refresh the page every 10 seconds
        setInterval(function () {
            location.reload();
        }, 10000);
    </script>
    @endpush

</x-app-layout>