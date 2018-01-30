<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    protected $table = 'chat_messages';

    protected $fillable = ['chat_message'];


    public function user()
    {
    	return $this->belongsTo('App\User','id');
    }
}
