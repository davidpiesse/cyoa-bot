<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $fillable = [
        'name', 'description', 'tags','webhook','active',
    ];

    public function pages(){
        return $this->hasMany(Page::class);
    }

    public function first_page(){
        return Page::find($this->first_page);
    }

    public function registerStartStoryCommand(){
//        $command = new  \App\Commands\StartStoryController();
//        \Telegram::addCommand($command);
    }

}
