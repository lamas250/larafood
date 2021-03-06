<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Profile;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionProfileController extends Controller
{
    protected $profile, $permission;

    public function __construct(Profile $profile, Permission $permission)
    {
        $this->profile = $profile;
        $this->permission = $permission;

        $this->middleware(['can:profiles']);
    }

    public function permissions($idProfile)
    {
        $profile = $this->profile->find($idProfile);

        if(!$profile){
            return redirect()->back();
        }

        $permissions = $profile->permissions()->paginate();

        return view('admin.pages.profiles.permissions.index',compact('profile','permissions'));
    }

    public function profiles($id)
    {
        if (!$permission = $this->permission->find($id)) {
            return redirect()->back();
        }

        $profiles = $permission->profiles()->paginate();

        return view('admin.pages.permissions.profiles.profiles', compact('permission', 'profiles'));
    }

    public function permissionsAvailable(Request $request, $idProfile)
    {
        if (!$profile = $this->profile->find($idProfile)) {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $profile->permissionsAvailable($request->filter);

        return view('admin.pages.profiles.permissions.available', compact('profile', 'permissions', 'filters'));
    }
    
    public function attachPermissionsProfile(Request $request,$idProfile)
    {
        if(!$profile = $this->profile->find($idProfile)){
            return redirect()->back();
        }
        if(!$request->permissions || count($request->permissions) == 0){
            return redirect()->back()->with('error','Precisa escolher permissões.');
        }
        $profile->permissions()->attach($request->permissions);

        return redirect()->route('profiles.permissions',$profile->id);
    }

    public function detach($id,$idPermission)
    {
        $profile = $this->profile->find($id);
        $permission = $this->permission->find($idPermission);

        if(!$profile || !$permission){
            return redirect()->back();
        }

        $profile->permissions()->detach($permission);

        return redirect()->route('profiles.permissions',$profile->id);
    }
}
