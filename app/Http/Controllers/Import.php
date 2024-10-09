<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
class Import extends Controller
{
    public static function import(Request $request) {
        if(($open = fopen('C:\Users\Book n Print\Desktop\sampleUser.csv', 'r'))!== false) {
            while(($data = fgetcsv($open, 1000,","))!== false){
                DB::table("user")->insert([
                    "fname" => $data[0],
                    "lname" => $data[1],
                    "age"   => $data[2]
                ]);
                $array[] = $data;
            }
            return[
                "success" => True,
                "message" => "The user import succesfully"
            ];
        }
        else{
            return[
                "success" => false,
                "message" => "File doesnt exist"
            ];
        }
    }
}
 