<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use Illuminate\Support\Str;
use App\Functions\Helper;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exist = Technology::where('name', $request->name)->first();
        if ($exist) {
            return redirect()->route('admin.technologies.index')->with('error', 'Technology already exists');
        } else {
            $new_tech = new Technology();
            $new_tech->name = $request->name;
            $new_tech->slug = Str::slug($request->name, '-');
            $new_tech->save();
            return redirect()->route('admin.technologies.index')->with('success', 'Technology added successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $val_data = $request->validate([
            'name' => 'required|min:2|max:30',
        ], [
            'name.required' => 'Name is required',
            'name.min' => 'Name is must be more than :min characters',
            'name.max' => 'Name must be less than :max characters'
        ]);


        $exist = Technology::where('name', $request->name)->first();
        if ($exist) {
            return redirect()->route('admin.technologies.index')->with('error', 'Technology already exists');
        }


        $val_data['slug'] = Helper::generateSlug($request->name, Technology::class);



        $technology->update($val_data);


        return redirect()->route('admin.technologies.index')->with('success', 'Technology updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('success', 'Technology deleted successfully');
    }
}
