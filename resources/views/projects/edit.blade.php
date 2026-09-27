<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Proyecto #{{ $project->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 p-8 flex justify-center">
    <div class="w-full max-w-lg bg-slate-800 p-6 rounded-xl border border-slate-700 shadow-xl">
        <h2 class="text-xl font-bold text-amber-400 mb-4">Editar Proyecto #{{ $project->id }}</h2>

        <form action="{{ route('projects.update', $project) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold mb-1">Título:</label>
                <input type="text" name="title" value="{{ old('title', $project->title) }}"
                       class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:outline-none focus:border-amber-500">
                @error('title')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold mb-1">Descripción:</label>
                <textarea name="description" rows="3"
                          class="w-full bg-slate-900 border border-slate-700 rounded-lg p-2.5 text-white focus:outline-none focus:border-amber-500">{{ old('description', $project->description) }}</textarea>
                @error('description')
                    <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-between items-center pt-2">
                <a href="{{ route('projects.index') }}" class="text-sm text-slate-400 hover:underline">← Cancelar</a>
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 px-4 py-2 rounded-lg font-bold text-white transition">
                    Actualizar Cambios
                </button>
            </div>
        </form>
    </div>
</body>
</html>