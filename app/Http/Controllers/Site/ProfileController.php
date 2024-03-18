<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        \Jenssegers\Date\Date::setLocale('ar');
        $user = auth()->guard('site')->user();

        return view('site.pages.profile.index' ,compact('user')); 
    }

    public function contact()
    {
        $user = auth()->guard('site')->user();

        return view('site.pages.profile.contact' ,compact('user'));
    }

    public function notifications()
    {
        $user = auth()->guard('site')->user();

        return view('site.pages.profile.notifications' ,compact('user')); 
    }

    public function qr()
    {
        $user = auth()->guard('site')->user();

        return view('site.pages.profile.qr' ,compact('user')); 
    }

    public function settings()
    {
        $user = auth()->guard('site')->user();

        return view('site.pages.profile.settings' ,compact('user')); 
    }

    public function change_phone(Request $request)
    {
        $validator = validator($request->all() , [
            'phone' => ['required' , 'numeric']
        ] ,[] ,[
            'phone' => 'رقم الهاتف'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first() , 400);
        }

        try {
            auth()->guard('site')->user()->update([
                'phone' => $request->phone
            ]);
            return response()->json('تم تغيير البيانات بنجاح' , 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    public function change_settings(Request $request)
    {
        $validator = validator($request->all() , [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.auth()->guard('site')->id()],
        ] ,[] ,[
            'name' => 'الإسم بالكامل',
            'email' => 'البريد الإلكتروني',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first() , 400);
        }

        try {
            auth()->guard('site')->user()->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
            return response()->json('تم تغيير البيانات بنجاح' , 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    public function delete_invitation($id)
    {
        Invitation::findOrFail($id)->delete();

        return redirect()->back();
    }
}
