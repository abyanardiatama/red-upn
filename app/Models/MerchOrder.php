<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Merchandise;

class MerchOrder extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function merchandise()
    {
        return $this->belongsTo(Merchandise::class, 'merch_id');
    }
}
