<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Crear estudiante') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        @if(session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">{{ session('success') }}</div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block font-medium">Nombre</label>
                <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Cédula</label>
                <input type="text" name="cedula" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Descripción</label>
                <input type="text" name="description" class="w-full border border-gray-300 p-2 rounded" required>
            </div>

            <div>
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    Guardar
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
