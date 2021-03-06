<div>
    <div class="flex justify-between text-gray-700 font-bold text-3xl mt-20 mb-4">
        <h1>Course Schedules</h1>
    </div>

    <x-table.table>
        <x-table.thead>

            <x-table.table-head>Assigned Course</x-table.table-head>
            <x-table.table-head>Scheduled Day</x-table.table-head>
            <x-table.table-head>Start Time</x-table.table-head>
            <x-table.table-head>End Time</x-table.table-head>

        </x-table.thead>
        <x-table.tbody>
            @foreach ($teacherDetails as $teacherDetail)

            <x-table.table-row>
                <x-table.table-data responsiveName="Teacher Name">{{ $teacherDetail->course->course_name }}
                </x-table.table-data>
                <x-table.table-data responsiveName="Email">{{ $teacherDetail->course->schedule->day }}
                </x-table.table-data>
                <x-table.table-data responsiveName="Addigned Course">{{ $teacherDetail->course->schedule->start_time }}
                </x-table.table-data>
                <x-table.table-data responsiveName="Addigned Course">{{ $teacherDetail->course->schedule->end_time }}
                </x-table.table-data>                

            </x-table.table-row>
            @endforeach
        </x-table.tbody>
    </x-table.table>

    {{-- <div class="mt-2">
        {{ $teachers->links() }}
    </div> --}}
</div>