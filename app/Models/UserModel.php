<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Casts\Attribute; 
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable implements JWTSubject
{

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'level_id',
        'username', 
        'nama', 
        'password',
        'image'//Tambahan
    ];

    public function getJWTIdentifier() {
        return $this->getKey();
    }

    public function getJWTCustomClaims() {
        return [];
    }

    public function level() { 
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id'); 
    } 
    
    // protected function image(): Attribute {
    //      return Attribute::make( 
    //         get: fn ($image) => url('/storage/posts/' . $image), 
    //     ); 
    // }
}


    //use HasFactory; // Gunakan HasFactory trait bersama dengan Notifiable

    //protected $table = 'm_user';
    //protected $primaryKey = 'user_id';
    
    // Atribut yang dapat diisi secara massal
    //protected $fillable = ['level_id', 'username', 'nama', 'password'];
