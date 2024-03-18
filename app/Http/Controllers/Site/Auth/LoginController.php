<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Twilio\Rest\Client;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:site')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('site.auth.login');
    }

    /**
     * Validate the user login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|numeric'
        ], [], [
            $this->username() => 'رقم الهاتف'
        ]);
    }

    public function login(Request $request)
    {
        $validator = validator($request->all(), [
            $this->username() => 'required|numeric'
        ], [], [
            $this->username() => 'رقم الهاتف'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->first(), 400);
        }

        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json('هذا المستخدم غير موجود', 400);
        }

        // $sid = '';
        // $token = '';
        // $client = new Client($sid, $token);

        // if ($user->code()->exists()) {
        //     $user->code()->update([
        //         'code' => rand(1000, 9999)
        //     ]);

        //     $client->messages->create(
        //         // the number you'd like to send the message to
        //         Str::replaceFirst('0', '+20', $user->phone),
        //         [
        //             // A Twilio phone number you purchased at twilio.com/console
        //             'messagingServiceSid' => '',
        //             // the body of the text message you'd like to send
        //             'body' => "برجاء ادخال هذا الكود لتاكيد تسجيل الدخول " . $user->code['code']
        //         ]
        //     );
        // } else {
        //     $user->code()->create([
        //         'code' => rand(1000, 9999)
        //     ]);
        //     $client->messages->create(
        //         // the number you'd like to send the message to
        //         Str::replaceFirst('0', '+20', $user->phone),
        //         [
        //             // A Twilio phone number you purchased at twilio.com/console
        //             'messagingServiceSid' => '',
        //             // the body of the text message you'd like to send
        //             'body' => "برجاء ادخال هذا الكود لتاكيد تسجيل الدخول " . $user->code['code']
        //         ]
        //     );
        // }

        return response()->json($user->id, 200);
    }

    public function code(Request $request)
    {
        $code = $request->code1 . $request->code2 . $request->code3 . $request->code4;
        $user = User::findOrFail($request->user_id);

        if ($user->code()->first()->code == $code) {
            auth()->guard('site')->login($user, true);

            return response()->json('تم تسجيل الدخول بنجاح', 200);
        } else {
            return response()->json('هذا الكود غير صحيح', 400);
        }
    }


    public function logout(Request $request)
    {
        $this->guard()->logout();
        //    $request->session()->flush();
        //    $request->session()->regenerate();
        return redirect('/');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('site');
    }

    public function username()
    {
        return 'phone';
    }
}
