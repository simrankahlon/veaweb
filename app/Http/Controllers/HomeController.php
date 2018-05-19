<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Session;
use DB;
use Auth;

class HomeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {		
        return view('home/index')->with('title','index');
    }

    public function event() {
        return view('home/event')->with('title','event');
    }

    public function testimonials() {
        return view('home/testimonials')->with('title','testimonials');
    }

    public function login() {
        return view('home/login')->with('title','login');
    }

    public function contact() {
        return view('home/contact')->with('title','contact');
    }

    public function download() {
        return view('home/download')->with('title','download');
    }

    public function boosters() {
        return view('home/booster')->with('title','booster');
    }

    public function results() {
        return view('home/results')->with('title','results');
    }

    public function sitemap() {
        return view('home/sitemap')->with('title','sitemap');
    }

    public function aboutsir() {
        return view('home/aboutsir')->with('title','aboutsir');
    }

    public function studentlogin() {
        return view('home/studentlogin')->with('title','studentlogin');
    }
	
	public function helpinghand() {
        return view('home/helpinghand')->with('title','helpginHand');
    }

    public function postStudentlogin(Request $request) {
        $input = $request->all();
        $username = $input['username'];
        $password = $input['password'];
		
		$record = \DB::table('user_student')
                            ->where('username','=',$username)
							->where('userpassword','=',md5($password))                            
                            ->first();
		
        if (!empty($record)) {
            session()->put('Status', 'LoggedIn');
            return redirect('/lesson');
        } else {
            return redirect('/studentlogin');
        }
    }
    
    public function studentSearch(Request $request){
        $input = $request->all();        
        $id = $input['standard'];
        $school_id = $input['school'];
        $module = $input['module'];
        $value = session()->get('Status');
         
        if (isset($value)) {
            
            if($module=='word')
            {
                if($id=='All' && $school_id=='All')
                {
                     $word = \DB::table('word')                       
                            ->orderby('created_at','DESC')
                            ->get();
                }
                else if($id=='All' && $school_id!='All')
                {
                    $word = \DB::table('word')
                            ->where('school_id','=',$school_id)
                            ->orderby('created_at','DESC')
                            ->get();

                }
                else if($id!='All' && $school_id=='All')
                {
                    $word = \DB::table('word')
                            ->where('std_id','=',$id)
                            ->orderby('created_at','DESC')
                            ->get();
                }
                else
                {
                     $word = \DB::table('word')
                            ->where('std_id','=',$id)
                            ->where('school_id','=',$school_id)
                            ->orderby('created_at','DESC')
                            ->get();
                }

                $standard = array('All' => 'All Standard','8'=>'8 STD','9'=>'9 STD','10'=>'10 STD');
                $school = array('All' => 'All Schools') + \DB::table('schools')->orderBy('name', 'asc')->lists('name', 'id');
                if (!empty($word)) {
                   return view('home/word')->with('word',$word)->with('title','word')->with('id',$id)->with('school_id',$school_id)->with('standard',$standard)->with('school',$school);
                } else {
                    return view('home/word')->with('word','')->with('title','word')->with('id',$id)->with('school_id',$school_id)->with('standard',$standard)->with('school',$school);
                }
            }
            else
            {
                if($id=='All' && $school_id=='All')
                {
                     $essay = \DB::table('essay')                       
                            ->orderby('created_at','DESC')
                            ->get();
                }
                else if($id=='All' && $school_id!='All')
                {
                    $essay = \DB::table('essay')
                            ->where('school_id','=',$school_id)
                            ->orderby('created_at','DESC')
                            ->get();

                }
                else if($id!='All' && $school_id=='All')
                {
                    $essay = \DB::table('essay')
                            ->where('std_id','=',$id)
                            ->orderby('created_at','DESC')
                            ->get();
                }
                else
                {
                     $essay = \DB::table('essay')
                            ->where('std_id','=',$id)
                            ->where('school_id','=',$school_id)
                            ->orderby('created_at','DESC')
                            ->get();
                }
                $standard = array('All' => 'All Standard','8'=>'8 STD','9'=>'9 STD','10'=>'10 STD');
                $school = array('All' => 'All Schools') + \DB::table('schools')->orderBy('name', 'asc')->lists('name', 'id');
                if (!empty($essay)) {
                   return view('home/essay')->with('essay',$essay)->with('title','essay')->with('id',$id)->with('school_id',$school_id)->with('standard',$standard)->with('school',$school);
                } else {
                    return view('home/essay')->with('essay','')->with('title','essay')->with('id',$id)->with('school_id',$school_id)->with('standard',$standard)->with('school',$school);
                }
            }
        } else {
            return redirect('/studentlogin');
        }
        
    }
    
    public function studentLogout(){
        \Session::flush();
        return redirect('/studentlogin');
    }
    
    public function lessonList() {
        $value = session()->get('Status');
        if (isset($value)) {         
            $list = DB::table('content')->get();           
            if (!empty($list)) {
                // dd($list);
                return view('home.lessonlist')->with('list', $list)->with('title','lesson');
            } else {
                return view('home.lessonlist')->with('list', '')->with('title','lesson');
            }
        } else {
            return redirect('/studentlogin');
        }
    }
    
     public function lesson($id) {
        $value = session()->get('Status');
         
        if (isset($value)) {
            $lesson = \DB::table('content')
                        ->where('id','=',$id)
                        ->first();
          
            if (!empty($lesson)) {
               return view('home/lesson')->with('id', $lesson->id)->with('lessontitle', $lesson->title)->with('title','lesson');
            } else {
                return view('home/lesson')->with('id', '')->with('lessontitle', '')->with('title','lesson');
            }
        } else {
            return redirect('/studentlogin');
        }
    }
    
    public function tense() {

        $value = session()->get('Status');
        
        if (isset($value)) {
         
            $list = DB::table('tenses')->get();
           
            if (!empty($list)) {
                // dd($list);
                return view('home.tense')->with('list', $list)->with('title','Tense');
            } else {
                return view('home.tense')->with('list', '')->with('title','Tense');
            }
        } else {
            return redirect('/studentlogin');
        }
    }
    
     public function tenselist($id) {
        $value = session()->get('Status');
         
        if (isset($value)) {
            $tenses = \DB::table('tenses')
                        ->where('id','=',$id)
                        ->first();
          
            if (!empty($tenses)) {
               return view('home/tenses')->with('id', $tenses->id)->with('tensetitle', $tenses->title)->with('title','Tenses');
            } else {
                return view('home/tenses')->with('id', '')->with('tensetitle', '')->with('title','Tenses');
            }
        } else {
            return redirect('/studentlogin');
        }
    }
   
    public function studentWord() {
        $value = session()->get('Status');
         
        if (isset($value)) {
            $word = \DB::table('word')
                      //  ->where('std_id','=',$id)
                        ->orderby('created_at','DESC')
                        ->get();
            $standard = array('All' => 'ALL STANDARD','8'=>'8 STD','9'=>'9 STD','10'=>'10 STD');
            $school = array('All' => 'LIST OF SCHOOLS') + \DB::table('schools')->orderBy('name', 'asc')->lists('name', 'id');
            if (!empty($word)) {
               return view('home/word')->with('word',$word)
                                       ->with('title','word')
                                       ->with('id','')
                                       ->with('school_id','')
                                       ->with('standard',$standard)
                                       ->with('school',$school);
            } else {
                return view('home/word')->with('word','')
                                        ->with('title','word')
                                        ->with('id','')
                                        ->with('school_id','')
                                        ->with('standard',$standard)
                                        ->with('school',$school);
            }
        } else {
            return redirect('/studentlogin');
        }
    }
    
    public function studentEssay() {
        $value = session()->get('Status');
         
        if (isset($value)) {
            $essay = \DB::table('essay')
                      //  ->where('std_id','=',$id)
                        ->orderby('created_at','DESC')
                        ->get();
           $standard = array('All' => 'ALL STANDARD','8'=>'8 STD','9'=>'9 STD','10'=>'10 STD');  
          $school = array('All' => 'LIST OF SCHOOLS') + \DB::table('schools')->orderBy('name', 'asc')->lists('name', 'id');
            if (!empty($essay)) {
               return view('home/essay')->with('essay',$essay)
                                        ->with('title','essay')
                                        ->with('id','')
                                        ->with('school_id','')
                                        ->with('standard',$standard)
                                        ->with('school',$school);
            } else {
                return view('home/essay')->with('title','essay')
                                         ->with('id','')
                                         ->with('school_id','') 
                                         ->with('standard',$standard)
                                         ->with('school',$school);
            }
        } else {
            return redirect('/studentlogin');
        }
    }

 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
