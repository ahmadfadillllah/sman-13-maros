<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Events\ChatEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //

    public function index()
    {
        if (Auth::user()->role == 'siswa') {
            $user = User::leftJoin('siswa', 'users.id', '=', 'siswa.user_id')
            ->leftJoin('walikelas', 'users.id', '=', 'walikelas.user_id')
            ->select('users.id as id','users.username as username', 'users.email as email', 'siswa.nama_siswa as nama_siswa', 'walikelas.nama_wali as nama_wali', 'users.role as role')
            ->where('nama_siswa', '!=', null)
            ->orWhere('nama_wali', '!=', null)
            ->where('users.role', '!=', 'siswa')
            ->where('users.role', 'admin')
            ->get();
            // dd($user);
        }else{
            $user = User::leftJoin('siswa', 'users.id', '=', 'siswa.user_id')
            ->leftJoin('walikelas', 'users.id', '=', 'walikelas.user_id')
            ->select('users.id as id','users.username as username', 'users.email as email', 'siswa.nama_siswa as nama_siswa', 'walikelas.nama_wali as nama_wali')
            ->where('nama_siswa', '!=', null)
            ->orWhere('nama_wali', '!=', null)
            ->where('users.role', '!=', 'wali kelas')
            ->where('users.role', '!=', 'admin')
            ->get();
        }

        return view('chat.index', compact('user'));
    }
    public function room($room) {
        // Get room
        $room = DB::table('chat_rooms')->where('id', $room)->first();

        // Get users
        $users = DB::table('chat_room_users')->where('chat_room_id', $room->id)->get();

        return view('chat.room', compact('room', 'users'));
    }

    public function getChat($room) {
        // Join with user
        $chats = DB::table('chats')
            ->join('users', 'users.id', '=', 'chats.user_id')
            ->where('chat_room_id', $room)
            ->select('chats.*', 'users.username as user_name', 'users.avatar as avatar')
            ->get();

        return response()->json($chats);
    }

    // Send chat
    public function sendChat(Request $request) {
        $chat = DB::table('chats')->insert([
            'chat_room_id' => $request->room,
            'user_id' => auth()->user()->id,
            'message' => $request->message,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Trigger event
        broadcast(new ChatEvent($request->room, $request->message, auth()->user()->id));

        return response()->json($chat);
    }

    public function chat($user) {
        $my_id = auth()->user()->id;
        $target_id = $user;

        $my_room = DB::table('chat_room_users');
        $target_room = clone $my_room;

        // Get my room
        $my_room = $my_room->where('user_id', $my_id)->get()->keyBy('chat_room_id')->toArray();
        // Get target room
        $target_room = $target_room->where('user_id', $target_id)->get()->keyBy('chat_room_id')->toArray();

        // Check room
        $room = array_intersect_key($my_room, $target_room);

        DB::table('chats')
            ->where('user_id', $target_id)
            ->update(['is_read' => true]);

        // If room exists
        if($room) return redirect()->route('chat.room', ['room' => array_keys($room)[0]]);

        // If room doesn't exist
        $uuid = Str::orderedUuid();
        $room = DB::table('chat_rooms')->insert([
            'id' => $uuid,
            'name' => 'generate by system',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Add users to room
        DB::table('chat_room_users')->insert([
            [
                'chat_room_id' => $uuid,
                'user_id' => $my_id,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'chat_room_id' => $uuid,
                'user_id' => $target_id,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);

        return redirect()->route('chat.room', ['room' => $uuid]);
    }
}
