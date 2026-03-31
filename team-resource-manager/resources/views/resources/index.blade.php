@extends('layout.layout')

@section('content')
    <div class="page-header d-flex flex-column flex-md-row justify-content-md-between align-items-md-center gap-3">
        <div>
            <h1 class="page-title">Ressourcen</h1>
            <p class="page-subtitle">Übersicht aller angelegten Ressourcen.</p>
        </div>

        <a href="{{ route('resources.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i>Neue Ressource
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($resources->isEmpty())
        <div class="dashboard-card p-4 text-center">
            <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
            <h5>Noch keine Ressourcen vorhanden</h5>
            <p class="text-muted mb-3">Lege jetzt Deine erste Ressource an.</p>
            <a href="{{ route('resources.create') }}" class="btn btn-primary">
                Erste Ressource erstellen
            </a>
        </div>
    @else
        <div class="table-responsive table-modern">
            <table class="table table-hover align-middle mb-0 bg-white">
                <thead>
                    <tr>
                        <th class="p-3">Name</th>
                        <th class="p-3">Typ</th>
                        <th class="p-3">Standort</th>
                        <th class="p-3">Status</th>
                        <th class="p-3 text-end">Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resources as $resource)
                        <tr>
                            <td class="p-3 fw-semibold">{{ $resource->name }}</td>
                            <td class="p-3">{{ $resource->type ?: '—' }}</td>
                            <td class="p-3">{{ $resource->location ?: '—' }}</td>
                            <td class="p-3">
                                @if($resource->is_active)
                                    <span class="badge rounded-pill badge-soft-success">Aktiv</span>
                                @else
                                    <span class="badge rounded-pill badge-soft-danger">Inaktiv</span>
                                @endif
                            </td>
                            <td class="p-3 text-end">
                                <div class="d-inline-flex gap-2">
                                    <a href="{{ route('resources.edit', $resource) }}" class="btn btn-sm btn-outline-primary">
                                        Bearbeiten
                                    </a>

                                    <form action="{{ route('resources.destroy', $resource) }}"
                                          method="POST"
                                          onsubmit="return confirm('Ressource wirklich löschen?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger">
                                            Löschen
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection