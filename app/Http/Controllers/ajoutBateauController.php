<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ajoutBateauController extends Controller
{
    public function create()
    {
        return view('admin.ajoutBateau');
    }
    public function store()
    {

    }
}
