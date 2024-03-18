<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InvitationTypeRequest;
use App\Models\InvitationType;
use Illuminate\Http\Request;

class InvitationTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = InvitationType::all()->sortByDesc('id');

        return view('admin.pages.invitations.types.index' ,compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InvitationTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitationTypeRequest $request)
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
        $type = InvitationType::findOrFail($id);

        return view('admin.pages.invitations.types.edit' ,compact('type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InvitationTypeRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvitationTypeRequest $request, $id)
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
        InvitationType::findOrFail($id)->delete();

        return redirect()->back();
    }
}
