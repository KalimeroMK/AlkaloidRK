<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;

	class CreateSettingsTable extends Migration {
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create( 'settings', function( Blueprint $table ) {
				$table->increments( 'id' );
				$table->string( 'mainurl' );
				$table->string( 'email' );
				$table->string( 'featured_image' );
				$table->string( 'link' );
				$table->string( 'phone' );
				$table->string( 'twitter' );
				$table->string( 'facebook' );
				$table->string( 'skype' );
				$table->string( 'linkedin' );
				$table->string( 'gplus' );
				$table->string( 'youtube' );
				$table->string( 'flickr' );
				$table->string( 'pinterest' );
				$table->string( 'analytics_code' );
				$table->text( 'mailchimp_form' );

				$table->timestamps();
			} );
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists( "settings" );
		}
	}
