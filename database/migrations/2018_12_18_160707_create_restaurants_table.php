<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            // for (temporary) sub domains and easier identification
            $table->string('slug');
            $table->string('domain')->nullable();
            // allows removing a restaurant from public listing
            $table->boolean('is_online')->default(0);
            // allows marking a restaurant for payment arrears
            $table->boolean('is_paid_for')->default(1);
            // allows enabling the form for making reservations
            $table->boolean('is_accepting_reservations')->default(1);
            // allows toggling whether to show a menu to the visitor
            $table->boolean('is_showing_menu')->default(0);

            $table->multiLineString('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->integer('user_id')->unsigned();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
