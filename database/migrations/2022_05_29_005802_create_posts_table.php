<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jobber_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('service_title', 50);
            $table->string('service_ville');
            $table->string('service_zone');
            $table->timestamp('deadline');
            $table->text('service_specification');

            $table->unsignedMediumInteger('views')->default(1);
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
        Schema::dropIfExists('posts');
    }
}
