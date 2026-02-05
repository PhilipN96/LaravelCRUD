<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::orderBy('name')->get();

        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        return view('resources.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'type'        => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active'   => 'nullable|boolean',
        ]);

        // Checkbox kommt ggf. nicht mit → deshalb casten:
        $data['is_active'] = $request->has('is_active');

        Resource::create($data);

        return redirect()
            ->route('resources.index')
            ->with('success', 'Ressource wurde erstellt.');
    }

    public function edit(Resource $resource)
    {
        return view('resources.edit', compact('resource'));
    }

    public function update(Request $request, Resource $resource)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'type'        => 'nullable|string|max:255',
            'location'    => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'is_active'   => 'nullable|boolean',
        ]);

        $data['is_active'] = $request->has('is_active');

        $resource->update($data);

        return redirect()
            ->route('resources.index')
            ->with('success', 'Ressource wurde aktualisiert.');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()
            ->route('resources.index')
            ->with('success', 'Ressource wurde gelöscht.');
    }
}
