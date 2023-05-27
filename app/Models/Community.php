<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    
    public function adminUsers(){
        return $this->belongsToMany(AdminUser::class);
    }
    public function buildings(){
        return $this->hasMany(Building::class);
    }
    public function members(){
        return $this->belongsToMany(Member::class);
    }

    public function hasUser($user){
        return in_array($user->id,$this->adminUsers()->get()->pluck('id')->toArray());
    }
}
