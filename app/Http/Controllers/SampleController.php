<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SampleController extends Controller
{
    public function index(Request $request)
    {
        $sampleValue = "sample テキストです。";

        // 参照
        $records = DB::connection('mysql')->select("select * from users");
        $name = $records[0]->ID; // dd の処理を削除するため、$name 変数に代入する内容へ変更

        // 追加
        // $insertResult = DB::connection("mysql")->insert("insert into users (ID,email,name,password) values (null,'メロン','辻','ma-rimo')");
        // dd($insertResult);

        // 削除
        $deleteResult = DB::connection("mysql")->delete("delete from users where name = '辻'");
        dd($deleteResult);

        return view("sumple/index", ["sampleValue" => $sampleValue]);
    }
}