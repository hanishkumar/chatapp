<?php

namespace Hanish\ChatApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Emoji extends Model
{
    protected $table='emoji';
    protected $guarded= ['id'];
    protected $primaryKey='id';
}
