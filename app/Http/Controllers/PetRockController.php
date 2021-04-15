<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PetRock;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PetRockController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("petrock.index", [
            "petRocks" => PetRock::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("petrock.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // ddd($request->input());
        PetRock::create([
            "name" => $request->input("name"),
            "bio" => $request->input("bio"),
            "size" => $request->input("size")
        ]);

        return redirect("/petrock");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // TODO: return a view rather than the plain object
        return PetRock::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("petrock.edit", [
            "petRock" => PetRock::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $petRock = PetRock::findOrFail($id);

        //Is there a shorthand way to do this "if exists then assign" from the input set?
        if($request->has("name")){
            $petRock->name = $request->input("name");
        }
        if($request->has("bio")){
            $petRock->bio = $request->input("bio");
        }
        if($request->has("size")){
            $petRock->size = $request->input("size");
        }

        $petRock->save();

        return redirect("/petrock");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PetRock::destroy($id);
        return redirect("/petrock");
    }
}
