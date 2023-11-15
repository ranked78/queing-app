<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>

                <!-- Display the generated number -->
                <div id="generated-number"
                    class="p-6 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                    Generated Number: 0 <!-- Initialize with 0 or the last generated number from local storage -->
                </div>

                <!-- Add a button for resetting the number -->
                <button id="reset-button"
                    class="ml-4 p-6 bg-red-500 text-white rounded-md focus:outline-none">Reset</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Function to update and display the generated number
            function updateGeneratedNumber(number) {
                document.getElementById('generated-number').innerText = `Generated Number: ${number}`;
            }

            // Check if the number is already stored in local storage
            let generatedNumber = localStorage.getItem('generatedNumber') || 0;

            // Display the generated number on the page
            updateGeneratedNumber(generatedNumber);

            // Add an event listener for the reset button
            document.getElementById('reset-button').addEventListener('click', function () {
                // Perform the reset logic here (you can make an API call or any server-side action)
                // For now, let's reset to 0 and update the displayed number
                generatedNumber = 0;
                localStorage.setItem('generatedNumber', generatedNumber);
                updateGeneratedNumber(generatedNumber);
            });
        });
    </script>
</x-app-layout>