<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sheets;


class gsheet extends Controller
{
    //
    function sheet(){
        $spreadsheet_id = '1wObGSEuXAgrUFth7rImuQ9aLbxYS_dbuR2GVs9ZA-k0';
        $PostSheet = 'プレス・メディアの方はこちら';
        $sheets = Sheets::spreadsheet($spreadsheet_id)
            ->sheet($PostSheet.'!1:1')
            ->get()
            ->toArray();
        $firstRow = $sheets[0];
        $labels = ["お名前","tester"];
        $newRow = array_values (array_unique(array_merge($firstRow,$labels)));

        Sheets::sheet($PostSheet)->range('A1')->update([$newRow]);

        dd($sheets);
        $sheets = Sheets::spreadsheet('1wObGSEuXAgrUFth7rImuQ9aLbxYS_dbuR2GVs9ZA-k0')

            ->sheet('demo2')

            ->get()->toArray();

        dd(Sheets::getService()->spreadsheets->get('1wObGSEuXAgrUFth7rImuQ9aLbxYS_dbuR2GVs9ZA-k0')->sheets[0]->properties->title);
        $sheets = Sheets::spreadsheet('1wObGSEuXAgrUFth7rImuQ9aLbxYS_dbuR2GVs9ZA-k0');
        Sheets::sheet('demo')->append([['name' => 'name12', 'mail' => 'mail1', 'id' => 10]]);
        dd($sheets);
        $sheets = Sheets::spreadsheet('1wObGSEuXAgrUFth7rImuQ9aLbxYS_dbuR2GVs9ZA-k0')

            ->sheet('demo')

            ->get();

        Sheets::sheet('demo')->append([['3', 'name3', 'mail3']]);


    }
}
