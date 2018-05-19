<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Word;
use App\Http\Requests\WordRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class WordController extends Controller {

    public function index() {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {          
                $word = Word::orderBy("created_at","desc")->get();
                return view('word.index')->with('word', $word)->with('title', 'word');
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
                $standard = array('' => 'Select a standard','8'=>'8 STD','9'=>'9 STD','10'=>'10 STD');
                $school = array('' => 'Select a school') + \DB::table('schools')->orderBy('name', 'asc')->lists('name', 'id');
                return view('word.create')->with('standard',$standard)->with('title', 'word')->with('school',$school);
                        
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
    public function store(WordRequest $request) { 
        $input = $request->all();
       // $input = Request::all();
        $title = $input['title'];
        $std_id = $input['std_id'];
        $school = $input['school'];
      
        if ($request->hasFile('worddoc')) {
            if ($request->file('worddoc')->isValid()) {
                $destinationPath = 'uploads/word/'; // upload path
                $original_file_name = $request->file('worddoc')->getClientOriginalName();                
                $extension = $request->file('worddoc')->getClientOriginalExtension(); // getting image extension
                $fileName = md5(microtime() . $request->file('worddoc')->getClientOriginalName()) . '.' . $extension; // renameing file
                $request->file('worddoc')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $filepath = $destinationPath . $fileName;
                $data = array(
                    'std_id' => $std_id,
                    'school_id' => $school,
                    'title' => $title,
                    'worddoc' => $fileName,
                    'created_at' => date('Y-m-d h:i:s')
                );
                
                $waste_profile_file = \DB::table('word')
                                            ->insertGetId($data);
           // Word::create($input);            
            Session::flash('message', 'Word document uploaded successfully!');
       
        return redirect('word');
        }
      } 
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $word = Word::findOrFail($id);
        return view('word.show')->with('word', $word)->with('title', 'word');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {       
        $word = Word::findOrFail($id);
        $standard = array('' => 'Select a standard','8'=>'8 STD','9'=>'9 STD','10'=>'10 STD');
        $school = array('' => 'Select a school') + \DB::table('schools')->orderBy('name', 'asc')->lists('name', 'id');
        return view('word.edit')->with('word', $word)->with('standard',$standard)->with('title', 'word')->with('school', $school);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WordRequest $request, $id) {
      
        $word = Word::findOrFail($id);
        $input = $request->all();
        $title = $input['title'];
        $std_id = $input['std_id'];
        $school = $input['school'];
        
        if ($request->hasFile('worddoc')) {            
            if ($request->file('worddoc')->isValid()) {
                $destinationPath = 'uploads/word/'; // upload path
                $original_file_name = $request->file('worddoc')->getClientOriginalName();                
                $extension = $request->file('worddoc')->getClientOriginalExtension(); // getting image extension
                $fileName = md5(microtime() . $request->file('worddoc')->getClientOriginalName()) . '.' . $extension; // renameing file
                $request->file('worddoc')->move($destinationPath, $fileName); // uploading file to given path
                // sending back with message
                $filepath = $destinationPath . $fileName;
                $data = array(
                    'school_id' => $school,
                    'std_id' => $std_id,
                    'title' => $title,
                    'worddoc' => $fileName,
                    'updated_at' => date('Y-m-d h:i:s')
                );
                
                $waste_profile_file = \DB::table('word')
                                            ->where('id', $id)
                                            ->update($data);
        
        }
        Session::flash('message', 'Word document uploaded successfully!');
        return redirect('word');
     }
     else
     {
         $data = array(
                    'school_id' => $school,
                    'std_id' => $std_id,
                    'title' => $title,                    
                    'updated_at' => date('Y-m-d h:i:s')
                );
                
                $waste_profile_file = \DB::table('word')
                                            ->where('id', $id)
                                            ->update($data);
                  Session::flash('message', 'Word updated successfully!');
        return redirect('word');
     }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Word::destroy($id);
        return redirect('word');
    }

}