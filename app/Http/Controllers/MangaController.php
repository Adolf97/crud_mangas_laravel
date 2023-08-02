<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class MangaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $mangas = Task::latest()->paginate(5);
        return view('index', ['mangas' => $mangas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'mangaka' => 'required',
            'editorial' => 'required'
        ]);

        Task::create($request->all());
        return redirect()->route('mangas.index')->with('success', 'Manga agregado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $manga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $manga): View
    {
        return view('edit', ['manga' => $manga]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $manga): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'mangaka' => 'required',
            'editorial' => 'required'
        ]);

        $manga->update($request->all());
        return redirect()->route('mangas.index')->with('success', 'Manga actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $manga): RedirectResponse
    {
        $manga->delete();
        return redirect()->route('mangas.index')->with('success', 'Manga eliminado correctamente');
    }
}
