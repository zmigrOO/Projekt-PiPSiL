<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'condition',
        'price',
        'description',
        'phone_number',
        'city',
    ];
    public $timestamps = false;
}
