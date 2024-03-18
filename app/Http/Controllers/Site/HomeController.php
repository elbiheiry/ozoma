<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\InvitationType;
use App\Models\InvitationTypeTemplate;
use App\Models\Package;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $faqs = Faq::all()->sortByDesc('id');
        $features = Feature::all()->sortByDesc('id');
        $packages = Package::all()->sortByDesc('id');
        $testimonials = Testimonial::all()->sortByDesc('id');

        return view('site.pages.index' ,compact('faqs' , 'features' , 'packages' , 'testimonials'));
    }
    public function customize()
    {
        $types = InvitationType::all()->sortByDesc('id');

        return view('site.pages.customize' ,compact('types'));
    }

    public function new_template(Request $request)
    {
        $validation = validator($request->all() , [
            'name' => ['required' , 'string' , 'max:255'],
            'invitation_type_id' => ['not_in:0'],
            'image' => ['required' , 'image' , 'max:2048', 'mimes:png,jpg,jpeg']
        ] ,[] ,[
            'image' => 'صورة الدعوه',
            'name' => 'إسم الدعوه',
            'invitation_type_id' => 'النوع التابع له'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors()->first() , 400);
        }

        try {
            
            InvitationTypeTemplate::create([
                'image' => image_manipulate($request->image , 'templates' , 300 , 250),
                'invitation_type_id' => $request->invitation_type_id,
                'user_id' => auth()->guard('site')->id(),
                'name' => $request->name
            ]);

            return response()->json('تم تحميل صوره الدعوه الجديدة بنجاح' , 200);
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return error_response();
        }
        
    }
}
