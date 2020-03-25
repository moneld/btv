<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Notifications\UserCreate;
use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        //
        $users = User::with('service')->get();
        $services = Service::select('id','libelle')->get();

        return view('backend.utilisateurs.index',compact('users','services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //

        $this->validate($request,[
            'nom' => ['required', 'string',  'max:255'],
            'prenom' => ['required', 'string',  'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'date_naissance' => ['required', 'date'],
        ]);

      $password = Str::random(12);
      $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->date_naissance = $request->date_naissance;
        $user->password = bcrypt($password);
        $user->service_id = $request->service_id;
        $user->role = $request->role;

        $user->save();

        $user->notify(new UserCreate($request->prenom, $request->email,$password));

        return back()->withSuccess('Utilisateur ajouté avec succès.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function show(Users $users)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Users  $users
     * @return \Illuminate\Http\Response
     */
    public function edit(Users $users)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Users $users
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, User $user)
    {
        //

        $this->validate($request,[
            'nom' => ['required', 'string',  'max:255'],
            'prenom' => ['required', 'string',  'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'date_naissance' => ['required', 'date'],
        ]);

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->date_naissance = $request->date_naissance;
        $user->service_id = $request->service_id;
        $user->role = $request->role;

        $user->save();

        return back()->withSuccess('Utilisateur modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return back()->withSuccess('Utilisateur supprimé avec succès.');
    }

    public function changePassword(Request $request)
    {
        $this->validate($request,[
            'password' => 'required|confirmed',
        ]);

        $user = User::find(Auth::id());
        $user->password = bcrypt($request->password);
        $user->default_password_change = true;
        $user->save();

        return redirect()->route('liste-ticket.index')->withSuccess('Mot de passe modifier avec succès');
    }
}
