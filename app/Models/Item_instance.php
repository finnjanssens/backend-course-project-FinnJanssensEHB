<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Item;

class Item_instance extends Model
{
    use HasFactory;

    public function item()
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
        'loan_id'
    ];

    public function loan()
    {
        return $this->belongsTo(Loan::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'loans', 'item_instance_id', 'user_id')->withTimestamps();
    }
}
