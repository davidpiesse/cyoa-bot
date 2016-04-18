<?php

namespace App;

use Illuminate\Support\Facades\Log;

class PageBuilder
{

    public static function build(Page $page)
    {
//        build a reply message object
        $result = [];
        $result['text'] = "*" . $page->title . "*" . PHP_EOL;
        $result['text'] .= $page->content;
        //add actions to end
        $result['text'] .= PHP_EOL.'What do you do?'.PHP_EOL;
        foreach($page->actions as $action){
            $result['text'] .= "_".$action->description."_".PHP_EOL;
        }

        $result['parse_mode'] = $page->parse_mode;
        //get actions
        $result['reply_markup'] = \Telegram::replyKeyboardMarkup([
            'keyboard' => self::convertActionsToButtons($page->actions),
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);;
//        $result['reply_markup'] = self::convertActionsToButtons($page->actions);
        //build keyboard
        return $result;
    }

    public static function convertActionsToButtons($actions)
    {
        $result = [];
        //single row each - limit to 5?
        foreach($actions as $action){
            array_push($result,[sprintf('/%s %s',$action->type, $action->name)]);
//            Log::info(json_encode($action));
        }
        return $result;
    }
}