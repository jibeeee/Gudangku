<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    public function activity()
    {
        return $this->hasOne(Activity::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
