<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adventure extends Model
{
    protected $fillable = ['story_id','telegram_chat_id','last_updated','current_page','active','complete'];

    public function story(){
        return Story::find($this->story_id);
    }

    public function current_page(){
        return Page::find($this->current_page);
    }

    public function last_page(){
        return Page::find($this->last_page);
    }

    public function last_action(){
        return Action::find($this->last_action);
    }
}
