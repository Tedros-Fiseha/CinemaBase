
    <header class="fixed inset-x-0 top-0 z-50 bg-opacity-70 backdrop-blur-md shadow-md font-[poppins]">

        <nav class="flex items-center justify-between p-6 lg:px-8 h-20" aria-label="Global">
            <!-- Flex container for the logo and links -->
            <div class="flex lg:flex-1">
                <a href="/">
                    <!-- Increased image size without affecting navbar height -->
                    <img class="h-24 w-24 object-contain" src="../assets/cinema.png" alt="Cinema Plus">
                </a>
            </div>

            <!-- Navigation links -->
            <div class="lg:flex lg:gap-x-12">
                <a href="/" class="text-lg font-semibold text-gray-900 hover:text-indigo-600 relative group">
                    Home
                    <span
                        class="absolute inset-x-0 bottom-0 block h-[2px] bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300 ease-in-out"></span>
                </a>
                <a href="#features" class="text-lg font-semibold text-gray-900 hover:text-indigo-600 relative group">
                    Features
                    <span
                        class="absolute inset-x-0 bottom-0 block h-[2px] bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300 ease-in-out"></span>
                </a>
                <a href="#faq" class="text-lg font-semibold text-gray-900 hover:text-indigo-600 relative group">
                    FAQ
                    <span
                        class="absolute inset-x-0 bottom-0 block h-[2px] bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300 ease-in-out"></span>
                </a>
                <a href="#contact" class="text-lg font-semibold text-gray-900 hover:text-indigo-600 relative group">
                    Contact
                    <span
                        class="absolute inset-x-0 bottom-0 block h-[2px] bg-indigo-600 scale-x-0 group-hover:scale-x-100 transition-all duration-300 ease-in-out"></span>
                </a>
            </div>

            <!-- Register button -->
            <div class="hidden lg:flex lg:flex-1 lg:justify-end gap-10">
                <a href="/login"><button
                        class="text-lg font-semibold text-gray-900 bg-transparent border-2 border-gray-900 rounded-md px-4 py-2 hover:bg-gray-900 hover:text-white transition-all duration-300 ease-in-out">
                        Login
                    </button>
                </a>
                <a href="/signup"><button
                        class="text-lg font-semibold text-gray-900 bg-transparent border-2 border-gray-900 rounded-md px-4 py-2 hover:bg-gray-900 hover:text-white transition-all duration-300 ease-in-out">
                        Register
                    </button>
                </a>

            </div>
        </nav>
    </header>