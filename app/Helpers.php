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