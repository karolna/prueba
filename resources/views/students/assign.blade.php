{{-- resources/views/students/assign.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignar Cursos a: ' . $student->name) }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-10 bg-white shadow p-6 rounded-lg">
        <form method="POST" action="{{ route('students.assign', $student->id) }}">
            @csrf

            <div class="mb-4">
                <label for="courses" class="block text-sm font-medium text-gray-700 mb-2">Selecciona los cursos:</label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                    @foreach($courses as $course)
                        <div class="flex items-center">
                            <input
                                type="checkbox"
                                id="course_{{ $course->id }}"
                                name="courses[]"
                                value="{{ $course->id }}"
                                class="mr-2"
                                {{ $student->courses->contains($course->id) ? 'checked' : '' }}
                            >
                            <label for="course_{{ $course->id }}" class="text-gray-800">{{ $course->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('courses')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mt-6 flex justify-end">
                <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mr-2 hover:bg-gray-600">Cancelar</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Guardar</button>
            </div>
        </form>
    </div>
</x-app-layout>
