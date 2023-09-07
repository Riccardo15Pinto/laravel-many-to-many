<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $techs = Technology::all();
        return view('admin.technology.index', compact('techs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology = new Technology();
        return view('admin.technology.create', compact('technology'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_new_tech = $request->all();
        $request->validate(
            [
                'label' => 'required|unique:technologies|string|max:30',
                'color' => 'nullable',
                'info' => 'nullable|string',
            ],
            [
                'label.required' => 'Il nome della tipologia è obbligatorio',
                'label.max' => 'Il nome della tipologia è troppo lungo',
                'label.unique' => 'Il nome scelto esiste già'
            ]
        );

        $tech = new Technology();
        $tech->fill($data_new_tech);
        $tech->save();

        return to_route('admin.technologys.index')->with('alert-type', 'success')->with('alert-message', "$tech->label creato con successo");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technology.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technology.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $technology)
    {
        $data_new_tech = $request->all();
        $request->validate(
            [
                'label' => ['required', 'string', 'max:30', Rule::unique('technologies')->ignore($technology)],
                'color' => 'nullable',
                'info' => 'nullable|string',
            ],
            [
                'label.required' => 'Il nome della tipologia è obbligatorio',
                'label.max' => 'Il nome della tipologia è troppo lungo',
            ]
        );

        $technology->update($data_new_tech);
        return to_route('admin.technologys.show', compact('technology'))->with('alert-type', 'success')->with('alert-message', "$technology->label modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return to_route('admin.technologys.index')
            ->with('alert-type', 'success')
            ->with('alert-message', "$technology->label eliminato con successo"); //
    }
}
