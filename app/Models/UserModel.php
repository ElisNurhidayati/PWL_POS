<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Model
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primarykey = 'user_id'; 
    /** 
     * 
     *@var array
     *
     */
    protected $fillable  = ['level_id', 'username', 'nama', 'password'];

    public function level(): HasMany
    {
        return $this->hasMany(LevelModel::class, 'level_id', 'level_id');
    }
}