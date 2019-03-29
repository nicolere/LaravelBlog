<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    /**
    * Fields that are mass assignable
    *
    * @var array
    */

    protected $fillable = ['body'];

    protected $appends = ['selfMessage'];
    
    /**
    * A message belong to a user
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getSelfMessageAttribute()
    {
        return $this->user_id === user()->id;
    }
}
