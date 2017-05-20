<?php

namespace Hanish\ChatApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chat extends Model
{
    protected $table='chatmessages';
    protected $guarded= ['msgId'];
    protected $primaryKey='msgId';
}
