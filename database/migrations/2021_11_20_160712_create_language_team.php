<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class CreateLanguageTeam extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('language_team', function(Blueprint $table) {
                $table->string('name');
                $table->string('lastname');
                $table->string('position');
                $table->string('nationality');
                $table->text('bio');
                $table->unsignedInteger('language_id')->index();
                $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
                $table->unsignedBigInteger('team_id')->index();
                $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
                $table->primary(['language_id', 'team_id']);
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
            Schema::dropIfExists('language_team');
        }
    }
