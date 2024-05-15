<?php

namespace App\Models\trade;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradeLicenseDetailsModel extends Model
{
    use HasFactory;
    protected $table = 'trade_license_details';
    protected $fillable = [
        'trade_name',
        'present_address',
        'permanent_address',
        'phone_number',
        'constituency_id',
        'block_id',
        'panchayat_id',
        'license_type',
        'nature_of_trade',
        'annual_income',
        'aadhaar_no',
        'pan_no',
        'identity_proof',
        'address_proof',
    ];
}
