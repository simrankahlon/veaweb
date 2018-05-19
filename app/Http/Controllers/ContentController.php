<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Content;
use App\Http\Requests\ContentRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class ContentController extends Controller {

    public function index() {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {          
                $content = Content::latest()->get();
                return view('content.index')->with('content', $content)->with('title', 'lesson');
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
                return view('content.create');
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
    public function store(ContentRequest $request) { 
        $input = $request->all();
       // $input = Request::all();
        Content::create($input);
        return redirect('content');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $content = Content::findOrFail($id);
        return view('content.show')->with('content', $content)->with('title', 'lesson');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {       
        $content = Content::findOrFail($id);
        return view('content.edit')->with('content', $content)->with('title', 'lesson');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContentRequest $request, $id) {
        $content = Content::findOrFail($id);
        $content->update($request->all());
        return redirect('content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Content::destroy($id);
        return redirect('content');
    }

}
