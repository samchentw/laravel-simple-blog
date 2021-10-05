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
            $table->string('title')->index();
            $table->mediumText('body');
            $table->string('slug')->nullable();
            $table->integer('view_count')->unsigned()->default(0);
            $table->timestamps();
            
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->on('users');
            $table->foreignId('category_id')->constrained()->onDelete('cascade')->on('categories');
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
