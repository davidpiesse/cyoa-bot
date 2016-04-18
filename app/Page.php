<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $fillable = [
        'title','content','story_id',
    ];

    public function story(){
        return $this->belongsTo(Story::class);
    }

    public function actions(){
        return $this->hasMany(Action::class);
    }

    public function reply_markup(){
        //convert actions to replay markup item
         return \Telegram::replyKeyboardMarkup([
            'keyboard' => PageBuilder::convertActionsToButtons($this->actions),
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);
    }
}
