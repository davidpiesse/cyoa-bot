<?php

namespace App;

class Helpers{
    public static function makeKeyboard($values = []){
        //split into rows
//        if(count($values) == 2){
//
//        }

//        $keyboard = [
//            ['7', '8', '9'],
//            ['4', '5', '6'],
//            ['1', '2', '3'],
//            ['0']
//        ];

        $keyboard = [$values];

        return \Telegram::replyKeyboardMarkup([
            'keyboard' => $keyboard,
            'resize_keyboard' => true,
            'one_time_keyboard' => true
        ]);
    }
}

class PageBuilder{

    public static function build(Page $page){
//        build a reply message object
        $result = [];
        $result['text'] = "*".$page->title."*".PHP_EOL;
        $result['text'] .= $page->content;
        //get actions
        //build keyboard
        return $result;
    }
}