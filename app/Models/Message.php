<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;



class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable =[
        'full_name',
        'email',
        'content',
    ];


    public function notification()
    {
        return $this->hasOne(Notification::class);
    }

}
