<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\facades\DB;
use Response;
class Export extends Controller
{
  public static function export(Request $request){
    $user       =DB::table('user')->get();
    $filename   = "Junrih-masterlist.csv";

    $header = [
        'content-Type' => 'text/csv',
        'content-Disposition' => 'attachment; filename="'.$filename .'"'
    ];
    $handle = fopen('php://output','w');
    fputcsv($handle, ['First Name', 'Last Name', 'Age']);
     foreach($user as $users) {
        fputcsv($handle, [$users->fname, $users->lname, $users->age]);
     }
     fclose($handle);
     return Response('', 200, $header);
  } 
}
