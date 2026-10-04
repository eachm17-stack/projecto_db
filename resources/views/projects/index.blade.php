<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyectos - Manejador de Tareas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-900 text-slate-100 p-8">
    <div class="max-w-4xl mx-auto">
        
        <!-- Mensaje Flash -->
        @if (session('success'))
            <div class="mb-6 p-4 bg-emerald-500/20 border-l-4 border-emerald-500 text-emerald-300 rounded-r-lg">
                {{ session('success') }}
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-white">Proyectos</h1>
            <a href="{{ route('projects.create') }}" class="bg-sky-500 hover:bg-sky-600 px-4 py-2 rounded-lg font-bold transition text-sm">
                + Nuevo Proyecto
            </a>
        </div>

        <div class="grid gap-4 md:grid-cols-2">
            @forelse ($projects as $project)
                <div class="bg-slate-800 p-5 rounded-xl border border-slate-700 flex flex-col justify-between">
                    <div>
                        <h3 class="text-lg font-bold text-white">{{ $project->title }}</h3>
                        <p class="text-slate-400 text-sm mt-1">{{ $project->description ?? 'Sin descripción' }}</p>
                    </div>

                    <div class="mt-4 pt-4 border-t border-slate-700/60 flex justify-between items-center">
                        <span class="text-xs text-slate-500">ID: {{ $project->id }}</span>
                        <div class="flex gap-2">
                            <a href="{{ route('projects.edit', $project) }}" class="text-xs bg-amber-500/20 text-amber-300 border border-amber-500/40 px-2.5 py-1 rounded hover:bg-amber-500/30">
                                Editar
                            </a>

                            <form action="{{ route('projects.destroy', $project) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este proyecto?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs bg-red-500/20 text-red-300 border border-red-500/40 px-2.5 py-1 rounded hover:bg-red-500/30">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center py-10 bg-slate-800/40 rounded-xl border border-dashed border-slate-700">
                    <p class="text-slate-400">No hay proyectos registrados todavía.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    </div>
</body>
</html>