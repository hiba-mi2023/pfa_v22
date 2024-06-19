<!-- resources/views/admin/users.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Utilisateurs non approuvés</h1>
    <ul>
        @foreach ($users as $user)
            <li>
                {{ $user->name }} - {{ $user->email }}
                <form action="{{ route('admin.approve-user', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Approuver</button>
                </form>
                <form action="{{ route('admin.delete-user', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
