@extends('layout.layout')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Ressource bearbeiten</h1>
        <p class="page-subtitle">Bestehende Daten der Ressource anpassen.</p>
    </div>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 ps-3">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="dashboard-card p-4">
        <form action="{{ route('resources.update', $resource) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row g-3">
                <div class="col-12">
                    <label for="name" class="form-label fw-semibold">Name *</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $resource->name) }}" class="form-control" required>
                </div>

                <div class="col-md-6">
                    <label for="type" class="form-label fw-semibold">Typ</label>
                    <input type="text" id="type" name="type" value="{{ old('type', $resource->type) }}" class="form-control">
                </div>

                <div class="col-md-6">
                    <label for="location" class="form-label fw-semibold">Standort</label>
                    <input type="text" id="location" name="location" value="{{ old('location', $resource->location) }}" class="form-control">
                </div>

                <div class="col-12">
                    <label for="description" class="form-label fw-semibold">Beschreibung</label>
                    <textarea id="description" name="description" rows="5" class="form-control">{{ old('description', $resource->description) }}</textarea>
                </div>

                <div class="col-12">
                    <div class="form-check">
                        <input type="checkbox"
                               name="is_active"
                               id="is_active"
                               class="form-check-input"
                               {{ old('is_active', $resource->is_active) ? 'checked' : '' }}>
                        <label for="is_active" class="form-check-label">Ressource ist aktiv</label>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2 mt-4">
                <button type="submit" class="btn btn-primary">Aktualisieren</button>
                <a href="{{ route('resources.index') }}" class="btn btn-outline-secondary">Abbrechen</a>
            </div>
        </form>
    </div>
@endsection