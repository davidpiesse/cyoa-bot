<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserModel extends Migration
{

    public function up()
    {
        // add more columns
       Schema::table('users',function(Blueprint $t){
            $t->string('telegram_id');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['telegram_id']);
        });
    }
}
