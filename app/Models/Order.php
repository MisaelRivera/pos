<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function clients ()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function users ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cash ()
    {
        return $this->belongsTo(Cash::class, 'cash_id');
    }

    public function rows ()
    {
        return $this->hasMany(OrderRow::class, 'order_id');
    }

}
