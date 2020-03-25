<?php

namespace App\Http\Controllers;

use App\Models\ListeTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ListeTicketController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    //
    public function index()
    {

        if (Gate::allows('passwordChange')) {
            $listes = null;

            if(Auth::user()->service !== null){
                $listes = ListeTicket::where('service_id',Auth::user()->service_id)->get();
            }else{
                $listes = ListeTicket::all();
            }
            return view('backend.liste-ticket.index',compact('listes'));
        }else{
            return view('backend.changeDefaultPassword');
        }


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
