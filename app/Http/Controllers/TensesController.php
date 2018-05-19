<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Tenses;
use App\Http\Requests\TensesRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class TensesController extends Controller {

    public function index() {

        if (Auth::check()) {
            if (Auth::user()->role == '1') {          
                $tenses = Tenses::latest()->get();
                return view('tenses.index')->with('tenses', $tenses)->with('title', 'Tenses');
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
                return view('tenses.create');
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
    public function store(TensesRequest $request) { 
        $input = $request->all();
       // $input = Request::all();
        Tenses::create($input);
        return redirect('tenses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $tenses = Tenses::findOrFail($id);
        return view('tenses.show')->with('tenses', $tenses)->with('title', 'Tenses');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {       
        $tenses = Tenses::findOrFail($id);
        return view('tenses.edit')->with('tenses', $tenses)->with('title', 'Tenses');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TensesRequest $request, $id) {
        $tenses = Tenses::findOrFail($id);
        $tenses->update($request->all());
        return redirect('tenses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Tenses::destroy($id);
        return redirect('tenses');
    }

}
