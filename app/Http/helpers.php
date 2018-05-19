<?php
function display($id) {
    $array = array('At' => 'At',
        'by' => 'by',
        'for' => 'for',
        'from' => 'from',
        'in' => 'in',
        'of' => 'of', 'off' => 'off', 'on' => 'on', 'out' => 'out', 'through' => 'through', 'till' => 'till',
        'to' => 'to', 'up' => 'up', 'with' => 'with', 'About' => 'About', 'above' => 'About', 'across' => 'About', 'along' => 'About', 'amidst' => 'About', 'among' => 'About',
        'amongst' => 'About', 'around' => 'About', 'before' => 'About', 'below' => 'About', 'beneath' => 'About', 'beside' => 'About',
        'between' => 'About', 'beyond' => 'About', 'inside' => 'About', 'outside' => 'About', 'underneath' => 'About', 'within' => 'About', 'without' => 'About'
    );

    $lesson = \DB::table('content')
            ->where('id', '=', $id)
            ->first();
    $paraone = html_entity_decode($lesson->paraone);

    foreach ($array as $val) {
        $paraone = html_entity_decode(str_replace(' ' . $val . ' ', ' ____ ', $paraone));
    }
    echo $paraone;
}

function displayresult($id) {
    $array = array('At' => 'At',
        'by' => 'by',
        'for' => 'for',
        'from' => 'from',
        'in' => 'in',
        'of' => 'of', 'off' => 'off', 'on' => 'on', 'out' => 'out', 'through' => 'through', 'till' => 'till',
        'to' => 'to', 'up' => 'up', 'with' => 'with', 'About' => 'About', 'above' => 'About', 'across' => 'About', 'along' => 'About', 'amidst' => 'About', 'among' => 'About',
        'amongst' => 'About', 'around' => 'About', 'before' => 'About', 'below' => 'About', 'beneath' => 'About', 'beside' => 'About',
        'between' => 'About', 'beyond' => 'About', 'inside' => 'About', 'outside' => 'About', 'underneath' => 'About', 'within' => 'About', 'without' => 'About'
    );

    $lesson = \DB::table('content')
            ->where('id', '=', $id)
            ->first();
    $paraone = html_entity_decode($lesson->paraone);

    foreach ($array as $val) {
        $paraone = html_entity_decode(str_replace(' ' . $val . ' ', '<span style="color:red; font-weight:bold;"> ' . $val . ' </span> ', $paraone));
    }
    echo $paraone;
}

function displaytense($id){    
    $tenses = \DB::table('tenses')
            ->where('id', '=', $id)
            ->first();
    $paraone = html_entity_decode(strip_tags($tenses->paraone));
    
      $array = array('**1**' => '**1**',
        '**2**' => '**2**',
        '**3**' => '**3**',
        '**4**' => '**4**',
        '**5**' => '**5**',  
        '**6**' => '**6**',
        '**7**' => '**7**', '**8**' => '**8**');
      
     foreach ($array as $val) {
        $paraone = html_entity_decode(str_replace(' ' . $val . ' ', ' ____ ', $paraone));
    }
    
    return $paraone;
}

function displaytenseresult($id) {    
    $tenses = \DB::table('tenses')
            ->where('id', '=', $id)
            ->first();
    $paratwo = html_entity_decode($tenses->paratwo);    
   return $paratwo; 
}

function deleteSingleImage($id){
   
    $word_file = \DB::table('word')
                    ->select('word.*')
                    ->where('id', $id)->first();
  
    if(!empty($word_file)) {     
        $destinationPath = public_path().'/uploads/word/';         
        $file = $destinationPath.$word_file->worddoc;        
        $data = array( 'worddoc' => '');        
        $update = \DB::table('word')
                        ->where('id', $id)
                        ->update($data);        
      //  \Storage::delete($file);
        echo 1;
    }  
}

function deleteSingleDocument($id){
    
    $essay_file = \DB::table('essay')
                    ->select('essay.*')
                    ->where('id', $id)->first();
  
    if(!empty($essay_file)) {     
        $destinationPath = public_path().'/uploads/essay/';         
        $file = $destinationPath.$essay_file->essaydoc;        
        $data = array( 'essaydoc' => '');        
        $update = \DB::table('essay')
                        ->where('id', $id)
                        ->update($data);        
      //  \Storage::delete($file);
        echo 1;
    }  
}

function get_school($school_id){
    $school = \DB::table('schools')
                    ->select('schools.*')
                    ->where('id', $school_id)->first();
    
    if(!empty($school)){
        return $school->name;
    }
}