<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\School;
use App\Http\Requests\SchoolRequest;
use Illuminate\Support\Facades\Input;

class StudentController extends Controller {

    public function index() {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {          
                //$school = School::orderBy("created_at","desc")->get();
                return view('student.index')->with('title', 'student');
            } else {
                Session::flash('message', 'You don\'t have permission to access this module.');
                return redirect('dashboard');
            }
        } else {
            return redirect('login');
        }
    }
	
	public function store(Request $request){
		$input = $request->all();
		$password = $input['password'];
		$data = array('userpassword' => md5($password));
		
        $student = \DB::table('user_student')
                    ->where('id', 1)
                    ->update($data);      
        
        Session::flash('message', 'Password updated successfully!');
        return redirect('studentpass');
		
	}
}