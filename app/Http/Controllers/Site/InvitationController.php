<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Mail\SendEmail;
use App\Models\Invitation;
use App\Models\InvitationType;
use App\Models\InvitationTypeTemplate;
use App\Models\Package;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;

class InvitationController extends Controller
{
    public function invitation1()
    {
        $types = InvitationType::all()->sortByDesc('id');
        $packages = Package::all()->sortByDesc('id');

        return view('site.pages.invitations.invitation1' , compact('types' , 'packages'));
    }

    public function templates(Request $request , $id)
    {
        $templates = InvitationTypeTemplate::where('invitation_type_id' , $id)
                    ->where('user_id' , null)                    
                    ->orWhere('user_id' , auth()->guard('site')->id())             
                    ->orderBy('id' , 'desc')
                    ->get();

        return view('site.pages.invitations.templates.templates' , compact('templates'));
    }

    public function invitation2($id)
    {
        $invitation = Invitation::findOrFail($id);

        return view('site.pages.invitations.invitation2' , compact('invitation' , 'id'));
    }

    public function invitation3($id)
    {
        $invitation = Invitation::findOrFail($id);
        $user = auth()->guard('site')->user();

        return view('site.pages.invitations.invitation3' , compact('invitation' , 'user' , 'id'));
    }

    public function invitation4($id)
    {
        $invitation = Invitation::findOrFail($id);
        $template = InvitationTypeTemplate::findOrFail($invitation->invitation_type_template_id);

        return view('site.pages.invitations.invitation4' , compact('invitation' ,'template' , 'id'));
    }

    public function invitation5($id)
    {
        $invitation = Invitation::findOrFail($id);
        $user = auth()->guard('site')->user();

        return view('site.pages.invitations.invitation5' , compact('invitation' , 'id' , 'user'));
    }

    public function invitation($id)
    {
        $invitation = Invitation::findOrFail($id);

        return view('site.pages.invitations.invitation' ,compact('invitation'));
    }

    public function store(Request $request)
    {
        $validation = validator($request->all() , [
            'package_id' => ['required']
        ], [] ,[
            'package_id' => 'نوع الباقه'
        ]);

        if ($validation->fails()) {
            return failed_validation($validation->errors()->first());
        }

        try {
            $invitation = Invitation::create([
                'user_id' => auth()->guard('site')->id(),
                'package_id' => $request->package_id,
                'invitation_type_template_id' => $request->template
            ]);

            return response()->json( route('site.invitation2' , ['id' => $invitation->id]), 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    public function update(Request $request , $id)
    {
        // dd($request->all());
        $validation = validator($request->all() , [
            'title' => ['required' , 'string' , 'max:255'],
            'header' => ['required' , 'string' , 'max:255'],
            'sponsor' => ['required' , 'string' , 'max:255'],
            'date' => ['required'],
            'city' => ['required' , 'string' , 'max:255'],
            'address' => ['required' , 'string' , 'max:255'],
            'sign' => $request->sign ? ['max:2048' , 'mimes:png,jpg,jpeg'] : ''

        ], [] ,[
            'title' => 'عنوان الحدث',
            'header' => 'مقدمة الدعوة',
            'sponsor' => 'برعاية',
            'date' => 'تاريخ / وقت الحدث',
            'city' => 'المدينة',
            'address' => 'العنوان',
            'sign' => 'الشعار'
        ]);

        if ($validation->fails()) {
            return failed_validation($validation->errors()->first());
        }

        $invitation = Invitation::findOrFail($id);
        $data = $request->all();

        if ($request->sign) {
            $data['sign'] = image_manipulate($request->sign , 'invitations');
        }

        try {
            $invitation->update($data);

            return response()->json( route('site.invitation3' , ['id' => $invitation->id]), 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    public function update2(Request $request , $id)
    {
        $validation = validator($request->all() , [
            'send_method' => ['required' , 'string' , 'max:255'],

        ], [] ,[
            'send_method' => 'طريقة الإرسال',
        ]);

        if ($validation->fails()) {
            return failed_validation($validation->errors()->first());
        }

        $invitation = Invitation::findOrFail($id);
        $data = $request->all();

        try {
            $invitation->update($data);

            return response()->json( route('site.invitation4' , ['id' => $invitation->id]), 200);
        } catch (\Throwable $th) {
            return error_response();
        }
    }

    public function paymentStripe($id , $status)
    {
        $invitation = Invitation::findOrFail($id);

        return view('site.pages.payment.index' , compact('invitation' , 'id' , 'status'));
    }

    public function payment(Request $request , $id , $status)
    {
        
        $invitation = Invitation::findOrFail($id);
        $user = $invitation->user()->first();
        $contacts = $user->contacts()->get();

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $data = Charge::create ([
                "amount" => $invitation->package['price'],
                "currency" => "SAR",
                "source" => $request->stripeToken,
                "description" => "عمليه دفع دهوه جديده "
        ]);

        $invitation->payment()->create([
            'payment_details' => json_encode($data)
        ]);

        if ($status == 'now') {
            foreach ($contacts as $contact) {
                Mail::to($contact->email)->send(new SendEmail($invitation));    
            }
            
        }
   
        Session::flash('success', 'تم الدفع بنجاح');
           
        return redirect()->route('site.invitation5' ,['id' => $id]);
    }

    
}