<?php

namespace App\Telegram\Commands;

use App\Adventure;
use App\Helpers;
use App\Story;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class SelectStoryCommand extends Command
{
    protected $name = "selectstory";

    protected $description = "Pick a story to play";

    public function handle($arguments)
    {
        $this->replyWithChatAction(['action' => Actions::TYPING]);
        //argument is the story id
        $adventure = Adventure::where('telegram_chat_id',$this->getUpdate()->getMessage()->getChat()->getId())
            ->where('active',true)
            ->where('complete',false)
            ->first();
        if($adventure == null) {
            $this->replyWithMessage(['text' => "Choose a story from the list below"]);
            //get a list of stories from the db - max 10 - new / popular etc.
            $list = "";
            $id_array = "";
            foreach (Story::all() as $story) {
                $list .= sprintf('[%s] %s - %s ' . PHP_EOL, $story->id, $story->name, $story->description);
                $id_array[] = '/startstory ' . strval($story->id);
            }
            $this->replyWithMessage(['text' => $list, 'reply_markup' => Helpers::makeKeyboard($id_array)]);
        }
        else{
            //already has an adventure!
            $this->replyWithMessage(['text' => 'You already have a story in progress. Go to /start to change it']);
        }
    }
}