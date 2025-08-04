<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos del estudiante: ' . $student->name) }}
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        @if($student->courses->isEmpty())
            <p class="text-gray-600">No hay cursos asignados al estudiante.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2">ID</th>
                        <th class="border border-gray-300 p-2">Nombre</th>
                        <th class="border border-gray-300 p-2">Cédula</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student->courses as $course)
                        <tr>
                            <td class="border border-gray-300 p-2">{{ $course->id }}</td>
                            <td class="border border-gray-300 p-2">{{ $course->name }}</td>
                            <td class="border border-gray-300 p-2">{{ $student->cedula }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>