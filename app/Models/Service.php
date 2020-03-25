<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    protected $guarded = [];

    public function listes()
    {
        return$this->hasMany(ListeTicket::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
