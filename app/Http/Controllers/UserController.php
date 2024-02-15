<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct(){
//        $user = User::find(2);
//        $user->assignRole('HR');
        $this->middleware('auth');
        $this->middleware('permission:view users',['only'=>'index','getIndex','create','store','edit','update','destroy']);
        $this->middleware('permission:deleted users',['only'=>'showDeletedUsers','getShowDeletedUsers','restore']);
    }
    public function index()
    {
//        $userRole = Role::where('name', 'User')->first();
//        $usersWithUserRole = $userRole->users;
//        $users = User::query();
//
//        dd($users);
//        $permission = Permission::create(['name' => 'view profile']);
        return view('admin.pages.user.index');
    }

    public function getIndex()
    {
        $users = User::query();
//        $userRole = Role::where('name', 'User')->first();
//        $users->whereHas('roles', function ($query) use ($userRole) {
//            $query->where('role_id', $userRole->id);
//        });

        if (\request()->ajax()) {
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = "<a href='".route('users.edit',['user'=>$row->id])."' class='edit btn btn-success btn-sm'>Edit</a>
                                  <form action='".route('users.destroy', ['user' => $row->id]) ." ' method='POST'
                          class='d-inline'>".
                        csrf_field().
                        method_field('DELETE').
                        "<button type='submit' class='btn btn-danger' onclick='return confirm('Are you sure?')'>Delete
                        </button>
                    </form>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.user.index');
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }

    public function store(Request $request)
    {
        $validationRules = [
            "first_name" => 'required',
            "last_name" => 'required',
            "email" => 'required|email',
            "password" => 'required',
            "position" => 'required',
            "address" => 'required',
        ];

        $request->validate($validationRules);

        $user = new User();
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->address = $request->input('address');
        $user->position = $request->input('position');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->visible_password = $request->input('password');
        $user->save();
        $user->assignRole('User');
        return redirect()->route('users.index')->with('success', 'User Item created successfully');
    }

    public function edit(User $user)
    {
//        $users = User::get();
        return view('admin.pages.user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $validationRules = [
            "first_name" => 'required',
            "last_name" => 'required',
            "email" => 'required|email',
            "password" => 'required',
            "position" => 'required',
            "address" => 'required',
        ];

        $request->validate($validationRules);
        $user = User::findOrFail($request->input('user_id'));

        $user->update([
            "first_name" => $request->input('first_name'),
            "last_name" => $request->input('last_name'),
            "email" => $request->input('email'),
            "password" => $request->input('password'),
            "position" => $request->input('position'),
            "address" => $request->input('address'),
            "visible_password" => $request->input('password')
        ]);
        return redirect()->route('users.index')->with('success', 'User item updated successfully');

    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->back()->with('success', 'User item deleted successfully');
    }


    public function showDeletedUsers()
    {
        return view('admin.pages.user.deleteduser');
    }

    public function getShowDeletedUsers()
    {
        $deletedUsers = User::onlyTrashed()->get();
        if (\request()->ajax()) {

            return DataTables::of($deletedUsers)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $actionBtn = "<a href='".route('users.restore',['user'=>$row->id])."' class='edit btn btn-success btn-sm'>Restore</a>";
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.pages.user.index');
    }

    public function restore($id)
    {
        $user = User::withTrashed()->find($id);
        $user->restore();
        return view('admin.pages.user.index');
    }

}
