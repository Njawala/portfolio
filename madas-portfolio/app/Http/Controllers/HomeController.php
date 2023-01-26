<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\Skills;
use App\Models\Resume;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    public function showProfile()
    {
        
        $getData   = Profile::all();

        $current_date = strtotime(date('Y-m-d'));

        foreach($getData as $data){
            $dob = strtotime($data->date_of_birth);
            }
        $dateDiff = abs($current_date - $dob);
        $age = floor($dateDiff / (365*60*60*24));

        $getSkills = DB::select(" SELECT id, name,rate FROM skills  ");
        $getResume = Resume::get();
        $getEdu = Education::get();
        $getExp = Experience::get();
        return view('home',compact('getData','getSkills','getResume','age','getEdu','getExp'));
    }

    // public function showSkills()
    // {
    //     $getSkills = DB::select(" SELECT id, name,rate FROM skills  ");
       
    //     return view('home',compact('getSkills'));
        
    // }


   
}
