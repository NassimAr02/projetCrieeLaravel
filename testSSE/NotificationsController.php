<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Acheteur;
use App\Models\Lot;
use Illuminate\Notifications\Notification;

class NotificationsController extends Controller
{
    public function index()
    {
        $acheteurs = Acheteur::all();
        $lots = Lot::all();
        return view('sse',compact('acheteurs','lots'));
    }

    public function create(Request $req)
    {
        $item=new Notification();
        $item->message = $req->message;
        $item->idBateau = $req->idBateau;
        $item->datePeche = $req->datePeche;
        $item->idAcheteur = $req->idAcheteur;
        $item->idLot = $req->idLot;
        $item->save();

        return response()->json('Ajouter avec succès');
    }
}
