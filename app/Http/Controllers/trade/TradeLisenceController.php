<?php

namespace App\Http\Controllers\trade;

use App\Http\Controllers\Controller;
use App\Models\trade\AnnualIncomeModel;
use App\Models\trade\LicenseTypeModel;
use App\Models\trade\TradeLicenseDetailsModel;
use App\Mymodules\MyModules;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
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
                    'mobile_number' => 'required|integer|regex:/^\d{10}$/',
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
                $check_verified_number = MyModules::checkVerifyNumberExists($request->mobile_number);
                if ($check_verified_number !== false) {
                    if ($check_verified_number == 1) {
                        DB::beginTransaction();
                        try {
                            $save_data = TradeLicenseDetailsModel::create([
                                'trade_name' => $request->trade_name,
                                'present_address' => $request->trade_owner_present_address,
                                'permanent_address' => $request->trade_owner_permanent_address,
                                'constituency_id' => $request->constituency_name,
                                'block_id' => $request->block_name,
                                'panchayat_id' => $request->panchayat_name,
                                'license_type' => $request->license_type,
                                'nature_of_trade' => $request->nature_of_trade,
                                'annual_income' => $request->anual_income,
                                'phone_number' => $request->mobile_number,
                                'aadhaar_no' => $request->aadhaar_no,
                                'pan_no' => $request->pan_no,
                                'identity_proof' => "no file",
                                'address_proof' => "no file"
                            ]);
                            $storage_location = $save_data->id . '/new_trade';
                            $files_url = MyModules::storeFiles(
                                [
                                    'identity_proof' => $request->file('identity_proof'),
                                    'address_proof' => $request->file('address_proof')
                                ],
                                $storage_location
                            );
                            DB::table('trade_license_details')
                                ->where('id', $save_data->id)
                                ->update([
                                    'identity_proof' => $files_url['identity_proof'],
                                    'address_proof' => $files_url['address_proof']
                                ]);
                            DB::commit();
                            $res_data['status'] = 200;
                            $res_data['message'] = "Trade details successfully added!";
                        } catch (Exception $err) {
                            DB::rollBack();
                            if (isset($save_data->id)) {
                                MyModules::deleteFolder($save_data->id . '/new_trade');
                            }
                            $res_data['error_step'] = 2;
                            $res_data['message'] = "Server error please try later !";
                        }
                    } else {
                        $res_data['error_step'] = 2;
                        $res_data['message'] = "Please veryfied your mobile number !";
                    }
                } else {
                    $res_data['error_step'] = 2;
                    $res_data['message'] = "Server error please try later !";
                }
            }
            return response()->json([
                'res_data' => $res_data
            ]);
        }
    }
    // ------------------- Verify Phone Number ---------------------
    public function verifyPhoneNumber(Request $request)
    {
        if ($request->ajax()) {
            $res_data = [
                'status' => 400,
                'message' => ''
            ];
            $error_message = [
                'required' => ':attribute is required field !',
                'integer' => ':attribute is integer only value',
                'regex' => 'Enter a valid :attribute',
            ];
            $validation = Validator::make(
                $request->all(),
                [
                    'phone_number' => 'required|integer|regex:/^\d{10}$/'
                ],
                $error_message
            );
            if ($validation->fails()) {
                $res_data['message'] = $validation->errors()->all();
            } else {
                $check_verify_number = MyModules::checkVerifyNumberExists($request->phone_number);
                if ($check_verify_number !== false) {
                    if ($check_verify_number == 0) {
                        $verify_code = rand(1000, 9999);
                        Session::put('phone_verify_code', $verify_code);
                        Session::put('verify_phone_number', $request->phone_number);
                        $res_data['message'] = "Please check your phone for otp";
                        $res_data['status'] = 200;
                    } else {
                        $res_data['message'] = "Phone number already veryfied !";
                    }
                } else {
                    $res_data['message'] = "Server error please try later !";
                }
            }
            return response()->json(['res_data' => $res_data]);
        }
    }
    // ---------------------- verifyed phone number -------------------------
    public function verifyedPhoneNumber(Request $request)
    {
        if ($request->ajax()) {
            $res_data = [
                'message' => '',
                'status' => 400,
                'error_step' => -1,
                'otp' => ''
            ];
            $error_message = [
                'required' => ':attribute is required field !',
                'integer' => ':attribute is integer only value',
                'regex' => 'Enter a valid :attribute',
            ];
            $validation = Validator::make(
                $request->all(),
                [
                    'mobile_number' => 'required|integer|regex:/^\d{10}$/',
                    'verify_code' => 'required|integer'
                ],
                $error_message
            );
            $res_data['otp'] = Session::get('phone_verify_code');
            if ($validation->fails()) {
                $res_data['message'] = $validation->errors()->all();
                $res_data['error_step'] = 1;
            } else {
                $session_phone = Session::get('verify_phone_number');
                $session_code = Session::get('phone_verify_code');
                if ($request->mobile_number == $session_phone) {
                    if ($request->verify_code == $session_code) {
                        $check_verify_number = MyModules::checkVerifyNumberExists($session_phone);
                        if ($check_verify_number !== false) {
                            if ($check_verify_number == 0) {
                                try {
                                    DB::table('verified_mobile')
                                        ->insert([
                                            'phone_number' => $session_phone
                                        ]);
                                    Session::forget('verify_phone_number');
                                    Session::forget('phone_verify_code');
                                    $res_data['message'] = "Verifycation is completed !";
                                    $res_data['status'] = 200;
                                } catch (Exception $err) {
                                    $res_data['message'] = $err;
                                }
                            } else {
                                $res_data['message'] = "Mobile number is already exists !";
                            }
                        } else {
                            $res_data['message'] = "Server error please try later";
                        }
                    } else {
                        $res_data['message'] = "Verify code is not currect !";
                    }
                } else {
                    $res_data['message'] = "Your mobile number is not valid !";
                }
                $res_data['error_step'] = 2;
            }
            return response()->json(['res_data' => $res_data]);
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
