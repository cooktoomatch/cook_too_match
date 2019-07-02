<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Socialite;
use Illuminate\Support\Facades\Storage;
use Auth;

class SocialController extends Controller {
    public function authLogin() {
        return view('auth/login');
    }

    public function facebookRedirect() {
        return Socialite::driver('facebook')->redirect();
    }

    public function facebookCallback() {
        try {
            $userSocial = Socialite::driver('facebook')->user();
        } catch (Exception $e) {
            return redirect()->route('login')->withErrors('ユーザー情報の取得に失敗しました。');
        }

        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if ($user) {
            if ($user->facebook_id  !== $userSocial->getId()) {
                $user->facebook_id = $userSocial->getId();
                $user->save();
            }
            Auth::login($user);
            return redirect('/home');
        } else {
            $newuser = new User;
            $newuser->name = $userSocial->getName();
            $newuser->email = $userSocial->getEmail();
            $newuser->facebook_id = $userSocial->getId();
            $newuser->password = bcrypt(str_random(20));
            $icon = file_get_contents($userSocial->avatar_original);
            if ($icon !== false) {
                $file_name = $userSocial->id.'_'.uniqid().'.jpg';
                Storage::put('public/user_icon/'.$file_name, $icon);
                $newuser->icon = $file_name;
            }  
            $newuser->save();
            Auth::login($newuser);
            return redirect('/home');
        }
    }
}