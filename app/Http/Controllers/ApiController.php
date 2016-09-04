<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 28.08.16
 * Time: 19:48
 */

namespace App\Http\Controllers;

class  ApiController extends Controller {

    public function index()
    {
        return view('welcome');
    }
}