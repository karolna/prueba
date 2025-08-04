<x-app-layout>
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Listado de Estudiantes</h1>
            <a href="{{ route('students.create') }}" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded">
                + Crear Estudiante
            </a>
        </div>
        @if($students->isEmpty())
            <p>No hay estudiantes registrados.</p>
        @else
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr>
                        <th class="border border-gray-300 p-2 text-left">ID</th>
                        <th class="border border-gray-300 p-2 text-left">Nombre</th>
                        <th class="border border-gray-300 p-2 text-left">Cédula</th>
                        <th class="border border-gray-300 p-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                    <tr>
                        <td class="border border-gray-300 p-2">{{ $student->id }}</td>
                        <td class="border border-gray-300 p-2">{{ $student->name }}</td>
                        <td class="border border-gray-300 p-2">{{ $student->cedula }}</td>
                        <td class="border border-gray-300 p-2">
                        
                            <a href="{{ route('students.assign.form', $student->id) }}" class="text-blue-600 hover:underline ml-4">
                                Asignar cursos
                            </a>
                            <a href="{{ route('students.courses', $student->id) }}" class="text-blue-600 hover:underline mr-4">
                                    ---Ver cursos
                                </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
