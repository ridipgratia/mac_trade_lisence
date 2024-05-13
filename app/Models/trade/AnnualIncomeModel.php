<?php

namespace App\Models\trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnnualIncomeModel extends Model
{
    use HasFactory;
    protected $table = 'annual_income';
    protected $fillable = [
        'anual_income'
    ];
}
