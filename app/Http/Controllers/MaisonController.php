<?php

namespace App\Http\Controllers;

use App\Http\Request\MaisonCreate;
use App\Models\Maison;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('maison.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaisonCreate $request)
    {
        // On crée un nouvel maison
        $maison = Maison::make();
        // On ajoute les propriétés du maison
        // 'title' => 'required|string|max:255',
        // 'price' => 'required|max:255',
        // 'address' => 'required|max:25',
        // 'number_of_rooms' => 'required|max:25',
        // 'size' => 'required|max:25',
        // 'description' => 'required|max:25',
        // 'img_path' => 'required|max:25',
        $maison->title = $request->validated()['title'];
        $maison->price = $request->validated()['price'];
        $maison->address = $request->validated()['address'];
        $maison->number_of_rooms = $request->validated()['number_of_rooms'];
        $maison->size = $request->validated()['size'];
        $maison->description = $request->validated()['description'];
        $maison->img_path = $request->file('img_path')->store('maisons', 'public');
        $maison->user_id = Auth::id();


        // Si il y a une image, on la sauvegarde
        // if ($request->hasFile('img')) {
        //     $path = $request->file('img')->store('maisons', 'public');
        //     $maison->img_path = $path;
        // }
        // On sauvegarde le maison en base de données
        $maison->save();

        return back()->banner('Creation avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(maison $maison)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(maison $maison)
    {
        // Gate::authorize('update', $maison);
        return view('maisons.edit', [
            'maison' => $maison,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaisonCreate $request, maison $maison)
    {
        // Gate::authorize('update', $maison);

        $maison->body = $request->validated()['body'];

        // Si il y a une image, on la sauvegarde
        if ($request->hasFile('img')) {
            $path = $request->file('img')->store('maisons', 'public');
            $maison->img_path = $path;
        }

        // On sauvegarde les modifications en base de données
        $maison->save();
        return redirect()->route('front.maisons.index');
        // return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(maison $maison)
    {
        // Gate::authorize('delete', $maison);
        $maison->delete();

        return redirect()->back();
    }
}
