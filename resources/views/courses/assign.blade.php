{{-- resources/views/courses/assign.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar estudiantes al curso') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-10 bg-white shadow p-6 rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Asignar estudiantes al curso: {{ $course->title }}</h2>

        <form method="POST" action="{{ route('courses.assign', $course->id) }}">
            @csrf

            <div class="mb-4">
                <label for="students" class="block text-sm font-medium text-gray-700 mb-2">Selecciona estudiantes:</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    @foreach($students as $student)
                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                id="student_{{ $student->id }}"
                                name="students[]"
                                value="{{ $student->id }}"
                                class="mr-2"
                                {{ $course->students->contains($student->id) ? 'checked' : '' }}
                            >
                            <label for="student_{{ $student->id }}" class="text-gray-800">{{ $student->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('students')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('courses.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Cancelar</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout>
