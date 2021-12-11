<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Carbon\Carbon;

class DefaultModel extends Model
{
    public function insertData($table_name,$data)    {
        $id=DB::table($table_name)->insertGetId($data);
        return $id;
    }
    public function updateData($table_name,$data,$condition)    {
        // dd($condition);
        $id=DB::table($table_name)
        ->where($condition)
        ->update($data);
        return $id;
    }
}
