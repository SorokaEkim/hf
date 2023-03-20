<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getTeachers() {
        
        // Список ID всех учителей
        $teachersIds = DB::table('admin_role_users')
            ->where('role_id', '=', 2)
            ->get()
            ->pluck('user_id')
            ->toArray();

        $teachers = Admin::whereIn('id', $teachersIds)->get();
 
        foreach ($teachers as $user) {
            echo $user->name;
        }
    }
}
