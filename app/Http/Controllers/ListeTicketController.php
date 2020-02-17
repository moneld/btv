<?php

namespace App\Http\Controllers;

use App\Models\ListeTicket;
use Illuminate\Http\Request;

class ListeTicketController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //
    public function index()
    {
       $listes = ListeTicket::all();
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
        return back()->with('success','Ticket validé avec succès.');
    }
}
