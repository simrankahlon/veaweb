<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;
use Illuminate\Support\Str;
use Mail;
use App\User;
use App\UserManagement;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class UserManagementController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //Check if user is logged in
        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                $users = \DB::table('user')
                        ->join('mst_user_type', 'user.role', '=', 'mst_user_type.id')
                        ->select('user.*', 'mst_user_type.name')
                        ->orderby('last_name', 'ASC')
                        ->paginate(5);
                return view('user-management.index', ['users' => $users, 'activePage' => 'master-settings', 'activeSegment' => 'user-management']);
            } else {
                Session::flash('message', 'You don\'t have permission to access this module.');
                return redirect('dashboard');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                $role = array('' => 'Select a Role') + \DB::table('mst_user_type')->orderBy('name', 'asc')->lists('name', 'id');
                return view('user-management.create')->with('role', $role)->with('activeSegment', 'user-management')->with('activePage', 'master-settings');
            } else {
                Session::flash('message', 'You don\'t have permission to access this module');
                return redirect('dashboard');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                //$input=$request->all(); //Fetch all form input data
                $first_name = $request->input('first_name');
                $last_name = $request->input('last_name');
                $username = $request->input('username');
                //$password = $request->input('password');
                $password = Str::random(6);
                $cell_number = $request->input('cell_number');
                $role = $request->input('role');

                $validator = Validator::make($request->all(), [
                            'first_name' => 'required|alpha',
                            'last_name' => 'required|alpha',
                            'username' => 'required|email|unique:user',
                            //'password' => 'required|confirmed|min:6',
                            'cell_number' => 'required',
                            'role' => 'required',
                ]);


                if ($validator->fails()) {
                    return redirect('user-management/create')
                                    ->withInput()
                                    ->withErrors($validator);
                } else {
                    UserManagement::create([
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'username' => $username,
                        'password' => bcrypt($password),
                        'cell_number' => $cell_number,
                        'role' => $role
                    ]);
                    $data = array(
                        'name' => $first_name,
                        'password' => $password,
                        'username' => $username,
                    );
                    Mail::send('email.usercreated', $data, function ($message) use($data) {
                        $message->from('admin@airvacservices.com', 'Admin');
                        $message->to($data['username'], $data['name'])->subject('Welcome to custom Services');
                        //$message->to('hiteshvrane@gmail.com', 'Joydeep')->subject('Welcome to Airvac Services');
                        $message->bcc('hrane@smartsight.in', 'Hitesh');
                    });
                    Session::flash('message', 'Successfully created user!');
                    return redirect('user-management');
                }
            } else {
                Session::flash('message', 'You don\'t have permission to access this module');
                return redirect('dashboard');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                $role = array('' => 'Select a Role') + \DB::table('mst_user_type')->orderBy('name', 'asc')->lists('name', 'id');
                $user = User::findOrFail($id);
                // show the edit form
                return view('user-management.edit')
                                ->with('user', $user)->with('role', $role)->with('activeSegment', 'user-management')->with('activePage', 'master-settings');
            } else {
                Session::flash('message', 'You don\'t have permission to access this module.');
                return redirect('dashboard');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {

                $first_name = $request->input('first_name');
                $last_name = $request->input('last_name'); 
                $password = $request->input('password');
                $cell_number = $request->input('cell_number');
                $role = $request->input('role');

                $validator = Validator::make($request->all(), [
                            'first_name' => 'required|alpha',
                            'last_name' => 'required|alpha',
                            'cell_number' => 'required',
                            'role' => 'required',
                ]);
                if ($validator->fails()) {
                    return redirect('user-management/' . $id . '/edit')
                                    ->withInput(Input::except('password'))
                                    ->withErrors($validator);
                } else {
                    $data = UserManagement::findOrfail($id);
                    $data->update([
                        'first_name' => $first_name,
                        'last_name' => $last_name,
                        'cell_number' => $cell_number,
                        'role' => $role
                    ]);
                    Session::flash('message', 'Successfully updated the user!');
                    return redirect('user-management');
                }
            } else {
                Session::flash('message', 'You don\'t have permission to access this module.');
                return redirect('dashboard');
            }
        } else {
            return redirect('login');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        // delete
        if (Auth::check()) {
            if (Auth::user()->role == '1') {
                $user = User::find($id);
                $user->delete();
                // redirect
                Session::flash('message', 'Successfully deleted the user!');
                return redirect('user-management');
            } else {
                Session::flash('message', 'You don\'t have permission to access this module.');
                return redirect('dashboard');
            }
        } else {
            return redirect('login');
        }
    }
}