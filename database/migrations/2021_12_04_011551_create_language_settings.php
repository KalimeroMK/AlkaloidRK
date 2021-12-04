<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateLanguageSettings extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create( 'language_setting', function( Blueprint $table ) {
				$table->string( 'title' );
				$table->text( 'description' );
				$table->string( 'address' );
				$table->unsignedInteger( 'language_id' )->index();
				$table->foreign( 'language_id' )->references( 'id' )->on( 'languages' )->onDelete( 'cascade' );
				$table->unsignedInteger( 'setting_id' )->index();
				$table->foreign( 'setting_id' )->references( 'id' )->on( 'settings' )->onDelete( 'cascade' );
				$table->primary( [ 'language_id', 'setting_id' ] );
				$table->timestamps();
			} );
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists( 'language_setting' );
		}
	}
