<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRandomTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('random_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('random_name');
            $table->string('guild_id');
            $table->string('guild_name');
            $table->string('member_id');
            $table->string('member_name');
            $table->decimal('point', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('random_transactions');
    }
}
