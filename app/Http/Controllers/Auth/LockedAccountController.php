<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LockedAccountController extends Controller
{
    public function show(Request $request): View
    {
        return view('auth.locked', [
            'reason' => $request->query('reason', 'inactive')
        ]);
    }
}
