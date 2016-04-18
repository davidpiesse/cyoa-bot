<?php

use Illuminate\Database\Seeder;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create a basic story and one user
        $user = \App\User::create([
            'name' => 'David P',
            'email' => 'piesse@gmail.com',
            'password' => bcrypt('password'),
            'telegram_id' => 'mapdev',
        ]);

        $story = \App\Story::create([
            'name' => 'Monster Story',
            'description' => 'A short demo story',
            'tags' => 'story,cyoa,monster',
            'webhook' => env('WEBHOOK_URL'),
            'active' => true,
        ]);

        //pages 3 -start - middle -end
        $page0 = \App\Page::create([
            'title' => 'The Beginning',
            'content' => 'A path is before you',
            'story_id' => $story->id,
        ]);        //pages 3 -start - middle -end
        $page1 = \App\Page::create([
            'title' => 'The Path',
            'content' => 'A path is before you with a fork in it',
            'story_id' => $story->id,
        ]);        //pages 3 -start - middle -end
        $page2 = \App\Page::create([
            'title' => 'Dark Path',
            'content' => 'You get stuck in a path with a monster',
            'story_id' => $story->id,
        ]);
        $page3 = \App\Page::create([
            'title' => 'Castle',
            'content' => 'You find a castle',
            'story_id' => $story->id,
        ]);
        $page4 = \App\Page::create([
            'title' => 'End',
            'content' => 'You die fat and old in the castle',
            'story_id' => $story->id,
        ]);

        $story->first_page = $page0->id;
        $story->save();

        //actions - start, left, right, back
        $action1 = \App\Action::create([
            'name'=>'forward',
            'description'=>'Move forward',
            'type'=>'go',
//            'parameters'=>json_encode(['hp' => '100']),
            'page_id'=>$page0->id,
            'next_page'=>$page1->id,
        ]);
        $action2 = \App\Action::create([
            'name'=>'Left',
            'description'=>'Take the left path',
            'type'=>'go',
            'page_id'=>$page1->id,
            'next_page'=>$page2->id,
        ]);
        $action3 = \App\Action::create([
            'name'=>'Right',
            'description'=>'Take the right path',
            'type'=>'go',
            'page_id'=>$page1->id,
            'next_page'=>$page3->id,
        ]);
        $action4 = \App\Action::create([
            'name'=>'Back',
            'description'=>'Retreat slowly',
            'type'=>'go',
            'page_id'=>$page2->id,
            'next_page'=>$page1->id,
        ]);
        $action4 = \App\Action::create([
            'name'=>'Rule',
            'description'=>'Take the castle and rule',
            'type'=>'go',
            'page_id'=>$page3->id,
            'next_page'=>$page4->id,
        ]);
        $action5 = \App\Action::create([
            'name'=>'End',
            'description'=>'You win',
            'type'=>'end',
            'page_id'=>$page4->id,
        ]);

    }
}
