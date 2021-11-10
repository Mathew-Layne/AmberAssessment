<div>
    <div class="flex justify-between text-gray-700 font-bold text-3xl mt-8 mb-4">
        <h1>Teachers</h1>
    
        <div class="relative text-gray-600">
            <input type="search" wire:model="search" placeholder="Search"
                class="bg-white h-10 px-5 pr-10 rounded-full text-sm focus:outline-none">
            <button type="submit" class="absolute right-0 top-0 mt-3 mr-4">
                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                    viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                    width="512px" height="512px">
                    <path
                        d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                </svg>
            </button>
        </div>
    </div>
    
    <x-table.table>
        <x-table.thead>
    
            <x-table.table-head>Teacher Name</x-table.table-head>
            <x-table.table-head>Email</x-table.table-head>
            <x-table.table-head>Actions</x-table.table-head>
    
        </x-table.thead>
        <x-table.tbody>
            @foreach ($teachers as $teacher)
    
            <x-table.table-row>
                <x-table.table-data responsiveName="Teacher Name">{{ $teacher->name }}</x-table.table-data>
                <x-table.table-data responsiveName="Email">{{ $teacher->email}}</x-table.table-data>
    
    
                <x-table.table-data responsiveName="Class">
                    <x-table.button wire:click="assignCourse({{ $teacher->id }})" color="blue">Assign</x-table.button>
                    <x-table.button wire:click="editTeacher({{ $teacher->id }})" color="green">Edit</x-table.button>
                </x-table.table-data>
    
            </x-table.table-row>
            @endforeach
        </x-table.tbody>
    </x-table.table>
    
    <div class="mt-2">
        {{ $teachers->links() }}
    </div>
    
    <div class="mt-3">
        <x-table.button wire:click="$set('addform', true)" color="gray" class="py-3 px-6">Add Teacher</x-table.button>
    </div>


    
    <div class="flex justify-between text-gray-700 font-bold text-3xl mt-20 mb-4">
        <h1>Teacher Details</h1>
    </div>
    
    <x-table.table>
        <x-table.thead>
    
            <x-table.table-head>Teacher Name</x-table.table-head>
            <x-table.table-head>Email</x-table.table-head>
            <x-table.table-head>Assigned Course</x-table.table-head>
            <x-table.table-head>Actions</x-table.table-head>
    
        </x-table.thead>
        <x-table.tbody>
            @foreach ($teacherDetails as $teacherDetail)
    
            <x-table.table-row>
                <x-table.table-data responsiveName="Teacher Name">{{ $teacherDetail->user->name }}</x-table.table-data>
                <x-table.table-data responsiveName="Email">{{ $teacherDetail->user->email}}</x-table.table-data>
                <x-table.table-data responsiveName="Addigned Course">{{ $teacherDetail->course->course_name }}
                </x-table.table-data>    
                <x-table.table-data responsiveName="Class">
                    <x-table.button wire:click="editTeacherCourse({{ $teacherDetail->id }})" color="green">Edit
                    </x-table.button>                    
                </x-table.table-data>
    
            </x-table.table-row>
            @endforeach
        </x-table.tbody>
    </x-table.table>
    
    <div class="mt-2">
        {{ $teachers->links() }}
    </div>
    
    
    
    @if($addform)
    
    <section class="absolute left-0 top-0 h-screen z-10 bg-black bg-opacity-75 w-full py-1">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6 absolute top-10 left-96">
            <div
                class="bg-white  relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Add Teacher
                        </h6>
                        <i wire:click="$set('addform', false)" class="fas fa-times text-2xl cursor-pointer"></i>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
    
    
                    <form wire:submit.prevent="addTeacher()">
    
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Contact Information
                        </h6>
                        <div class="flex flex-wrap">
    
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Teacher Name
                                    </label>
                                    <input type="text"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        wire:model="teacherName" placeholder="Enter Teachers Name">
    
                                </div>
                            </div>
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Password
                                    </label>
                                    <input type="password"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        wire:model="password" placeholder="Enter Password">
    
                                </div>
                            </div>
    
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Email Address
                                    </label>
                                    <input type="email"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        wire:model="email" placeholder="jane.doe@email.com">
    
                                </div>
                            </div>
    
                            <div class="ml-3 mt-3">
                                <x-table.button color="gray" class="py-2 px-4">Add Teacher</x-table.button>
                            </div>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    @endif
    
    @if($assignform)
    <section class=" absolute left-0 top-0 h-screen z-10 bg-black bg-opacity-75 w-full py-1">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6 absolute top-10 left-96">
            <div
                class="bg-white  relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Assign Subject
                        </h6>
                        <i wire:click="$set('editform', false)" class="fas fa-times text-2xl cursor-pointer"></i>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
    
                    <form wire:submit="courseAssigned()">
    
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Assign Subject
                        </h6>
                        <div class="flex flex-wrap">
    
                            <div class="w-full lg:w-6/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Teacher's Name
                                    </label>
                                    <select wire:model="teacherName"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                                        <option value="">Select Teacher</option>
                                        @foreach($teacherlists as $teacherlist)
                                        <option value="{{ $teacherlist->id }}">{{ $teacherlist->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('phoneno')<span class="text-xs text-red-600">{{
                                        $message }}</span>@enderror
                                </div>
                            </div>
                            
    
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Course
                                    </label>
                                    <select wire:model="course"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
    
                                        <option value="">Select Course</option>
                                        @foreach($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                        @endforeach
    
                                    </select>
                                    @error('email')<span class="text-xs text-red-600">{{
                                        $message }}</span>@enderror
                                </div>
                            </div>
    
                            <div class="ml-3 mt-3">
                                <x-table.button color="gray" class="py-2 px-4">Assign</x-table.button>
                            </div>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endif

    @if($editform)
    <section class=" absolute left-0 top-0 h-screen z-10 bg-black bg-opacity-75 w-full py-1">
        <div class="w-full lg:w-8/12 px-4 mx-auto mt-6 absolute top-10 left-96">
            <div
                class="bg-white  relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded-lg bg-blueGray-100 border-0">
                <div class="rounded-t bg-white mb-0 px-6 py-6">
                    <div class="text-center flex justify-between">
                        <h6 class="text-blueGray-700 text-xl font-bold">
                            Edit Student
                        </h6>
                        <i wire:click="$set('editform', false)" class="fas fa-times text-2xl cursor-pointer"></i>
                    </div>
                </div>
                <div class="flex-auto px-4 lg:px-10 py-10 pt-0">
    
                    <form wire:submit="teacherEdited()">
    
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Personal Information
                        </h6>
                        <div class="flex flex-wrap">
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Teacher Name
                                    </label>
                                    <input type="text"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        wire:model="teacherName" placeholder="Enter Student Name">
                                    @error('teacherName')<span class="text-xs text-red-600">{{
                                        $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="w-full lg:w-12/12 px-4">
                                <div class="relative w-full mb-3">
                                    <label class="block uppercase text-blueGray-600 text-xs font-bold mb-2"
                                        htmlfor="grid-password">
                                        Email Address
                                    </label>
                                    <input type="email"
                                        class="border-0 px-3 py-3 placeholder-blueGray-300 text-blueGray-600 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150"
                                        wire:model="email" placeholder="jane.doe@email.com">
                                    @error('email')<span class="text-xs text-red-600">{{
                                        $message }}</span>@enderror
                                </div>
                            </div>
    
                            <div class="ml-3 mt-3">
                                <x-table.button color="gray" class="py-2 px-4">Update</x-table.button>
                            </div>
    
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    @endif
</div>
