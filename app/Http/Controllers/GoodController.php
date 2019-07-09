<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Good;
use Auth;

class GoodController extends Controller
{
    public function store(Request $request)
    {
        $good = new Good;
        $good->user_id = Auth::id();
        $good->cook_id = $request->cook_id;
        $good->save();
        // return redirect('/cooks');
        return $good;
    }

    public function destroy(Good $good)
    {
        $good->delete();
        // return redirect('/cooks');
        return $good;
    }
}
