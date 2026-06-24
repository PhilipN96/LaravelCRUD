@extends('layout.layout')

@section('content')
    <div class="page-header">
        <h1 class="page-title">Benutzerverwaltung</h1>
        <p class="page-subtitle">Verwalte die Rollen aller registrierten Benutzer.</p>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="table-responsive table-modern">
        <table class="table table-hover align-middle mb-0 bg-white">
            <thead>
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">E-Mail</th>
                    <th class="p-3">Rolle</th>
                    <th class="p-3 text-end">Aktion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td class="p-3 fw-semibold">
                            {{ $user->name }}
                            @if($user->id === Auth::id())
                                <span class="text-muted small">(Du)</span>
                            @endif
                        </td>
                        <td class="p-3">{{ $user->email }}</td>
                        <td class="p-3">
                            @if($user->isAdmin())
                                <span class="badge rounded-pill bg-primary">Administrator</span>
                            @else
                                <span class="badge rounded-pill bg-secondary">Benutzer</span>
                            @endif
                        </td>
                        <td class="p-3 text-end">
                            @if($user->id === Auth::id())
                                <span class="text-muted small">—</span>
                            @else
                                @if($user->isAdmin())
                                    <form action="{{ route('users.role', $user) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('{{ $user->name }} wirklich zu Benutzer herabstufen?');">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="role" value="user">
                                        <button type="submit" class="btn btn-sm btn-outline-secondary">
                                            Zu Benutzer herabstufen
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('users.role', $user) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('{{ $user->name }} wirklich zu Admin befördern?');">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="role" value="admin">
                                        <button type="submit" class="btn btn-sm btn-outline-primary">
                                            Zu Admin befördern
                                        </button>
                                    </form>
                                @endif
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
@endsection
