<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;

  // protected $table = 'posts';

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  protected function title(): Attribute
  {
    return Attribute::make(
      get: fn($value) => ucfirst($value),
      set: fn($value) => strtolower($value)
    );
  }
}
