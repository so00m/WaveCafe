<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Models\Message;

class Notification extends Model
{
    use HasFactory ;
   
    protected $table = 'notifications';
    
    protected $fillable = [
        'full_name',
        'content',
        'created_at',
        'is_read',
        'message_id',
    ];

    public function message()
    {
        return $this->belongsTo(Message::class);
    }


}
