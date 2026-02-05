@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Ressourcen</h2>
        <a href="{{ route('resources.create') }}"
           class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Neue Ressource
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-2 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if($resources->isEmpty())
        <p>Es sind noch keine Ressourcen vorhanden.</p>
    @else
        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-2">Name</th>
                    <th class="text-left p-2">Typ</th>
                    <th class="text-left p-2">Standort</th>
                    <th class="text-left p-2">Aktiv</th>
                    <th class="text-left p-2">Aktionen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($resources as $resource)
                    <tr class="border-b">
                        <td class="p-2">{{ $resource->name }}</td>
                        <td class="p-2">{{ $resource->type }}</td>
                        <td class="p-2">{{ $resource->location }}</td>
                        <td class="p-2">
                            @if($resource->is_active)
                                ✅
                            @else
                                ❌
                            @endif
                        </td>
                        <td class="p-2 space-x-2">
                            <a href="{{ route('resources.edit', $resource) }}"
                               class="text-blue-600 hover:underline">
                                Bearbeiten
                            </a>

                            <form action="{{ route('resources.destroy', $resource) }}"
                                  method="POST"
                                  class="inline"
                                  onsubmit="return confirm('Ressource wirklich löschen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">
                                    Löschen
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
