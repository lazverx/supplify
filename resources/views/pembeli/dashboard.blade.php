<x-app-layout>
    <div class="container mx-auto px-4 py-8">

        <!-- Header Section -->
        <div class="flex flex-col md:flex-row items-center justify-between mb-8">
            <div class="w-full md:w-1/2">
                <h1 class="text-3xl font-bold text-white mb-4">
                    lorem ipsum dolor sit amet
                </h1>
                <p class="text-gray-400 mb-6">
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                </p>
            </div>
            <div class="w-full md:w-1/2 mt-8 md:mt-0">
                <img src="{{ asset('image/login-image.jpg') }}" alt="Hero Image" class="w-full h-64 object-cover rounded-lg">
            </div>
        </div>

        <!-- About Us Section -->
        <div class="mb-8">
            <h2 class="text-xl font-bold text-white mb-4">
                about us
            </h2>
            <div class="flex flex-col md:flex-row gap-4">
                <div class="w-full md:w-1/4 bg-gray-800 p-4 rounded-lg shadow">
                    <!-- Placeholder for additional content -->
                </div>
                
                <div class="w-full md:w-3/4">
                    <p class="text-gray-400">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>