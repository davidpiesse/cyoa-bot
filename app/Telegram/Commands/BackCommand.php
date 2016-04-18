<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class BackCommand extends Command
{
    protected $name = "back";

    protected $description = "Goes back a page";

    public function handle($arguments)
    {
        //go back a page
    }
}