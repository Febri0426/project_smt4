<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;              // ✅ TAMBAHKAN INI
use Illuminate\Support\Facades\Auth;      // ✅ TAMBAHKAN INI

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // ✅ UBAH: Redirect ke member-area, bukan home default
    protected $redirectTo = '/member-area';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // ✅ Aktifkan middleware guest untuk halaman login/register
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // 2. Cek apakah input adalah email atau username
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // 3. Siapkan credentials untuk login
        $credentials = [
            $loginType => $request->username,
            'password' => $request->password
        ];

        // 4. Coba lakukan login
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerate session untuk keamanan
            $request->session()->regenerate();
            
            // Redirect ke route 'home' (yang sudah kita arahkan ke /member-area)
            return redirect()->intended(route('home'));
        }

        // 5. Jika gagal, kembali ke login dengan error
        return back()->withErrors([
            'username' => 'Username/Email atau password yang Anda masukkan salah.',
        ])->onlyInput('username');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}