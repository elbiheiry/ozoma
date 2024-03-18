<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InvitationTypeTemplateRequest;
use App\Models\InvitationType;
use App\Models\InvitationTypeTemplate;
use Illuminate\Http\Request;

class InvitationTypeTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $templates = InvitationTypeTemplate::all()->sortByDesc('id');
        $types = InvitationType::all()->sortByDesc('id');

        return view('admin.pages.invitations.templates.index' ,compact('templates' , 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  InvitationTypeTemplateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvitationTypeTemplateRequest $request)
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
        $template = InvitationTypeTemplate::findOrFail($id);
        $types = InvitationType::all()->sortByDesc('id');

        return view('admin.pages.invitations.templates.edit' ,compact('template' , 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  InvitationTypeTemplateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvitationTypeTemplateRequest $request, $id)
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
        InvitationTypeTemplate::findOrFail($id)->delete();

        return redirect()->back();
    }
}
