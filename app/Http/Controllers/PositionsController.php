<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $positions = Position::all();

        return view('positions.index', compact('positions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);

        $name = ucfirst(strtolower($validated['name']));
        $slug = Str::slug($name, "-");

        Position::create([
            'name' => $name,
            'slug' => $slug
        ]);

        return redirect('positions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show(Position $slug)
    {
        return view('positions.show', [
            'position' => $slug
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit(Position $slug)
    {
        return view('positions.edit', [
            'position' => $slug
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Position $slug)
    {
        $validated = $request->validate([
            'name' => 'required|max:255'
        ]);

        $name = ucfirst(strtolower($validated['name']));

        $slug->update([
            'name' => $name,
            'slug' => Str::slug($name, "-")
        ]);

        return redirect(route('positions', $slug));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        //
    }
}
