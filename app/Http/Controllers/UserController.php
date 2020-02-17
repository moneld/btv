<?php

namespace App\Http\Controllers;

use App\Notifications\UserCreate;
use App\User;

use Illuminate\Http\Request;
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
        $users = User::all();
        return view('backend.utilisateurs.index',compact('users'));
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
            'service' => ['required', 'string',  'max:255'],
        ]);

      $password = Str::random(12);
      $user = new User();

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->date_naissance = $request->date_naissance;
        $user->password = bcrypt($password);
        $user->service = $request->service;
        $user->role = $request->role;

        $user->save();

        $user->notify(new UserCreate($request->prenom, $request->email,$password));

        return back()->with('success','Utilisateur ajouté avec succès.');

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
            'service' => ['required', 'string',  'max:255'],
        ]);

        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;
        $user->date_naissance = $request->date_naissance;
        $user->service = $request->service;
        $user->role = $request->role;

        $user->save();

        return back()->with('success','Utilisateur modifié avec succès.');
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
        return back()->with('success','Utilisateur supprimé avec succès.');
    }
}
