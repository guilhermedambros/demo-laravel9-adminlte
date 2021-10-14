<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Str;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

     // API - LOGIN
     public function authenticate(Request $request)
     {
         $credentials = $request->only('email', 'password');
         if (Auth::attempt($credentials)) {
             // Authentication passed...
             $user = Auth::user();
             if(is_null($user->api_token)){
                 $user->api_token = Str::random(80);
                 if(!$user->save()){
                     return response()->json([
                         'success' => false,
                         'status_code' => 500,
                         'message' => 'Não Foi possível Gerar um token válido para o usuário'
                     ]);
                 }
             }
             return response()->json([
                 'success' => true,
                 'id' => $user->id, 
                 'status_code' => 200,
                 'api_token' => $user->api_token, 
                 
             ]);
         }
         return response()->json([
             'success' => false,
             'status_code' => 401,
             'message' => 'E-mail ou senha inválidos!'
         ]);
     }
}
