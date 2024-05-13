<?php

namespace App\Models\trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseTypeModel extends Model
{
    use HasFactory;
    protected $table = 'license_type';
    protected $fillable = [
        'license_type'
    ];
}
