<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    private function isMainAdmin()
{
     return Auth::guard('admin')->check() && Auth::guard('admin')->user()->email === 'admin@admin.com';
}
   public function index()
{
    if (!$this->isMainAdmin()) {
        abort(403, 'Accès non autorisé');
    }

    $admins = Admin::all();
    return view('admins.index', compact('admins'));
}

  public function store(Request $request)
    {
        if (!$this->isMainAdmin()) {
        abort(403, 'Accès non autorisé');
    }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed', // confirmation du mdp
        ]);

        Admin::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('admins.index')->with('success', 'Admin créé avec succès');
    }

    // Méthode pour modifier un admin existant
    public function update(Request $request, $id)
    {   
         if (!$this->isMainAdmin()) {
        abort(403, 'Accès non autorisé');
    }
        $admin = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|email|unique:users,email,{$id}",
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $admin->name = $validated['name'];
        $admin->email = $validated['email'];

        if (!empty($validated['password'])) {
            // Si un nouveau mot de passe est fourni, on le hash et on l'enregistre
            $admin->password = Hash::make($validated['password']);
        }
        // Sinon on garde l'ancien mot de passe

        $admin->save();

        return redirect()->route('admin.index')->with('success', 'Admin modifié avec succès');
    }
    public function destroy($id)
{
    if (!$this->isMainAdmin()) {
        abort(403, 'Accès non autorisé');
    }

    $admin = Admin::findOrFail($id);

    // Empêcher la suppression de l'admin principal
    if ($admin->email === 'admin@admin.com') {
        return redirect()->route('admins.index')->with('error', 'Impossible de supprimer l’administrateur principal.');
    }

    $admin->delete();

    return redirect()->route('admins.index')->with('success', 'Admin supprimé avec succès');
}

}