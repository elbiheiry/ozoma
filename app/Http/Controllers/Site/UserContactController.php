<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\UserContactRequest;
use App\Models\UserContact;
use Illuminate\Http\Request;

class UserContactController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  UserContactRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserContactRequest $request)
    {
        try {
            $request->store();

            return response()->json('تم إضافة جهة الإتصال بنجاح' , 200);
        } catch (\Throwable $th) {
            dd($th->getMessage());
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
        $contact = UserContact::findOrFail($id);

        return view('site.pages.profile.templates.contact' , compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UserContactRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserContactRequest $request, $id)
    {
        try {
            $request->update($id);

            return response()->json('تم تحديث بيانات جهة الإتصال بنجاح' , 200);
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
        UserContact::findOrFail($id)->delete();

        return redirect()->back();
    }
}
