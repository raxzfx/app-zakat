<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'kategori';

    protected $primaryKey = 'id';
    protected $fillable = ['nama_kategori'];
}
