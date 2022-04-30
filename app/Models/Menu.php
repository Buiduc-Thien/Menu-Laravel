<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $fillable = ['text', 'url'];
    public function parentMenu(){
        return $this->hasOne(Menu::class, 'parent_id', 'id');
    }
    public function childrenMenu(){
        return $this->hasMany(Menu::class, 'parent_id', 'id');
    }
}
