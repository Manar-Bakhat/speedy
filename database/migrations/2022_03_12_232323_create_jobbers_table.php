<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobbers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->constrained()->onDelete('cascade');
            $table->unsignedInteger('jobber_category_id');
            $table->string('photo');
            $table->integer('age');
            $table->string('phone');
            $table->string('title', 50);
            $table->text('description');
            $table->string('facebook');
            $table->string('cover_img');
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
        Schema::dropIfExists('jobbers');
    }
}
