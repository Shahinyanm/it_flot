<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;

/**
 * Class LocalizationController
 *
 * @package App\Http\Controllers
 */
class LocalizationController extends Controller
{
    /**
     * @param $locale
     * @return ResponseFactory|Response
     */
    public function setLocale($locale)
    {
        app()->setLocale($locale);
        return response(['status' => 'success'], 200);
    }
}
