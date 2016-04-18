<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class OptionCommand extends Command
{
    protected $name = "option";

    protected $description = "Select an option from a set list";

    public function handle($arguments)
    {
        // the argument contains the option selected
    }
}