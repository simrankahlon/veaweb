<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use Validator;
use App\User;
use App\UserManagement;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ProfileController extends Controller
{
    
    public function index()
    {
        //
        //Check if user is logged in
        if (Auth::check()) {
              if (Auth::user()->role == '1') {
            $users = $user = Auth::user();
            $rolename= \DB::table('mst_user_type')->where('id',$users->role)->get();
            return view('profile.index', ['user' => $users,'activePage'=> ''])->with('rolename',$rolename[0]->name);
            } else {
                Session::flash('message', 'You don\'t have permission to access this module.');
                return redirect('dashboard');
            }
        }
        else{ return redirect('login');}
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        
    }

    
    public function update(Request $request, $id)
    {
         //Check if user is logged in
        if (Auth::check()) {
              if (Auth::user()->role == '1') {
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $cell_number = $request->input('cell_number');
        
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|alpha',
            'last_name' => 'required|alpha',
            'cell_number' => 'required',
        ]);
        

        if ($validator->fails()) {
            return redirect('profile/')
                        ->withInput()
                        ->withErrors($validator);
        }
        else{
            $data= UserManagement::findOrfail($id);
            $data->update([
                'first_name'=>$first_name,
                'last_name'=>$last_name,
                'cell_number'=>$cell_number,
            ]);
            Session::flash('message', 'Successfully updated your profile!');
            return redirect('profile');
        }
        } else {
                Session::flash('message', 'You don\'t have permission to access this module.');
                return redirect('dashboard');
            }
        }
        else{ return redirect('login');}
    }

    
    public function destroy($id)
    {
        //
    }
}
