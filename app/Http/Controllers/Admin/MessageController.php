<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message; // Assicurati di avere il modello Message
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session; // Per gestire i messaggi di sessione

class MessageController extends Controller
{
    /**
     * Display a listing of the messages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Recupera tutti i messaggi dal database
        $messages = Message::all();
        // Passa i messaggi alla vista
        return view('admin.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        // Marca il messaggio come letto
        if (!$message->is_read) {
            $message->is_read = true;
            $message->save();
        }

        return view('admin.messages.show', compact('message'));
    }

    public function unreadMessagesCount()
    {
        $unreadCount = Auth::user()->messages()->where('is_read', false)->count();
        return response()->json(['unreadCount' => $unreadCount]);
    }


    /**
     * Remove the specified message from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Trova il messaggio specifico
        $message = Message::findOrFail($id);
        // Elimina il messaggio
        $message->delete();

        // Imposta un messaggio di successo nella sessione
        Session::flash('success', 'Messaggio eliminato con successo.');

        // Reindirizza all'indice dei messaggi
        return redirect()->route('admin.messages');
    }
}
