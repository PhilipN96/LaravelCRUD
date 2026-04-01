@extends('layout.layout')

@extends('layout.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="mb-1">Digitales Berichtsheft</h1>
            <p class="text-muted mb-0">Hier verwaltest Du Deine Wochenberichte.</p>
        </div>

        <a href="{{ route('report-entries.create') }}" class="btn btn-primary">
            Neuen Eintrag anlegen
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($entries->isEmpty())
        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body text-center py-5">
                <h4 class="mb-3">Noch keine Berichtsheft-Einträge vorhanden</h4>
                <p class="text-muted">Lege jetzt Deinen ersten Wochenbericht an.</p>
                <a href="{{ route('report-entries.create') }}" class="btn btn-primary">
                    Ersten Eintrag erstellen
                </a>
            </div>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle bg-white rounded shadow-sm">
                <thead class="table-light">
                    <tr>
                        <th>KW</th>
                        <th>Jahr</th>
                        <th>Titel</th>
                        <th>Status</th>
                        <th class="text-end">Aktionen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                        <tr>
                            <td>{{ $entry->week_number }}</td>
                            <td>{{ $entry->year }}</td>
                            <td>{{ $entry->title }}</td>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $entry->status }}
                                </span>
                            </td>
                            <td class="text-end">
                                <a href="{{ route('report-entries.edit', $entry) }}" class="btn btn-sm btn-outline-primary">
                                    Bearbeiten
                                </a>

                                <form action="{{ route('report-entries.destroy', $entry) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Eintrag wirklich löschen?');">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                        Löschen
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
@endsection