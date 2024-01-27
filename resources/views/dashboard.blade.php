<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <style>
        .gray {
            background-color: #D9D9D9;
            padding: 22px;
            gap: 20px;
            width: 200px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Section for the first generated number -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>


            <div class="flex flex-row gap-40 justify-center">
                @for ($registrar = 1; $registrar <= 3; $registrar++) @php
                    $oldestQueue=\App\Models\Queue::where('status', 'In Progress' ) ->where('registrar', $registrar)
                    ->orderBy('id')
                    ->first();
                    @endphp

                    <div>
                        <p class="text-center font-bold">Registrar {{ $registrar }}</p>

                        @if($oldestQueue)
                        <div class="gray grid">
                            <p class="text-center">Now Serving</p>
                            <p class="text-2xl text-center">{{ $oldestQueue->id }}</p>
                            <p class="text-center">{{ $oldestQueue->name }}</p>
                        </div>
                        @else
                        <div class="gray grid">
                            <p class="text-center text-2xl">Not Assigned.</p>
                        </div>
                        @endif
                    </div>
                    @endfor
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
        </div>
    </div>

    @push('scripts')
    <script>
        // Refresh the page every 10 seconds
        setInterval(function () {
            location.reload();
        }, 10000);//10000
    </script>
    @endpush

</x-app-layout>