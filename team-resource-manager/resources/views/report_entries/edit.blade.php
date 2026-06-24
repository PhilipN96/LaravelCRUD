@extends('layout.layout')

@section('content')
    <div class="mb-4">
        <h1 class="mb-1">Berichtsheft-Eintrag bearbeiten</h1>
        <p class="text-muted mb-0">Passe einen vorhandenen Wochenbericht an.</p>
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

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <form action="{{ route('report-entries.update', $entry) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="week_number" class="form-label">Kalenderwoche</label>
                        <input type="number"
                               name="week_number"
                               id="week_number"
                               class="form-control"
                               value="{{ old('week_number', $entry->week_number) }}"
                               min="1"
                               max="53"
                               required>
                    </div>

                    <div class="col-md-6">
                        <label for="year" class="form-label">Jahr</label>
                        <input type="number"
                               name="year"
                               id="year"
                               class="form-control"
                               value="{{ old('year', $entry->year) }}"
                               required>
                    </div>

                    <div class="col-12">
                        <label for="title" class="form-label">Titel</label>
                        <input type="text"
                               name="title"
                               id="title"
                               class="form-control"
                               value="{{ old('title', $entry->title) }}"
                               required>
                    </div>

                    <div class="col-12">
                        <label for="content" class="form-label">Berichtstext</label>
                        <textarea name="content"
                                  id="content"
                                  rows="10"
                                  class="form-control"
                                  required>{{ old('content', $entry->content) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="Entwurf" {{ old('status', $entry->status) == 'Entwurf' ? 'selected' : '' }}>Entwurf</option>
                            <option value="Eingereicht" {{ old('status', $entry->status) == 'Eingereicht' ? 'selected' : '' }}>Eingereicht</option>
                            <option value="Freigegeben" {{ old('status', $entry->status) == 'Freigegeben' ? 'selected' : '' }}>Freigegeben</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-primary">Aktualisieren</button>
                    <a href="{{ route('report-entries.index') }}" class="btn btn-outline-secondary">Abbrechen</a>
                </div>
            </form>
        </div>
    </div>
@endsection