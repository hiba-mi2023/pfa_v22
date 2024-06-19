<!-- resources/views/admin/notes.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Notes non approuvées</h1>
    <ul>
        @foreach ($notes as $note)
            <li>
                <h3>{{ $note->titre }}</h3>
                <p>{{ $note->description }}</p>
                @if ($note->photo)
                      <img src="{{ asset('' . $note->photo) }}" alt="Photo de la note">
                @endif
                <p class="note-description">Description:{{ $note->description }}</p>
                <p class="note-keywords">Keywords: {{ $note->keywords }}</p>

                <form action="{{ route('admin.approve-note', $note->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">Approuver</button>
                </form>
                <form action="{{ route('admin.delete-note', $note->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection
