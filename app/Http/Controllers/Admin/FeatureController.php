<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::all()->sortByDesc('id');

        return view('admin.pages.features.index' ,compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  FeatureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FeatureRequest $request)
    {
        try {
            $request->store();

            return add_response();
        } catch (\Throwable $e) {
            return error_response();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $feature = Feature::findOrFail($id);

        return view('admin.pages.features.edit' ,compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  FeatureRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FeatureRequest $request, $id)
    {
        try {
            $request->update($id);

            return update_response();
        } catch (\Throwable $e) {
            return error_response();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Feature::findOrFail($id)->delete();

        return redirect()->back();
    }
}
