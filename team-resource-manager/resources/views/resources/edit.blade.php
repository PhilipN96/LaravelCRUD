@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Ressource bearbeiten</h2>

    @if($errors->any())
        <div class="mb-4 p-2 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('resources.update', $resource) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-semibold">Name *</label>
            <input type="text" name="name" value="{{ old('name', $resource->name) }}"
                   class="w-full border rounded p-2" required>
        </div>

        <div>
            <label class="block mb-1 font-semibold">Typ</label>
            <input type="text" name="type" value="{{ old('type', $resource->type) }}"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Standort</label>
            <input type="text" name="location" value="{{ old('location', $resource->location) }}"
                   class="w-full border rounded p-2">
        </div>

        <div>
            <label class="block mb-1 font-semibold">Beschreibung</label>
            <textarea name="description" rows="4"
                      class="w-full border rounded p-2">{{ old('description', $resource->description) }}</textarea>
        </div>

        <div class="flex items-center">
            <input type="checkbox" name="is_active" id="is_active" class="mr-2"
                   {{ old('is_active', $resource->is_active) ? 'checked' : '' }}>
            <label for="is_active">Aktiv</label>
        </div>

        <div class="space-x-2">
            <button type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Aktualisieren
            </button>
            <a href="{{ route('resources.index') }}"
               class="text-gray-600 hover:underline">
                Abbrechen
            </a>
        </div>
    </form>
@endsection
