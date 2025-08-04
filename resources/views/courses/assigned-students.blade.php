{{-- resources/views/courses/students.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estudiantes inscritos') }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h1 class="text-2xl font-bold mb-6">
            Estudiantes inscritos en: {{ $course->title }}
        </h1>

        @if($course->students->isEmpty())
            <p class="text-gray-600">No hay estudiantes inscritos en este curso.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Nombre</th>
                        <th class="border border-gray-300 p-2">Correo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course->students as $student)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $student->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $student->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $student->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
