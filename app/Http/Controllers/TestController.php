<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Facades\Test;
use App\Facades\Filter;

class TestController extends Controller
{
    public function test()
    {
        Test::test();
    }

    public function database()
    {
        try {
            DB::connection()->getPdo();
            print_r("Connected successfully to: " . DB::connection()->getDatabaseName());
        } catch (\Exception $e) {
            die("Could not connect to the database.  Please check your configuration. Error:" . $e );
        }
    }

    public function filter()
    {
        Filter::test();
    }
}
