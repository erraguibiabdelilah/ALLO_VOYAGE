<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Admin;


class LoginConttroller extends Controller
{




    public function showLoginForm()
    {
        return view('auth.login'); // Vue partagée pour tous
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // 🔐 D'abord, on vérifie si l'email correspond à un admin
        if (Admin::where('email', $credentials['email'])->exists()) {
            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->intended('/pages/dashboard');
            } else {
                return back()->withErrors(['email' => 'Mot de passe incorrect pour admin']);
            }
        }

        // Sinon, on tente avec le guard user (web)
        if (User::where('email', $credentials['email'])->exists()) {
            //tester si la seion est vide concernat la rcherche
            if (Auth::guard('web')->attempt($credentials)) {
                if (session()->has('rechercheData')) {
                 $dataRecherche = session()->pull('rechercheData');
                    return redirect()->route('findVoyage', $dataRecherche);
                    }
                else
                return redirect()->intended('/user');
            } else {
                return back()->withErrors(['email' => 'Mot de passe incorrect pour utilisateur']);
            }
        }

        // Aucun utilisateur trouvé
        return back()->withErrors(['email' => 'Aucun compte trouvé avec cet email']);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
            return redirect('/');
        }

        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
            return redirect('/');
        }

        return redirect('/');
    }
}


