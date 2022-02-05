<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Artisan;

class CoreController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        Artisan::call('cache:clear');
        $check = \Illuminate\Support\Facades\DB::connection()->getDatabaseName();
        if ($check) {
            return redirect('/');
        } else {
            return view('core::connection');
        }

    }

}
