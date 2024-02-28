<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_users';  //Mendefinisikan nama tabel yang digunakan
    protected $primarykey = 'user_id'; //Mendefinisikan primary key dari tabel
}

