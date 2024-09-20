<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterViewAdminController extends Controller
{
    public function index()
    {
        // Dữ liệu bạn muốn truyền
        $user = Auth::user();
        
        // Truyền dữ liệu tới view
        return view('admin.main', compact('user'));
    }
}

?>