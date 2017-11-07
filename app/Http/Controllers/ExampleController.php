<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;

class ExampleController extends Controller
{
    public function test()
    {
        $params = $this->request->isJson();
        mydump($params);
    }
    //
}
