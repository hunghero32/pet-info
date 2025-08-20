<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Jenssegers\Agent\Agent;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $sessions = Session::where('user_id', auth()->id())
            ->orderByDesc('last_activity')
            ->get()
            ->map(function ($session) {
                $agent = new Agent();
                $agent->setUserAgent($session->user_agent);
                return [
                    'ip_address'   => $session->ip_address,
                    'browser'      => $agent->browser(),
                    'platform'     => $agent->platform(),
                    'device'       => $agent->device(),
                    'last_active'  => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
                    'current'      => $session->id === session()->getId(),
                ];
            });

        return view('profile.account', [
            'user' => $request->user(),
            'sessions' => $sessions,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')
            ->with('success', 'Thông tin tài khoản đã được cập nhật thành công.');
    }

    public function updatePassword(ProfileUpdateRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $request->user()->update([
            'password' => Hash::make($validated['password'])
        ]);

        return Redirect::route('profile.edit')
            ->with('success', 'Mật khẩu đã được cập nhật thành công.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function recentDevices()
    {
        $sessions = Session::where('user_id', auth()->id())
            ->orderByDesc('last_activity')
            ->get()
            ->map(function ($session) {
                $agent = new Agent();
                $agent->setUserAgent($session->user_agent);
                return [
                    'ip_address'   => $session->ip_address,
                    'browser'      => $agent->browser(),
                    'platform'     => $agent->platform(),
                    'device'       => $agent->device(),
                    'last_active'  => Carbon::createFromTimestamp($session->last_activity)->diffForHumans(),
                    'current'      => $session->id === session()->getId(),
                ];
            });
        return view('profile.devices', compact('sessions'));
    }
}
