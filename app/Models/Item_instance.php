<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item_instance extends Model
{
    use HasFactory;

    public function item_id()
    {
        return $this->belongsTo(Item::class);
    }

    /**
     * @var array<string>
     */
    protected $fillable = [
        'damage',
        'notes',
        'status',
    ];
}
