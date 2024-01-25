<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Queue List') }}
        </h2>
    </x-slot>

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
                    <td class="px-6 py-4">
                        {{$queue->status}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>