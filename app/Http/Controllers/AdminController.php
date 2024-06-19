<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Note;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin'); // Middleware pour vérifier si l'utilisateur est administrateur
    }

    public function showUnapprovedUsers()
    {
        $users = User::where('is_approved', false)->get();
        return view('admin.users', compact('users'));
    }

    public function approveUser($id)
    {
        $user = User::findOrFail($id);
        $user->is_approved = true;
        $user->save();
        return redirect()->route('admin.unapproved-users')->with('success', 'Utilisateur approuvé avec succès.');
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.unapproved-users')->with('success', 'Utilisateur supprimé avec succès.');
    }

    public function showUnapprovedNotes()
    {
        $notes = Note::where('is_approved', false)->get();
        return view('admin.notes', compact('notes'));
    }

    public function approveNote($id)
    {
        $note = Note::findOrFail($id);
        $note->is_approved = true;
        $note->save();
        return redirect()->route('admin.unapproved-notes')->with('success', 'Note approuvée avec succès.');
    }

    public function deleteNote($id)
    {
        $note = Note::findOrFail($id);
        $note->delete();
        return redirect()->route('admin.unapproved-notes')->with('success', 'Note supprimée avec succès.');
    }
}
