<?php

namespace App\Http\Controllers;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //
   public function home_page () {
    $d=CarbonPeriod::create('2020-6-1','2020-9-1');
    foreach($d as $date)
    {
       
        echo "    ";
       // count($date);
        echo count($date->format());
    }



    }
}
