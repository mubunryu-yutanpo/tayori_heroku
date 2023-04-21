<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Poof;
use App\Pee;
use App\Food;


class MypageController extends Controller
{
    //マイページへ
    public function mypage(){
        //それぞれのDB情報を取得して渡す
        $user = Auth::user();
        $user_id = $user->id;
        if(DB::table('users')->where('id', $user_id)->value('avatar') === null){
            $avatar = '/updates/default.png';
        }else{
            $avatar = DB::table('users')->where('id', $user_id)->value('avatar');
        }

        //まだデータがない場合はnullを入れとく（allで全データを取得して大量のデータがあると動作に影響するらしいので先頭だけ取得）
        $poof = null;
        $pee  = null;
        $food = null;

        if(Poof::where('user_id', $user_id)->latest()->first() !== null){
            $poof = Poof::latest()->first();
        }
        if(Pee::where('user_id', $user_id)->latest()->first() !== null){
            $pee = Pee::latest()->first();
        }
        if(Food::where('user_id', $user_id)->latest()->first() !== null){
            $food = Food::latest()->first();
        }
        return view('mypage/mypage', compact('user','avatar', 'poof', 'pee', 'food') );
    }

    // プロフィール編集画面へ
    public function profEdit($id){
        if(!ctype_digit($id)){
            return redirect('/welcome')->with('flash_message', __('不正な操作が行われました'));
        }

        $user = Auth::user($id);
        return view('mypage/profEdit', compact('user') );
    }

    // プロフィール更新
    public function profUpdate(ValidRequest $request, $id){
        if(!ctype_digit($id)){
            return redirect('/welcome')->with('flash_message', __('不正な操作が行われました'));
        }
       
        if($request->avatar !== null){
            $avatar = $request->file('avatar');
            $filename = $avatar->getClientOriginalName();
            $avatar->move(public_path('updates'), $filename);
        }else{
            $filename = 'default.png';
        }
        
        // 情報を更新
        User::where('id', $id)->update([
            'name'   => $request->name,
            'email'  => $request->email,
            'avatar' => '/updates/'.$filename,
        ]);

        return redirect('/mypage')->with('flash_message', 'プロフィールを変更しました！');
    }

    // ログアウト
    public function logout(){
        Auth::logout();
        return redirect('/')->with('flash_message', 'ログアウトしました');
    }

    // 退会ページへ
    public function withdrow($id){
        $user = Auth::user($id);

        return view('/mypage/withdrow', compact('user'));
    }

    // ユーザー情報削除
    public function deleteUser($id){
        if(!ctype_digit($id)){
            return redirect('/welcome')->with('flash_message', __('不正な操作が行われました'));
        }

        User::where('id', $id)->delete();

        return redirect('/')->with('flash_message', '退会しました。');
    }



}
