<?php

namespace App\Telegram\Commands;

use App\Adventure;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class BeginCommand extends Command
{
    protected $name = "begin";

    protected $description = "Begins a story on its first page and sets up the adventure";

    public function handle($arguments)
    {
        $adventure = Adventure::find($arguments['adventure_id']);
        Log::info(json_encode($adventure));
        $this->replyWithMessage(['text' => "Begun"]);
    }
}