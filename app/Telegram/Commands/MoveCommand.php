<?php

namespace App\Telegram\Commands;

use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class MoveCommand extends Command
{
    protected $name = "go";

    protected $description = "Move to another page";

    public function handle($arguments)
    {
        //the argument has the action name
        $this->replyWithMessage(['text'=>'You went '.$arguments]);
//        /parse this with the update object

    }
}