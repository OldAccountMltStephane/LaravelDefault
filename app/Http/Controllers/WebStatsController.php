<?php

namespace App\Http\Controllers;

use App\Webstats;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WebStatsController extends Controller
{
    public static function addStat(String $category, String $informations)
    {
        $s = new Webstats;
        $s->hour = time();
        $s->category = $category;
        $s->informations = $informations;
        $s->user = Auth::user() ? Auth::user() : "guest";
        $s->save();
    }
}
