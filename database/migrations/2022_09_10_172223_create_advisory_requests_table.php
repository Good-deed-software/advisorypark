<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvisoryRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisory_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->int('user_id');
            $table->int('listing_user_id');
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('category')->nullable();
            $table->string('listing_name')->nullable();
            $table->string('state_name')->nullable();
            $table->string('city_name')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('pending');
            $table->string('req_type')->nullable();
            $table->tinyint('satisfied')->nullable();
            $table->text('comment')->nullable();
            $table->float('comm')->nullable();
            $table->string('fees')->nullable();
            $table->int('query_box')->nullable();
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
        Schema::dropIfExists('advisory_requests');
    }
}