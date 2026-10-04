<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Proyecto - Task Manager</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 p-8 flex justify-center">
    <div class="w-full max-w-lg bg-slate-800 p-6 rounded-xl border border-slate-700 shadow-xl">
        <h2 class="text-xl font-bold text-sky-400 mb-4">Crear Nuevo Proyecto</h2>

        <form action="{{ route('projects.store') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-semibold mb-1">Título del Proyecto Solicitado:</label>
                <input type="text" name="title" value="{{ old('title') }}"
                       class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:outline-none focus:border-sky-500">
                @error('title')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Descripción:</label>
                <textarea name="description" rows="3"
                          class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:outline-none focus:border-sky-500">{{ old('description') }}</textarea>
                @error('description')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-between items-center pt-2">
                <a href="{{ route('projects.index') }}" class="text-sm text-slate-400 hover:underline">← Cancelar</a>
                <button type="submit" class="bg-sky-500 hover:bg-sky-600 px-4 py-2 rounded-lg font-bold text-white transition">
                    Guardar Proyecto
                </button>
            </div>
        </form>
    </div>
</body>
</html>