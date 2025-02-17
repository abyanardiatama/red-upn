<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchandise extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function merchOrder()
    {
        return $this->hasMany(MerchOrder::class, 'merch_id');
    }
}
