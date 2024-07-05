<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class MailfromClient extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'mail_from_clients';

    protected $fillable =[
        'full_name',
        'email',
        'content',
    ];
}
