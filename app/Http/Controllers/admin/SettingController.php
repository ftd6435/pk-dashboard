<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    // THE AUTHORIZATION FUNCTIONALITY HAS TO BE ACTIVATED FOR ALL METHODS TO AVOID INTRUDE THROUGH URLs
    // public function __construct()
    // {
    //     $this->authorizeResource(Service::class, 'service');
    // }

    public function index(){
        return view('pages/admin/setting');
    }
}
