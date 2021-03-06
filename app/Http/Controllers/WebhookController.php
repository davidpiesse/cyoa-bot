<?php

namespace App\Http\Controllers;

use App\Adventure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Telegram\Bot\Api as TelegramApi;
use App\Http\Requests;
use Telegram\Bot\Laravel\Facades\Telegram;
use Telegram\Bot\Objects\Update;

class WebhookController extends Controller
{
    public function webhook(Request $request)
    {
        //entry point for all chats / stories
        $update = Telegram::commandsHandler(true);
        //initial checks?

        Log::info('Webhook Received:' . json_encode($update));
        return 'OK';
    }

    public function register()
    {
        //register a new webhook to a specific URL - only one bot so shouldn't be necessary
        $telegram = new TelegramApi();
        $response = $telegram->setWebhook(['url' => env('WEBHOOK_URL')]);
        dd($response);
    }

    public function remove()
    {
        //remove webhook
        $telegram = new TelegramApi();
        $response = $telegram->removeWebhook();
        dd($response);
    }

    private function chatExists($update)
    {
        $chat_id = $update->chat->id;
        $adventure = Adventure::where('telegram_chat_id', $chat_id);
        return $adventure === null;
    }

    private function register_chat()
    {
//        add a new adventure
        $adventure = Adventure::create([

        ]);
    }

    private function getAdventure($id)
    {
        return Adventure::where('telegram_chat_id', $id);
    }
}
