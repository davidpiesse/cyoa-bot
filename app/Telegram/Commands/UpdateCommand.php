<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class UpdateCommand extends Command
{
    protected $name = "update";

    protected $description = "Update a users data";

    public function handle($arguments)
    {
//        arguments provide update values
    }
}