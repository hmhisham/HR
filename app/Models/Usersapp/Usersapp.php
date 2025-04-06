<?php

namespace App\Models\Usersapp;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Usersapp extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = "usersapp";
    protected $hidden = ['password'];

    /**
     * تعيين كلمة المرور مع التشفير
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * التحقق من كلمة المرور
     */
    public function verifyPassword($password)
    {
        return Hash::check($password, $this->password);
    }



}
