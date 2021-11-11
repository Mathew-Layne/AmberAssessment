@props(['user' => false])
<div>
    <div x-data="{ sidebarOpen: false, darkMode: false }" :class="{ 'dark': darkMode }">
        <div class="flex h-screen bg-gray-100 dark:bg-gray-800 font-roboto">
            <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
                class="fixed z-20 inset-0 bg-black opacity-50 transition-opacity lg:hidden"></div>

            <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
                class="fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-indigo-600 dark:bg-gray-900 overflow-y-auto lg:translate-x-0 lg:static lg:inset-0">
                <div class="flex items-center justify-center mt-10">
                    <div class="w-4/6 flex items-center">
                        <a href="{{ url('/') }}"><img src="{{ url('img/logo.png') }}" alt="Logo"></a>
                    </div>
                </div>

                <nav class="flex flex-col mt-16 px-4 text-left">
                    @if($user == 'Teacher' || $user == 'Student')
                        <a href="{{ url('/schedule') }}"
                            class="mt-3 py-2 text-sm text-gray-700 font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 bg-gray-200 dark:hover:bg-gray-800 rounded">Schedules</a>
                    @else
                    <a href="{{ route('dashboard') }}"
                        class="py-2 text-sm text-gray-700 font-bold px-3 dark:text-gray-100 bg-gray-200 dark:bg-gray-800 rounded">Overview</a>
                    <a href="{{ route('student') }}"
                        class="mt-3 py-2 text-sm text-white font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100  hover:bg-gray-200 dark:hover:bg-gray-800 active:bg-gray-200 rounded">Students</a>
                    <a href="{{ route('course') }}"
                        class="mt-3 py-2 text-sm text-white font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Courses</a>
                    <a href="{{ route('teacher') }}"
                        class="mt-3 py-2 text-sm text-white font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Teachers</a>
                    <a href="{{ url('/schedule') }}"
                        class="mt-3 py-2 text-sm text-white font-bold px-3 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-100 hover:bg-gray-200 dark:hover:bg-gray-800 rounded">Schedules</a>
                   @endif
                </nav>
            </div>

            <div class="flex-1 flex flex-col overflow-hidden">
                <header class="flex justify-between items-center p-6">
                    <div class="flex items-center space-x-4 lg:space-x-0">
                        <button @click="sidebarOpen = true"
                            class="text-gray-500 dark:text-gray-300 focus:outline-none lg:hidden">
                            <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </button>

                        <div>
                            {{-- <h1 class="text-2xl text-gray-800 font-bold dark:text-white">{{ $title }}</h1> --}}
                        </div>
                    </div>






                    <div class="flex items-center space-x-4">


                        <div x-data="{ dropdownOpen: false }" class="relative">
                            <button @click="dropdownOpen = ! dropdownOpen"
                                class="flex items-center space-x-2 relative focus:outline-none">
                                <h2 class="text-gray-700 font-bold dark:text-gray-300 text-sm hidden sm:block">
                                    {{
                                    Auth::user()->name }}
                                </h2>
                                <img class="h-9 w-9 rounded-full border-2 border-purple-500 object-cover"
                                    src="https://images.unsplash.com/photo-1553267751-1c148a7280a1?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=634&q=80"
                                    alt="Your avatar">
                            </button>

                            <div class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                                x-show="dropdownOpen" x-transition:enter="transition ease-out duration-100 transform"
                                x-transition:enter-start="opacity-0 scale-95"
                                x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75 transform"
                                x-transition:leave-start="opacity-100 scale-100"
                                x-transition:leave-end="opacity-0 scale-95" @click.away="dropdownOpen = false">
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Profile</a>
                                <a href="#"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Tickets</a>
                                <form action="{{ url('logout') }}" method="Post">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left block px-4 py-2 text-sm text-gray-700 hover:bg-gray-600 hover:text-white">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </header>

                <main class="flex-1 overflow-x-hidden overflow-y-auto">
                    <div class="container mx-auto px-6 py-8">
                        <div>


                            {{ $slot }}


                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
</div>