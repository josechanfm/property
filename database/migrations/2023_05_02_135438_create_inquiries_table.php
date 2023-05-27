<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('community_id')->nullable();
            $table->bigInteger('parent_id')->default(0);
            $table->bigInteger('root_id')->default(0);
            $table->string('honorific')->nullable();
            $table->string('name')->nullable(); 
            $table->string('title');
            $table->string('content')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('language')->nullable();
            $table->string('admin_user_id')->nullable();
            $table->date('request_date')->nullable();
            $table->date('response_date')->nullable();
            $table->date('response')->nullable();
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
        Schema::dropIfExists('inquiries');
    }
};
