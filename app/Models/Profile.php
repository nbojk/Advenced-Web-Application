<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Profile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function isFollowing()
    {
        $user = Auth::user();

        $followers = $this->followers()->exists($user);

        return $followers;
    }

    public function getProfileImage()
    {
        return ($this->image) ? "/storage/$this->image" : "img/no_profile.png";
    }
}
