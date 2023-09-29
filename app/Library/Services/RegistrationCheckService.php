<?php 
namespace App\Library\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class RegistrationCheckService
{
    /**
     * User details for edit
     */
    public function editUser($id)
    {
        $user = User::find($id);
        if($user !== NULL){
            return $user;
        }
    }
    /**
     * User edit details
     */
    public function editForm($request, $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
        ]);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
    
        $user->assignRole($request->input('roles'));
        return $user;
    }
    /**
     * User creation details
     */
    public function createForm($request)
    {
        $request['password'] = Hash::make($request['password']);
        $user = User::create($request->all());
        $user->assignRole($request->input('roles'));
        return $user;
    }
    /**
     * User list
     */
    public function list($id)
    {
        $user = User::find($id);
        if($user !== NULL)
        {
            return $user;
        }
    }
    /**
     * Remove User from database
     */
    public function remove($id)
    {
        $user = User::destroy($id);
        return $user;
    }
    /**
     * User dashboard after login
     */
    public function dashboard()
    {
        if (Auth::check()){
            $user = Auth::user();
            return $user;
        }
    }
}