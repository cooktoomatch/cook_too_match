<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::orderBy('created_at', 'asc')->paginate(10);
        return view('users_index', ['users' => $users]);
    }

    public function new()
    {
        // 
    }

    public function create(Request $request)
    {
        // 
    }

    public function show(User $users)
    {
        $cooks = $users->cooks;

        $good_all = 0;
        foreach ($cooks as $cook) {
            $good_all += $cook->good;
        }

        return view('users_show', [
            'user' => $users,
            'cooks' => $users->cooks,
            'good_all' => $good_all,
        ]);
    }

    public function edit(User $users)
    {
        return view('users_edit', ['user' => $users]);
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required | string',
            'email' => 'required | max:255',
            'icon' => 'file | image | mimes:jpeg,png',
            'description' => 'nullable | string',
            'zip' => 'regex:/\w{4,14}/',
            'pref' => 'required',
            'town' => 'required',
            'building' => 'nullable',
        ]);

        if ($validator->fails()) {
            return redirect('/users/edit/' . $request->id)
                ->withInput()
                ->withErrors($validator);
        }

        $prefArray = [
            null, '北海道', '青森県', '岩手県', '宮城県',
            '秋田県', '山形県', '福島県', '茨城県', '栃木県',
            '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
            '新潟県', '富山県', '石川県', '福井県', '山梨県',
            '長野県', '岐阜県', '静岡県', '愛知県', '三重県',
            '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県',
            '和歌山県', '鳥取県', '島根県', '岡山県', '広島県',
            '山口県', '徳島県', '香川県', '愛媛県', '高知県',
            '福岡県', '佐賀県', '長崎県', '熊本県', '大分県',
            '宮崎県', '鹿児島県', '沖縄県'
        ];

        mb_language("Japanese");
        mb_internal_encoding("UTF-8");

        $address = $prefArray[$request->pref] . $request->town . $request->building;
        $myKey = "AIzaSyB_wlIFXfpic4yHk5ycglzt35H1akkc_Uo";

        $eAddress = urlencode($address);
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address=" . $eAddress . "+CA&key=" . $myKey;

        $contents = file_get_contents($url);
        $jsonData = json_decode($contents, true);

        $lat = $jsonData["results"][0]["geometry"]["location"]["lat"];
        $lng = $jsonData["results"][0]["geometry"]["location"]["lng"];

        $users = User::find($request->id);
        $users->name = $request->name;
        $users->email = $request->email;
        if ($request->file('icon')) {
            $filename = $request->file('icon')->store('public/user_icon');
            $users->icon = basename($filename);
        }
        $users->description = $request->description;
        $users->latitude = $lat;
        $users->longitude = $lng;
        $users->zip = $request->zip;
        $users->pref = $request->pref;
        $users->town = $request->town;
        $users->building = $request->building;
        $users->address = $address;
        $users->save();

        return redirect('/users');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect('/users');
    }
}
