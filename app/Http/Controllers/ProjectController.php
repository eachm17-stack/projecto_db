<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\ProjectRequest;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Listar todos los proyectos paginados.
     */
    public function index()
    {
        $projects = Project::latest()->paginate(6);
        return view('projects.index', compact('projects'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Guardar el nuevo proyecto validado en la base de datos.
     */
    public function store(ProjectRequest $request)
    {
        Project::create([
            ...$request->validated(),
            'user_id' => auth()->id() ?? 1,
        ]);

        return redirect()
            ->route('projects.index')
            ->with('success', '¡Proyecto creado exitosamente!');
    }

    /**
     * Mostrar formulario para editar un proyecto existente.
     */
    public function edit(Project $project)
    {
        $this->authorize('update', $project);
        return view('projects.edit', compact('project'));
    }

    /**
     * Actualizar el registro en base de datos.
     */
    public function update(ProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);
        $project->update($request->validated());

        return redirect()
            ->route('projects.index')
            ->with('success', 'Proyecto actualizado con éxito.');
    }

    /**
     * Eliminar el registro y disparar el borrado en cascada.
     */
    public function destroy(Project $project)
    {
        $this->authorize('destroy', $project);
        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Proyecto eliminado del sistema.');
    }
}