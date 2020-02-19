<?php

namespace App\Http\Controllers;

use App\Models\ListeTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ListeTicketController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //
    public function index()
    {
       $listes = null;

       if(Auth::user()->service !== null){
           $listes = ListeTicket::where('service_id',Auth::user()->service)->get();
       }else{
           $listes = ListeTicket::all();
       }
        return view('backend.liste-ticket.index',compact('listes'));
    }

    public function show(ListeTicket $liste)
    {
        return view('backend.liste-ticket.show',compact('liste'));
    }

    public function valider(ListeTicket $liste)
    {
        $liste->statut = true;
        $liste->save();
        return back()->withSuccess('Ticket validé avec succès.');
    }
}
