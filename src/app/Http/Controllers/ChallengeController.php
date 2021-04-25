<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    public function solve(): string
    {
        $content = file_get_contents('./challenge.json');
        $items =  collect(json_decode($content))->sortByDesc('date_of_birth');
        $collection = [];
        foreach($items as $item){
            $dob = str_replace('/', '-',$item->date_of_birth);
            $age = $date = null;
            if(!is_null($item->date_of_birth)){
                $date = \Carbon\Carbon::parse($dob);
                $age = $date->diffInYears(now());
            }
            if(is_null($age) || ($age >= 18 && $age <= 65)){
                $item->date_of_birth = $date;
                dispatch(new \App\Jobs\ChallengeJob($item));
            }
        }
        return back()->with(['success' => 'Jobs running. Click on Horizon below to see running jobs']);
    }
}
