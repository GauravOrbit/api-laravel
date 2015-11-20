<?php
/**
 * The class for api installation device table
 *
 * @author Gaurav Patel <gaurav.orbit@gmail.com>
 * @package Api
 * @since 1.0
 */
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInstalledAppResourcesAccess extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('app_installations', function(Blueprint $table) {
            $table->string('installation_id', 255)->index()->comment = "Universally Unique Identifier (UUID) for the device";
            $table->string('app_identifier', 255)->index()->comment = "A unique identifier for this installation's client application,In iOS, this is the Bundle Identifier";
            $table->string('client_id', 40);
            $table->string('owner_id', 255);
            $table->string('app_name', 100)->index()->comment = "Client app name";
            $table->string('app_version', 30)->index()->comment = "Client app version";
            $table->string('app_checksum', 255)->index()->comment = "Client app checksum";
            $table->integer('badge')->unsigned()->comment = "last known app badge for ios";
            $table->string('timezone', 100)->comment = "current timezone taget device located, IANA timezone";
            $table->boolean('device_type')->default(0)->unsigned()->index()->comment = "0: web 1 : android, 2 : ios";
            //$table->boolean('push_type')->default(true)->unsigned()->index()->comment = "1 : gcm, 2 : apns";
            //$table->string('device_token', 255)->index()->comment = "apns or gcm generated token used to deliver messages";
            //$table->dateTime('device_token_last_modified', 255)->index();
            $table->boolean('status')->default(true)->unsigned()->index()->comment = "1 : Active, 0 : Inactive";
            $table->timestamps();

            $table->foreign('client_id')
                ->references('id')->on('oauth_clients')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unique(['client_id', 'installation_id', 'app_identifier'], 'app_installation_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('app_installations');
    }
}
