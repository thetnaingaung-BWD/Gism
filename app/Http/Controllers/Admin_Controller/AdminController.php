<?php

namespace App\Http\Controllers\Admin_Controller;

use App\Loggable;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    use Loggable;
    public function search(Request $request) {
        $search = $request->input('query', '');
        $role = $request->get('role');
        // $role = $request->query('role');

        // Validate and sanitize inputs
        $role = $role ? ucfirst($role) : null;

        $results = User::where('name', 'LIKE', "%{$search}%")
                        ->orWhere('email', 'LIKE', "%{$search}%")
                        ->get();

        // Return JSON response
        return response()->json($results);
    }
    public function index(Request $request) {


        $role = $request->query('role');

        $query = User::query();

        if ($role) {
            $query->where('role', ucfirst($role));
        }

        // Paginate the filtered (or unfiltered) data
        $adminList = $query->paginate(10);

        return view('Admin-Dashboard.Admin-list', compact('adminList', 'role'));

    }
    public function addMember(){

        return view('Admin-Dashboard.Add-Member');

    }
    public function addMemberProcess(Request $request){
        $this->validateRequest($request);

        $newAdmin = $this -> RequestData($request);

        $adminProfile = $this->uploadImage($request,'image','tmp/admin-profile/');

        $newAdmin['image'] = $adminProfile;

        $newAdmin['password'] = Hash::make($request->password);

        User::create($newAdmin);

        // move from tmp to asset file
        $oldPath ='tmp/admin-profile/'. $newAdmin['image'] ;

        $newPath = 'asset/admin-profile/'.$newAdmin['image'];

        if (Storage::disk('public')->exists($oldPath)) {

            Storage::disk('public')->move($oldPath, $newPath);
        }

        Alert::success('Add New Account', 'Create Account Successfully');

        return back();

    }
    public function adminDetail($id) {
        $adminDetail = User::where('id',$id)->first();

        return view('Admin-Dashboard.edit-admin-list',compact('adminDetail'));
    }
    //
    public function updateAdminInfo(Request $request) {
        $validated = $request->validate([
            'password' => 'confirmed',
        ]);

        $updateAdmin = $this -> RequestData($request);

        if ($request->image != null) {
            $adminProfile = $this->uploadImage($request,'image','tmp/admin-profile/');

            $updateAdmin['image'] = $adminProfile;
        }
        if ($request->password != null) {

            $updateAdmin['password'] = Hash::make($request->password);
        }

        $filteredData = array_filter($updateAdmin, function ($value) {

            return !is_null($value); // Keep only non-null values
        });

        // Delete old image
        if ($request->image != null) {

            // Get old image path from database
            $oldImagePath = User::select('image')->where('id',$request->admin_id)->first();

            if (Storage::disk('public')->exists('asset/admin-profile/'. $oldImagePath->image) != null ) {

                Storage::disk('public')->delete('asset/admin-profile/'. $oldImagePath->image);
            }
        }

        User::where('id',$request->admin_id)->update($filteredData);

        // Move to asset file and delete tmp file
        if ($request->image != null) {

            $oldPath ='tmp/admin-profile/'. $updateAdmin['image'] ;

            $newPath = 'asset/admin-profile/'.$updateAdmin['image'];

            if (Storage::disk('public')->exists($oldPath)) {

                Storage::disk('public')->move($oldPath, $newPath);
            }

            $files = Storage::disk('public')->allFiles('tmp/admin-profile');

            if (!empty($files)) {

                // Delete all files and subdirectories in the 'tmp' directory
                Storage::disk('public')->delete($files);
            }
        }

        Alert::success('Update Information', 'Update Successfully');

        return to_route('Admin_List');

    }
    public function adminDelete($id) {

        User::where('id',$id)->delete();

        Alert::warning('Admin delete', 'Admin Account delete Successfully');

        return back();
    }
    private function RequestData($request){
        return[
            "name" => $request->name,
            "email" => $request->email,
            "phone" => $request->phone,
            "permission" => $request->permission,
            "role" => $request->role,
            "department"=> $request->department,
            "employed_date" => $request->employed,
            "password" => $request->password,
            // 'password_confirmation' => $request->password_confirmation,
        ];
    }
    private function validateRequest($request){
        $rules =[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            "name" => 'required',
            "email" => 'required',
            "phone" => 'required',
            "permission" => 'required',
            "role" => 'required',
            "department" => 'required',
            "employed_date" => 'required',
            'password' => ['required', 'confirmed'],
        ];
        $message=[];
        $validator = $request->validate($rules,$message);

    }
}
