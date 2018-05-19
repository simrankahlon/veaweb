<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Support\Facades\Input;
use Hash;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectPath = '/dashboard';
    protected $loginPath = '/login';
    protected $username = 'username';
    protected $redirectAfterLogout = '/login';
    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['getLogout','viewPassword','updatePassword']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:100',
            'last_name' => 'required|max:100',
            'username' => 'required|email|max:255|unique:user',
            'password' => 'required|confirmed|min:6',
            'cell_number' => 'required|min:10|max:15',
            'role' => 'required',
            
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
            'cell_number' => $data['cell_number'],
            'role' => $data['role'],
        ]);
    }
    
    
    public function viewPassword()
    {
        if(!$user = \Auth::user()) {return redirect()->route('login');}
        else{ return view('profile.change-password')->with('activePage','');}
    }
    public function updatePassword()
    {

        if(!$user = \Auth::user()) {return redirect()->route('login');}
        else{
            $rules = array(
                'old_password' => 'required',
                'password' => 'required|alphaNum|between:6,16|confirmed'
            );

            $validator = Validator::make(Input::all(), $rules);

            if ($validator->fails()) {
                return redirect('change-password')->withErrors($validator);
            } else {
                if (!\Hash::check(Input::get('old_password'), $user->password)) {
                    return redirect('change-password')->withErrors('<li>Your old password does not match</li>');
                } else {
                    $user->password = bcrypt(Input::get('password'));
                    $user->save();
                    return redirect('change-password')->with("message", "Password have been changed");
                }
            }
        }
    }
}
