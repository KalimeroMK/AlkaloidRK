<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateScoresTable extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('scores', function(Blueprint $table) {
                $table->id();
                $table->date('date');
                $table->integer('team1goals');
                $table->integer('team2goals');
                $table->string('team1logo');
                $table->string('team2logo');
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
            Schema::dropIfExists('scores');
        }
    }
