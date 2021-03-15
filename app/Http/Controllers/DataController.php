<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RawData;
use App\DataFollowUp;

class DataController extends Controller
{
    public function indexRAW()
    {
        // $users = DB::table('users')->get();

        $raw = RawData::orderBy('name', 'ASC')->get();
        return view('rawdata', ['raw' => $raw]);
    }
}
