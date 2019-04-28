<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\register;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class WechatAdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
}