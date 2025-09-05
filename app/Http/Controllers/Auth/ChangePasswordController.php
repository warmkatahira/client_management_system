<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// その他
use Illuminate\Support\Facades\Hash;
// リクエスト
use App\Http\Requests\Auth\UserPasswordChangeRequest;

class ChangePasswordController extends Controller
{
    public function showChangeForm()
    {
        return view('auth.passwords.change');
    }

    public function update(UserPasswordChangeRequest $request)
    {
        // パスワードを変更して、フラグを0に変更
        $user = $request->user();
        $user->password = Hash::make($request->password);
        $user->must_change_password = 0;
        $user->save();
        return redirect()->route('dashboard.index')->with('status', 'パスワードを変更しました。');
    }
}
