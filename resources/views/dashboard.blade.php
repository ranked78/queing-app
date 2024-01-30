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

        a {
            padding: 8px;
            margin-top: 10px;
            margin-left: 17px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

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
                            <p class="text-center text-2xl">Not Serving</p>
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

            {{-- Conditionally show the <a> tag based on the user's role --}}
                @if(auth()->user()->role === 'admin')
                <a href="admin/home" class="bg-red-400 rounded-md">Admin Home</a>
                @endif


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