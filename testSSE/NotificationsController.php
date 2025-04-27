<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acheteur;
use Illuminate\Notifications\Notification;

class NotificationsController extends Controller
{
    public function index()
    {
        $acheteurs = Acheteur::all();
        return view('sse',compact('acheteurs'));
    }

    public function create(Request $req)
    {
        $item=new Notification();
        $item->message = $req->message;
        $item->idAcheteur = $req->idAcheteur;
        $item->save();

        return response()->json('Ajouter avec succès');
    }
}
