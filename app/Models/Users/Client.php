<?php

namespace App\Models\Users;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Users\Subscription;
use App\Models\Common\Image;

class Client extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'surname',
        'birth_date',
        'subscription_id',
        'image_id'
    ];

    public function user() 
    {
        return $this->hasOne(User::Class);
    }

    public function subscription() 
    {
        return $this->hasOne(Subscription::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }
}
