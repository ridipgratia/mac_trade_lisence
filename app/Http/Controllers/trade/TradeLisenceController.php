<?php

namespace App\Http\Controllers\trade;

use App\Http\Controllers\Controller;
use App\Models\trade\AnnualIncomeModel;
use App\Models\trade\LicenseTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TradeLisenceController extends Controller
{
    // -------------------- trade lisence index page -------------------
    public function index(Request $request)
    {
        return view('trade.trade_lisence');
    }
    // ---------------------  add trade lisence index page ------------------------
    public function addTrade(Request $request)
    {
        $license_types = LicenseTypeModel::all();
        $annual_incomes = AnnualIncomeModel::all();
        return view('trade.add_trade_lisence', [
            'license_type' => $license_types,
            'annual_income' => $annual_incomes
        ]);
    }
    // ------------------- add trade license post --------------------
    public function addTradePost(Request $request)
    {
        if ($request->ajax()) {
            $res_data = [
                'status' => 400,
                'message' => [],
                'error_step' => -1
            ];
            $error_message = [
                'required' => ':attribute is required field !',
                'integer' => ':attribute is integer only value',
                'regex' => 'Enter a valid :attribute',
                'max' => 'file size only 3 megabytes',
                'mimes' => ':attribute is only  .pdf type'
            ];
            $validation = Validator::make(
                $request->all(),
                [
                    'trade_name' => 'required',
                    'trade_owner_present_address' => 'required',
                    'trade_owner_permanent_address' => 'required',
                    'constituency_name' => 'required|integer',
                    'block_name' => 'required|integer',
                    'panchayat_name' => 'required|integer',
                    'license_type' => 'required|integer',
                    'nature_of_trade' => 'required',
                    'anual_income' => 'required|integer',
                    'mobile_number' => 'required|regex:/^\d{10}$/',
                    'aadhaar_no' => 'required',
                    'pan_no' => 'required',
                    'identity_proof' => 'required|max:3000|mimes:pdf',
                    'address_proof' => 'required|max:3000|mimes:pdf'
                ],
                $error_message
            );
            if ($validation->fails()) {
                $res_data['message'] = $validation->errors()->all();
                $res_data['error_step'] = 1;
            } else {
                $res_data['message'] = "Ok";
            }
            return response()->json([
                'res_data' => $res_data
            ]);
        }
    }

    // ----------------------- tempory method ----------------
    public function tempFile(Request $request)
    {
        return view('temp_file_upload');
    }
    public function fileUploadPost(Request $request)
    {
        $error_message = [
            'required' => ':attribute is required field !',
            'max' => 'file size only 3 megabytes',
            'mimes' => ':attribute is only  .pdf type'
        ];
        $validation = Validator::make(
            $request->all(),
            [
                'file' => 'required|max:3000|mimes:pdf',
            ],
            $error_message
        );
        return response()->json([
            'message' => 'Ok'
        ]);
    }
}
