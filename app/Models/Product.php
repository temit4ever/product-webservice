<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    protected $dateFormat = 'd/m/Y H:i:s'; // Change the date format before been saved in the database

    public function users() {
        return $this->belongsToMany(User::class);
    }
}
