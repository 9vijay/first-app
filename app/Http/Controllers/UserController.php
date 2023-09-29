<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Auth;
use App\Library\Services\RegistrationCheckService;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct(private RegistrationCheckService $registrationCheckService)
    {
        $this->registrationCheckService = $registrationCheckService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::check()){
            $users = User::orderBy('created_at', 'DESC')->paginate(5);
            return view('user.index', compact('users'));
        }
        toastr()->error("You are not authorised, login first");
        return redirect('login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = $this->registrationCheckService->createForm($request);
        if($user !== NULL)
        {
            toastr()->info("New User Created successful");
            return redirect('user');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check())
        {
            $user = User::find($id);
            if($user !== NULL)
            {
                $user = $this->registrationCheckService->list($id);
                return view('user.show', compact('user'));
            }else
            {
                toastr()->error("Requested user not exist");
                return redirect('user');
            }
        }else{
            toastr()->error("You are not authorised, login first");
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::check()){
            $user = $this->registrationCheckService->editUser($id);    
        }else{
            toastr()->error("You are not authorised, login first");
            return redirect('login');
        }
        if($user !== NULL)
        {
            $roles = Role::pluck('name','name')->all();
            $userRole = $user->roles->pluck('name','name')->all();
            return view('user.edit', compact('user','roles','userRole'));
        }else
        {
            toastr()->error("User not found ! ");
            return redirect('user');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $updateValues = $this->registrationCheckService->editForm($request, $id);
        if($updateValues !== NULL)
        {
            toastr()->info("User Updated successfully");
            return redirect('user');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if($user !== NULL)
        {
            $user = $this->registrationCheckService->remove($id);
            if($user !== NULL)
            {
                toastr()->info("User Deleted successful ");
                return redirect('user');
            }
        }else
        {
            toastr()->error("User not exist for deletion");
            return redirect('user');
        }
    }
    /**
     * Profile page after successfully login.
     */
    public function profile()
    {
        $user = $this->registrationCheckService->dashboard();
        if($user !== NULL)
        {
            return view('profile.profile');
        }else
        {
            toastr()->error('You are not allowed to access!');
            return redirect('login');
        }
    }
}