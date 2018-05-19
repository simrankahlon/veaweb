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

class SchoolController extends Controller {

    public function index() {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {          
                $school = School::orderBy("created_at","desc")->get();
                return view('school.index')->with('school', $school)->with('title', 'school');
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
    
        if (Auth::check()) {
            if (Auth::user()->role == '1') {               
                return view('school.create')->with('title', 'School');
                        
            } else {
                Session::flash('message', 'You don\'t have permission to access this module');
                return redirect('dashboard');
            }
        } else {
            return redirect('school');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolRequest $request) { 
        $input = $request->all();
       // $input = Request::all();
        $name = $input['name'];
            
                $data = array(                  
                    'name' => $name,                    
                    'created_at' => date('Y-m-d h:i:s')
                );
                
                $School = \DB::table('schools')->insertGetId($data);
           // School::create($input);            
            Session::flash('message', 'Record Inserted successfully!');
       
        return redirect('school');
       
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $school = School::findOrFail($id);
        return view('school.show')->with('school', $school)->with('title', 'School');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {       
        $school = School::findOrFail($id);     
        return view('school.edit')->with('school', $school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolRequest $request, $id) {
      
        $school = School::findOrFail($id);
        $input = $request->all();
        $name = $input['name'];
      
        $data = array(                 
            'name' => $name            
        );

        $school = \DB::table('schools')
                    ->where('id', $id)
                    ->update($data);      
        
        Session::flash('message', 'School updated successfully!');
        return redirect('school');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        School::destroy($id);
        return redirect('school');
    }

}