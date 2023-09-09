<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Check Login Function
    public function checklogin(Request $request): RedirectResponse
    {

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $userRoleName = Auth::user()->roles->name;

            if ($userRoleName == 'Admin') {

                return redirect()->intended('dashboard');
            }

            if ($userRoleName == 'Client') {

                return redirect()->intended('home');
            }
        }

        return back()->with('error', 'Login failed. Please check your credentials!');
    }

    // Logout Function
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    // Register User Function
    public function register(Request $request)
    {
        try {
            // role_id = 2 is Client
            $request['role_id'] = 2;
            $checkUser = $request->validate([
                'name' => ['required'],
                'email' => ['required', 'unique:users,email,'],
                'password' => ['required', 'min:8'],
                'role_id' => ['required']
            ]);
            User::factory()->create($checkUser);
            return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat melakukan registrasi. Silakan coba lagi nanti.');
        }
    }
}
