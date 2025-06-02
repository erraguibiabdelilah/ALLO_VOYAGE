<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Notification;

class ClientController extends Controller
{


    public function register(Request $request)
    {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'password' => 'required|string|min:6|confirmed',
    ]);


    $user=new User();
    $user->name=$request->name;
    $user->email= $request->email;
    $user->password=$request->password;
    $user->save();


    Auth::login($user);
    return redirect('/user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::where('voyageur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $count = $notifications->where('estLu', false)->count();
        return view('pages.userSearch',compact('notifications', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function profile()
    {
        $user = Auth::user();

        $notifications = Notification::where('voyageur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
        $count = $notifications->where('estLu', false)->count();
        
        return view('client.profile', compact('user', 'notifications', 'count'));
    }

    public function updateProfile(Request $request, $id){
        $user = User::findOrFail($id);
        $user->update($request->all());

        // Redirect to the products index with a success message
        return redirect()->back()->with('success', 'Profil mis à jour avec succès !');
    }

     
}
