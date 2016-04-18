<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{
    protected $fillable = [
        'name','description','type','page_id','parameters','keyboard'
    ];

    protected $casts = ['parameters' => 'array','keyboard' => 'array'];

    public function page(){
        return $this->belongsTo(Page::class);
    }


}
