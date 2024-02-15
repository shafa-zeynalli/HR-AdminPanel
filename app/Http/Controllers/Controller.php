<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
//    public function __construct(){
////        $user = User::find(5);
////        $user->assignRole('User');
////        $this->middleware('auth');
//
////        $this->middleware('permission:view users');
////        $this->middleware('permission:view users',['only'=>'create','store']);
//    }

    public function index(){
        $roles=Auth::user()->getRoleNames();
        $name=Auth::user();

//        dd($name);
        return view('admin.main',compact('roles','name'));
    }


}
