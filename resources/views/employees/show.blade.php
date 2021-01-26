<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Position: {{ ucfirst($employee->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div>
                        Name: {{ $employee->name }}
                    </div>
                    <div>
                        Email: {{ $employee->email }}
                    </div>
                    <div>
                        Phone: {{ $employee->phone ? $employee->phone : 'Not avaible'}}
                    </div>
                    <div>
                        Position: {{ $employee->has_position() ? $employee->get_position()->name : 'Not avaible' }}
                    </div>
                    <div>
                        <a class="block bg-blue-500 text-white px-4 py-2 rounded font-medium w-min text-center mt-1 mb-1 pointer" href="{{ route('employees.edit', $employee) }}">Edit</a>
                    </div>

                    <div>
                        <availability :availability="{{ $employee->availability }}" user="{{ $employee->id }}"></availability>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
