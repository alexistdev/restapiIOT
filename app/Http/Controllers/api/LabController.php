<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Dht;
use App\Models\Lab;
use App\Models\Soil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LabController extends Controller
{
    /**
     * Author: Alexsander Hendra Wijaya
     * NPM: 1811010007
     * TEKNIK INFORMATIKA
     * Email: alexistdev@gmail.com
     * web:https://alexistdev.com
     * IBI Darmajaya
     */

    public function get_data_lab (Request $request)
    {
        $lab = Lab::where('user_id',$request->id_user)->get();
        if($lab != null){
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'result' => $lab,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Kosong',
            ], 401);
        }
    }

    public function get_data_sensor(Request  $request)
    {
        $dht = Dht::where('lab_id',$request->id_lab)->first();
        $soil = Soil::where('lab_id',$request->id_lab)->first();
        if($dht != null && $soil != null){
            return response()->json([
                'status' => true,
                'message' => 'Success',
                'suhu_udara' =>$dht->suhu_udara,
                'kelembaban_udara' => $dht->kelembaban_udara,
                'ph_tanah' => $soil->ph_tanah,
                'kelembaban_tanah' => $soil->kelembaban_tanah,
                'pump' => $dht->mode,
                'nozzel' => $dht->status,
                'update' => $dht->updated_at,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data Kosong',
            ], 401);
        }
    }

    public function set_penyiraman(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'id_lab' => 'required|string',
        ]);
        if($validation->fails()){
            return response()->json(array(
                'status' => false,
                'message' => 'Data, tidak lengkap',
            ),404);
        } else {
            $dht = Dht::where('lab_id',$request->id_lab)->first();
            if($dht != null){
                if($dht->mode != 1){
                    Dht::where('lab_id',$request->id_lab)->update([
                        'mode' => 1,
                    ]);
                    return response()->json([
                        'status' => true,
                        'message' => 'Penyiraman aktif',
                        'pump' => 1,
                    ], 200);
                } else {
                    Dht::where('lab_id',$request->id_lab)->update([
                        'mode' => 0,
                    ]);
                    return response()->json([
                        'status' => true,
                        'message' => 'Penyiraman Mati',
                        'pump' => 0,
                    ], 200);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Data Kosong',
                    'pump' => 0,
                ], 401);
            }
        }
    }

    public function set_pemupukan(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'id_lab' => 'required|string',
            'nozzel' => 'required|string',
        ]);
        if($validation->fails()){
            return response()->json(array(
                'status' => false,
                'message' => 'Data, tidak lengkap',
            ),404);
        } else {
            $dht = Dht::where('lab_id',$request->id_lab)->first();
            if($dht != null){
                Dht::where('lab_id',$request->id_lab)->update([
                    'status' => $request->nozzel,
                ]);
                if($request->nozzel == '1'){
                    return response()->json([
                        'status' => true,
                        'message' => 'Pemupukan aktif',
                        'nozzel' => 1,
                    ], 200);
                } else {
                    return response()->json([
                        'status' => true,
                        'message' => 'Pemupukan dimatikan',
                        'nozzel' => 0,
                    ], 200);
                }
            }else{
                return response()->json([
                    'status' => false,
                    'message' => 'Data Kosong',
                ], 401);
            }
        }
    }
}
