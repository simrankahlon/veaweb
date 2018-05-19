<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Essay;
use App\Http\Requests\EssayRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class EssayController extends Controller {

    public function index() {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {          
                $essay = Essay::orderBy("created_at","desc")->get();
                return view('essay.index')->with('essay', $essay)->with('title', 'essay');
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
                $standard = array('' => 'Select a standard','8'=>'8 STD','9'=>'9 STD','10'=>'10 STD');
                $school = array('' => 'Select a school') + \DB::table('schools')->orderBy('name', 'asc')->lists('name', 'id');
                return view('essay.create')->with('standard',$standard)->with('title', 'essay')->with('school',$school);
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
    public function store(EssayRequest $request) { 
           $input = $request->all();
       // $input = Request::all();
        $title = $input['title'];
        $school = $input['school'];
        $std_id = $input['std_id'];
      
        if ($request->hasFile('essaydoc')) {
            if ($request->file('essaydoc')->isValid()) {
                $destinationPath = 'uploads/essay/'; // upload path
                $original_file_name = $request->file('essaydoc')->getClientOriginalName();                
                $extension = $request->file('essaydoc')->getClientOriginalExtension(); // getting image extension
                $fileName = md5(microtime() . $request->file('essaydoc')->getClientOriginalName()) . '.' . $extension; // renameing file
                $request->file('essaydoc')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $filepath = $destinationPath . $fileName;
                $data = array(
                    'std_id' => $std_id,
                    'school_id' => $school,
                    'title' => $title,
                    'essaydoc' => $fileName,
                    'created_at' => date('Y-m-d h:i:s')
                );
                
                $waste_profile_file = \DB::table('essay')
                                            ->insertGetId($data);
           // Word::create($input);            
            Session::flash('message', 'Essay document uploaded successfully!');
       
        return redirect('essay');
        }
        else
        {
            return redirect('essay');
        }
      }  
      else
      {
           return redirect('essay');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {      
        $essay = Essay::findOrFail($id);
        return view('essay.show')->with('essay', $essay)->with('title', 'essay');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {       
        $standard = array('' => 'Select a standard','8'=>'8 STD','9'=>'9 STD','10'=>'10 STD');
        $school = array('' => 'Select a school') + \DB::table('schools')->orderBy('name', 'asc')->lists('name', 'id');
        $essay = Essay::findOrFail($id);
        return view('essay.edit')->with('essay', $essay)->with('standard',$standard)->with('title', 'essay')->with('school', $school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EssayRequest $request, $id) {
        $essay = Essay::findOrFail($id);
      //  $essay->update($request->all());
        $input = $request->all();
        $title = $input['title'];
        $std_id = $input['std_id'];
         $school = $input['school'];
        
           if ($request->hasFile('essaydoc')) {
            
            if ($request->file('essaydoc')->isValid()) {
                $destinationPath = 'uploads/essay/'; // upload path
                $original_file_name = $request->file('essaydoc')->getClientOriginalName();                
                $extension = $request->file('essaydoc')->getClientOriginalExtension(); // getting image extension
                $fileName = md5(microtime() . $request->file('essaydoc')->getClientOriginalName()) . '.' . $extension; // renameing file
                $request->file('essaydoc')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $filepath = $destinationPath . $fileName;
                $data = array(
                    'std_id' => $std_id,
                    'school_id' => $school,
                    'title' => $title,
                    'essaydoc' => $fileName,
                    'updated_at' => date('Y-m-d h:i:s')
                );
                
                $waste_profile_file = \DB::table('essay')
                                            ->where('id', $id)
                                            ->update($data);
           // Word::create($input);            
            Session::flash('message', 'Essay document uploaded successfully!');
       
        return redirect('essay');
        }
        }
        else
        {
              $data = array(
                    'std_id' => $std_id,
                    'school_id' => $school,
                    'title' => $title,                   
                    'updated_at' => date('Y-m-d h:i:s')
                );
                
                $waste_profile_file = \DB::table('essay')
                                            ->where('id', $id)
                                            ->update($data);
           // Word::create($input);            
            Session::flash('message', 'Essay updated successfully!');
       
        return redirect('essay');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Essay::destroy($id);
        return redirect('essay');
    }

}
