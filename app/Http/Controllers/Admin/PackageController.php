<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all()->sortByDesc('id');

        return view('admin.pages.packages.index' ,compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
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
        $package = Package::findOrFail($id);

        return view('admin.pages.packages.edit' ,compact('package'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PackageRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, $id)
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
        Package::findOrFail($id)->delete();

        return redirect()->back();
    }
}
