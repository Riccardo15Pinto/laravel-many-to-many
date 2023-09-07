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
        $techs = new Technology();
        return view('admin.technology.create', compact('techs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data_new_tech = $request->all();
        $request->validate(
            [
                'label' => 'required|string|max:30',
                'color' => 'nullable|regex:/^#(?:[0-9a-fA-F]{3}){1,2}$/',
                'info' => 'nullable|string',
            ],
            [
                'label.required' => 'Il nome della tipologia è obbligatorio',
                'label.max' => 'Il nome della tipologia è troppo lungo',
                'color.regex' => 'Il colore inserito non è un colore esadecimale valido',
            ]
        );

        $tech = new Technology();
        $tech->fill($data_new_tech);
        $tech->save();

        return to_route('admin.technology.index')->with('alert-tech', 'success')->with('alert-message', "$tech->label creato con successo");
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $tech)
    {
        return view('admin.technology.show', compact('tech'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $tech)
    {
        return view('admin.technology.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Technology $tech)
    {
        $data_new_tech = $request->all();
        $request->validate(
            [
                'label' => ['required', 'string', 'max:30', Rule::unique('technologies')->ignore($tech)],
                'color' => 'nullable|regex:/^#(?:[0-9a-fA-F]{3}){1,2}$/',
            ],
            [
                'label.required' => 'Il nome della tipologia è obbligatorio',
                'label.max' => 'Il nome della tipologia è troppo lungo',
                'color.regex' => 'Il colore inserito non è un colore esadecimale valido',
            ]
        );

        $$tech->update($data_new_tech);
        return to_route('admin.technology.show', compact('type'))->with('alert-type', 'success')->with('alert-message', "$tech->label modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $tech)
    {
        $tech->delete();
        return to_route('admin.technology.index')
            ->with('alert-type', 'success')
            ->with('alert-message', "$tech->label eliminato con successo"); //
    }
}
