<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Class SinglePageController
 *
 * @package App\Http\Controllers
 */
class SinglePageController extends Controller
{
    /**
     * return app.blade.php
     *
     * @return Factory|View
     */
    public function index() {
        return view('app');
    }
}
