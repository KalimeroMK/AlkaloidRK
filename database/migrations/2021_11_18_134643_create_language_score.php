<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateLanguageScore extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('language_score', function(Blueprint $table) {
                $table->unsignedInteger('language_id')->index();
                $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
                $table->unsignedBigInteger('score_id')->index();
                $table->foreign('score_id')->references('id')->on('scores')->onDelete('cascade');
                $table->string('team1');
                $table->string('team2');
                $table->primary(['language_id', 'score_id']);
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
            Schema::dropIfExists('language_score');
        }
    }
