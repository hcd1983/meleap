<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sheets;


class gsheet extends Controller
{
    //
    function sheet(){
        $sheets = Sheets::spreadsheet('1wObGSEuXAgrUFth7rImuQ9aLbxYS_dbuR2GVs9ZA-k0')

            ->sheet('demo')

            ->get();

        dd($sheets);
    }
}
