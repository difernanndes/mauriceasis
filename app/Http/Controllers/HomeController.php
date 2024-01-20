<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Warning;

class HomeController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $loggedId = intval(Auth::id());
        $warnings = Warning::orderBy('id', 'desc')->paginate(3);
        $user = User::find($loggedId);

        return view('home', [
            'user' => $user,
            'warnings' => $warnings,
        ]);
    }

}
