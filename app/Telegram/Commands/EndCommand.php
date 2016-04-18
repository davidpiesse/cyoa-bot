<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class EndCommand extends Command
{
    protected $name = "end";

    protected $description = "End the story";

    public function handle($arguments)
    {
        //ends toe story / closes and adventure
    }
}