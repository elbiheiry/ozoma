<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\UserGroupRequest;
use App\Models\UserGroup;
use Illuminate\Http\Request;

class UserGroupController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  UserGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserGroupRequest $request)
    {
        try {
            $request->store();

            return response()->json('تم إضافة المجموعة بنجاح' , 200);
        } catch (\Throwable $th) {
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
        $group = UserGroup::findOrFail($id);

        return view('site.pages.profile.templates.group' , compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserGroupRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserGroupRequest $request, $id)
    {
        try {
            $request->update($id);

            return response()->json('تم تحديث بيانات المجموعة بنجاح' , 200);
        } catch (\Throwable $th) {
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
        UserGroup::findOrFail($id)->delete();

        return redirect()->back();
    }
}
