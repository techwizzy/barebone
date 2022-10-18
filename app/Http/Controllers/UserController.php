<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Mail\Subscribe;
use App\Models\UserSetting;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
     // public $user;
     public function __construct()
     {
        // $this->authorizeResource(User::class, 'user');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$this->authorize('viewAny', User::class);
        return view('auth.users.index');

    }

    /* Fetch Users  */
    public function getUsers(Request $request)
    {
       if ($request->ajax()) {
            $users = User::with('roles')->get();
           // dd($users);
            return DataTables::of($users)
                   ->addIndexColumn()
                   ->addColumn('role', function (User $user) {
                    $roles = '';
                    foreach($user->getRoleNames() as $role){
                    if($role == 'administrator'){
                    $roles.='<label class="badge badge-info" style="margin-right:4px">';
                    }else if($role == 'user'){
                        $roles.='<label class="badge badge-teal" style="margin-right:4px">';
                    }else{
                        $roles.='<label class="badge badge-dark" style="margin-right:4px">';
                    }
                    $roles.= ' '.$role.'';
                    $roles.='</label>';
                    }
                    return $roles;
                })
                ->editColumn('created_at', function (User $user) {
                    return $user->updated_at->format('d/m/Y');
                })

                ->addColumn('action', function(User $user){
                    $actionBtn = '
                    <div class="row text-center">
                    <div class="col-md-2">
                    <a href="'.route('access.users.edit',$user->id).'"data-toggle="tooltip" data-placement="bottom" title="View User Profile">
                    <i class=" mdi mdi-pencil-circle-outline text-secondary" style="font-size: 24px">
                    </i></a>
                    </div>
                    <div class="col-md-2">
                        <a onclick="deactivate_user(this)" data-id="'.$user->id.'" id="user_delete"
                        class="pt-0 btn btn-xs btn-default-outline btn-flat"  ><i class="mdi mdi mdi-delete-circle-outline text-secondary" style="font-size: 24px">
                        </i></a>

                    </div>
                </div>
                 ';
                    return $actionBtn;
                })
                ->rawColumns(['action','role'])

                ->make(true);
       }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $roles = Role::all()->pluck('name');
       return view('auth.users.create', [
        'roles'=> $roles
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

     //   dd($request->all());

        $input = $request->all();

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        if($request->input('sendMail')=='on'){

            event(new Registered($user));
            $email = $request->input('email');
            Mail::to($email)->send(new Subscribe($email));


        }
        return redirect()->route('access.users.index')->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //$user->roles->pluck('id','name');

        $userRoles = $user->getRoleNames();
        $roles = Role::all()->pluck('name');
       // dd($userRoles);
        return view(
            'auth.users.edit',
            ['roles' => $roles,
             'user' => $user,
             'userRoles' => $userRoles
             ]
        );
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function profile($id)
    {
        $user = User::find($id);

        $userRoles = $user->getRoleNames();
        $roles = Role::all()->pluck('name');
        $settings = [];
        $userCollection = UserSetting::where('client_id', $id)->first();
        if($userCollection){
           $settings = $userCollection->toArray();
        }

        if(!empty($settings)){
            $settings = UserSetting::where('client_id', $id)->first()->toArray();

        }else{
            $settings = [];
        }
        return view(
            'auth.profile.index',
            ['roles' => $roles,
             'user' => $user,
             'userRoles' => $userRoles,
             'settings' => $settings
             ]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {

        $inputData = $request->all();
        //dd($inputData);
        //check if password is set
        if (!empty($inputData['password'])) {
            $inputData['password'] = Hash ::make($inputData['password']);
        }else {

            $inputData = Arr::except($inputData, array('password'));
        }


        $user->update($inputData);

         DB::table('model_has_roles')->where('model_id',$user->id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect('access/users')->with('success', 'User Profile updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function deleteUser(Request $request)
    {
        // dd($request->input('id'));
     $user = $request->input('id');
       if(User::where('id', $user)->delete()){
        return response()->json(
            [
                'success' => true,
                'message' => 'User Deleted'
            ]
        );
       }
    }
}
