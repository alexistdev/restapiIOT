<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dht;
use App\Models\Lab;
use App\Models\Labdata;
use App\Models\Soil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SensorController extends Controller
{

    /**
     * Author: Alexsander Hendra Wijaya
     * NPM: 1811010007
     * TEKNIK INFORMATIKA
     * Email: alexistdev@gmail.com
     * web:https://alexistdev.com
     * IBI Darmajaya
     */

    public function sensor(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'tipe' => 'required|string',
            'token' => 'required|string',
            'var1' => 'required|string',
            'var2' => 'required|string',
        ]);
        if($validation->fails()){
            return response()->json(array(
                'status' => false,
                'message' => 'Data, tidak lengkap',
            ),404);
        } else {
            if($request->tipe == 'soil'){
                $soil = Soil::where('token',$request['token'])->update([
                    'ph_tanah' => $request->var1,
                    'kelembaban_tanah' => $request->var2,
                ]);
                if($soil){
                    $data = Soil::where('token',$request->token)->first();
                    return response()->json(array(
                        'status' => true,
                        'message' => 'Data sensor berhasil diperbaharui',
                        'nozzel' => $data->mode,
                        'pump' => $data->status,
                    ),200);
                } else {
                    return response()->json(array(
                        'status' => false,
                        'message' => 'Gagal, data tidak ditemukan!',
                    ),404);
                }
            } else {
                $dht = Dht::where('token',$request['token'])->update([
                    'suhu_udara' => $request->var1,
                    'kelembaban_udara' => $request->var2,
                ]);
                if($dht){
                    $data = Dht::where('token',$request->token)->first();
                    return response()->json(array(
                        'status' => true,
                        'message' => 'Data sensor berhasil diperbaharui',
                        'nozzel' => $data->mode,
                        'pump' => $data->status,
                    ),200);
                } else {
                    return response()->json(array(
                        'status' => false,
                        'message' => 'Gagal, data tidak ditemukan!',
                    ),404);
                }
            }
        }
    }


}
