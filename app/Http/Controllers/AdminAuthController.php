<?php
// app/Http/Controllers/AdminAuthController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    // Admin Registration

    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function showLoginForm(){
        return view('admin.login');
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
        ]);

        
        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('admin')->login($admin);

        return redirect()->route('admin.dashboard');
    }

    // Admin Login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login.form');
    }

    public function dashboard(){
        return view('admin.dashboard.index');
    }


    public function moderator(){
        $moderators = User::where('role','moderator')->get();
        
        return view('admin.moderators.index',compact('moderators'));
    }


    public function addModerator(Request $request){

        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'file' => 'nullable|file|mimes:jpg,png,jpeg|max:2048',
        ]);

            $user = new User();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->password = decrypt($request->password);

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('admin-assets/moderator', $filename, 'public');
                $user->image = $path;
        }

        $user->save();

        if ($user) {
            return redirect()->back()->with('success', 'Moderator added successfully');
        } else {
            return redirect()->back()->with('error', 'Moderator not added');
        }
    }



    public function updateModerator(){

        $moderator = User::find($request->id);

    
        return redirect()->back()->with('success', 'Moderator updated successfully.');
    
    }

}
