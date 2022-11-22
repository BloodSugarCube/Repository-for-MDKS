<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class NoteController extends Controller
{
    public function index(): View
    {
        $notes = Note::all();

        return view('notes.index', compact('notes'));
    }

    public function create(): View
    {
        return view('notes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Note::create($request->all());

        return redirect()->route('note.index')->with('success', 'Note added successfully');
    }

    public function edit(Note $note): View
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Request $request, Note $note): RedirectResponse
    {
        $note->update($request->all());

        return redirect()->route('note.index')->with('success', 'Note updated successfully');
    }

    public function destroy(Note $note): RedirectResponse
    {
        $note->delete();

        return redirect()->route('note.index')->with('success', 'Note deleted successfully');
    }

    public function show(Note $note): View
    {
        return view('notes.show', compact('note'));
    }
}
