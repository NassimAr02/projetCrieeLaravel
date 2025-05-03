<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use Carbon\Carbon;
class createCrieeController extends Controller
{
    public function index(){
        return view('admin.createCriee',[
            
        ]);  
    }
    public function store(Request $request)
    {
        // Désactivez temporairement TOUTE validation de date/heure
        $validated = $request->validate([
            'dateCriee' => 'required|date',
            'heureDebut' => 'required',
            'heureFin' => 'required',
        ]);

        Criee::create($validated);
        
        return redirect()->route('admin.dashboard')
            ->with('success', 'Criée créée avec succès !');
    }
}
