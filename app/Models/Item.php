<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    /**
     * @var array<string>
     */
    protected $fillable = [
        'brand',
        'model',
        'description',
        'category'
    ];

    public function item_instance()
    {
        return $this->hasMany(Item_instance::class);
    }
}