<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\unique_code;
use Illuminate\Support\Facades\Validator;

class timeController extends Controller
{
    function getIndex(){
        
        return view('form');
     
        
    }

    function sendUniqueCode(Request $request){

        $valueEntered = $request->number;
        $uniqueCodeArray=[];


        $no_of_rows = $valueEntered;
        $range=range( 1, $no_of_rows );
        $chunksize=1000;
        
        foreach( array_chunk( $range, $chunksize ) as $chunk ){
            $uniqueCodeArray = array();/* array is re-initialised each major iteration */
            foreach( $chunk as $i ){
                $code = substr(bin2hex(random_bytes(7)),7);
                $request = new Request([
                    'unique_code' => $code
                ]);
                $validated =  Validator::make($request->all(), [
                    'unique_code' => 'required|unique:unique_codes|max:7',
                ]);
                if ($validated->fails()) { 
                    $i--;
                } else {
                        $uniqueCodeArray[] = array(
                        'unique_code'=>  $code
                    ); 
                }      
            }
            unique_code::insert( $uniqueCodeArray );
        }
        $message = ['success'=>$valueEntered." unique code are inserted"];

        // for($i=0; $i<$valueEntered; $i++){
        //     $code = ['unique_code'=> substr(bin2hex(random_bytes(7)),7)];
        //     array_push($uniqueCodeArray, $code);
        // }
       
        // $message = \DB::transaction(function () use ($request,$valueEntered, $uniqueCodeArray, &$message) {

        //     try{
        //         unique_code::insert($uniqueCodeArray);
        //         $message = ['success'=>$valueEntered." unique code are inserted"];
        //         return response()->json($message);
          
        //      } catch (\Exception $e) {
              
        //          $errors = $e->getMessage();
        //          $message = ['error'=>$e->getMessage()];
        //          return response()->json($message);
        //       }

             
        // });
        return redirect()->route('getIndex',[$message]);
    }
}
