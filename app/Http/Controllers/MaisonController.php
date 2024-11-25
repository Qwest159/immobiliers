<?php

namespace App\Http\Controllers;

use App\Models\Maison;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MaisonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Maison $maison)
    {

        // Logique pour créer un utilisateur
        // Maison::create($request->all());

        // Redirection vers la page d'index des utilisateurs
        return redirect()->route('maisons.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Logique pour créer un utilisateur
        Maison::create($request->all());

        // Redirection vers la page d'index des utilisateurs
        return redirect()->route('maison.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
