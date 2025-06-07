<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  public function up()
  {
    Schema::create('comments', function (Blueprint $table) {
      $table->id();
      $table->foreignId('post_id')->constrained()->onDelete('cascade'); // Relación con los posts
      $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relación con los usuarios
      $table->text('content'); // Contenido del comentario
      $table->timestamps(); // Fechas de creación y actualización
    });
  }

  public function down()
  {
    Schema::dropIfExists('comments');
  }
};
