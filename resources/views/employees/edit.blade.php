<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Employee: {{ $employee->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('employees.update', $employee) }}" method="post" >
                        @method('PUT')
                        @csrf
                        <div class="mb-4">
                            <label for="name">Employee Name</label>
                            <input type="text" name="name" id="name" placeholder="Employee Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('name') border-red-500 @enderror" value="{{ $employee->name }}">

                            @error('name')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="email">Employee Email</label>
                            <input type="email" name="email" id="email" placeholder="Employee Email" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('email') border-red-500 @enderror" value="{{ $employee->email }}">

                            @error('email')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="phone">Employee Phone</label>
                            <input type="text" name="phone" id="phone" placeholder="Employee phone" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('phone') border-red-500 @enderror" value="{{ $employee->phone }}">

                            @error('phone')
                                <div class="text-red-500 mt-2 text-sm">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <label for="position">Employee Position</label>
                        <select name="position" id="position">
                            <option {{ $employee->get_position()->id === 0 ? "selected" : ""}} value="0" {{ $employee->get_position()->id === 0 ?? 'selected' }}>None</option>
                            @foreach ($positions as $position)
                                <option {{ $employee->get_position()->id === $position->id ? "selected" : ""}} value="{{ $position->id }}">{{ $position->name }}</option>
                            @endforeach
                        </select>

                        @error('position')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
