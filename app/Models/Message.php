<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Notification;
use Illuminate\Database\Eloquent\SoftDeletes;


class Message extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'messages';

    protected $fillable =[
        'full_name',
        'email',
        'content',

    ];

    public function notification()
    {
        
        return $this->belongsTo(Notification::class);
    }


}
