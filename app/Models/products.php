<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $primaryKey = 'product_id';


    protected $fillable = [
        'name',
        'part_id',
        'brand_id',
    ];


    public function product(){
        return $this->hasMany(Products::class, 'part_id', 'product_id');
    }
    //return $this->hasMany(Task::class, 'task_range_id', 'task_range_id');   }

    public function winnings(){
        return $this->hasMany(winnings::class, 'product_id', 'product_id');
    }
}
