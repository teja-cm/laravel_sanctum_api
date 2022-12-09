<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task_Store_Status extends Model
{
    use HasFactory;
    protected $fillable = ['user_id',
                            'stores',
                            'maps',
                            'products',
                            'payments',

                             ];
}
