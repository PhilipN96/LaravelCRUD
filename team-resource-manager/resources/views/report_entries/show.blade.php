@extends('layout.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-start mb-4">
        <div>
            <h1 class="mb-1">{{ $entry->title }}</h1>
            <p class="text-muted mb-0">
                Kalenderwoche {{ $entry->week_number }} / {{ $entry->year }}
            </p>
        </div>

        <span class="badge bg-secondary align-self-center">{{ $entry->status }}</span>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <dl class="row mb-0">
                <dt class="col-sm-3">Kalenderwoche</dt>
                <dd class="col-sm-9">{{ $entry->week_number }}</dd>

                <dt class="col-sm-3">Jahr</dt>
                <dd class="col-sm-9">{{ $entry->year }}</dd>

                <dt class="col-sm-3">Status</dt>
                <dd class="col-sm-9">{{ $entry->status }}</dd>

                <dt class="col-sm-3">Berichtstext</dt>
                <dd class="col-sm-9" style="white-space: pre-line;">{{ $entry->content }}</dd>
            </dl>
        </div>
    </div>

    <div class="mt-4 d-flex gap-2">
        <a href="{{ route('report-entries.edit', $entry) }}" class="btn btn-primary">Bearbeiten</a>
        <a href="{{ route('report-entries.index') }}" class="btn btn-outline-secondary">Zurück zur Übersicht</a>
    </div>
@endsection
