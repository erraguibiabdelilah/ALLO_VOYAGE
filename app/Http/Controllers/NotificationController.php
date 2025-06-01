<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    /**
     * Créer une nouvelle notification
     */
    public function create(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:500',
            'content' => 'required|string|max:500',
            'voyageur_id' => 'nullable|exists:users,id',
        ]);

        Notification::create([
            'titre' => $request->titre,
            'content' => $request->content,
            'voyageur_id' => $request->voyageur_id,
            'estLu' => false
        ]);

        return redirect()->back()->with('success', 'Notification créée avec succès');
    }

    /**
     * Afficher le dashboard utilisateur avec ses notifications
     */
    public function findByUser()
    {
        $notifications = Notification::where('voyageur_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        $unreadCount = $notifications->where('estLu', false)->count();

        return view('layout.user', compact('notifications', 'unreadCount'));
    }

    /**
     * Supprimer une notification
     */
    public function destroy($id)
    {
        $notification = Notification::find($id);

        if ($notification && $notification->voyageur_id == Auth::id()) {
            $notification->delete();
            return redirect()->back()->with('success', 'Notification supprimée');
        }

        return redirect()->back()->with('error', 'Notification non trouvée');
    }
}
