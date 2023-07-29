<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reply extends Model
{
    use HasFactory;

    public function comment(){
        return $this->belongsTo(Comment::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function parentReply(){
        return $this->belongsTo(Reply::class, 'parent_reply_id');
    }

    public function replies(){
        return $this->hasMany(Reply::class, 'parent_reply_id');
    }
}
