<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdventureController extends Controller
{
    protected $fillable = ['telegram_chat_id', 'telegram_user_id', 'last_updated', 'story_id', ''];

    protected $casts = ['parameters' => 'array'];
}
