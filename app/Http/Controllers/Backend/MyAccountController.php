<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel; // Add this line
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\file;


class MyAccountController extends Controller
{
    public function my_account(Request $request){
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.my_account.update',$data);
    }

    public function edit_update($id ,Request $request){

        $validated = $request->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id,
        ]);
        

        $user = User::find(Auth::user()->id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){

            $user->password = $request->password;
        }
        
    if (!empty($request->file('profile_image'))) {

            if (!empty($user->profile_image) && file_exists('upload/'.$user->profile_image)) {
                unlink('upload/'.$user->profile_image);
            }
        $file = $request->file('profile_image');
        $randomStr = Str::random(30);
        $filename = $randomStr .'.'. $file->getClientOriginalExtension();
        $file->move('upload/',$filename);
        $user->profile_image = $filename;

    }

        $user->save();
    
        // Redirect with success message
        return redirect('admin/my_account')->with('success', 'User update Successfully ');
    }

    public function employee_my_account(Request $request){
        $data['getRecord'] = User::find(Auth::user()->id);
        return view('backend.employee.my_account.update',$data);

    }
    
    public function employee_my_account_update(Request $request)  {
       
        $validated = $request->validate([
            'email' => 'required|unique:users,email,' . Auth::user()->id,
        ]);
        

        $user = User::find(Auth::user()->id);
        
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->password)){

            $user->password = $request->password;
        }
        
    if (!empty($request->file('profile_image'))) {

            if (!empty($user->profile_image) && file_exists('upload/'.$user->profile_image)) {
                unlink('upload/'.$user->profile_image);
            }
        $file = $request->file('profile_image');
        $randomStr = Str::random(30);
        $filename = $randomStr .'.'. $file->getClientOriginalExtension();
        $file->move('upload/',$filename);
        $user->profile_image = $filename;

    }

        $user->save();
    
        // Redirect with success message
        return redirect('employee/my_account')->with('success', 'employee update Successfully ');
        
    }
}

?>