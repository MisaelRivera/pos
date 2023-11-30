<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function provider ()
    {
        return $this->belongsTo(Provider::class, 'provider_id');
    }

    public function orderRows ()
    {
        return $this->hasMany(OrderRow::class, 'product_id');
    }

    public function promotions ()
    {
        return $this->hasMany(Promotions::class, 'product_id');
    }

    public function purchaseRows ()
    {
        return $this->hasMany(PurchaseRow::class, 'product_id');
    }
}
