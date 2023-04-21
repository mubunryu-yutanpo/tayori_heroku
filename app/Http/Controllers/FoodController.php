<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Food;


class FoodController extends Controller
{
    // 日記一覧へ
    public function index(Request $request, $id)
    {
        $user = Auth::user();
        $query = Food::where('user_id', $id);
    
        $sort = $request->query('sort');
        if ($sort === 'asc') {
            $query->orderBy('date', 'asc');
        } else if ($sort === 'desc') {
            $query->orderBy('date', 'desc');
        }
    
        $foods = $query->paginate(7);
    
        return view('/mypage/indexFood', compact('user', 'foods'));
    }

    // 日記作成ページへ
    public function new(){
        return view('/mypage/newFood');
    }

    // 日記作成
    public function create(ValidRequest $request){
        $food = new Food;
        $user_id = Auth::id();

        $pic = [];
        $filename = [];

        // 画像のパスを設定
        if($request->pic1 !== null){
            $pic1 = $request->file('pic1');
            $filename1 = $pic1->getClientOriginalName();
            $pic1->move(public_path('updates'), $filename1);
        }else{
            $filename1 = 'noimage.png';
        }

        if($request->pic2 !== null){
            $pic2 = $request->file('pic2');
            $filename2 = $pic2->getClientOriginalName();
            $pic2->move(public_path('updates'), $filename2);
        }else{
            $filename2 = 'noimage.png';
        }

        if($request->pic3 !== null){
            $pic3 = $request->file('pic3');
            $filename3 = $pic3->getClientOriginalName();
            $pic3->move(public_path('updates'), $filename3);
        }else{
            $filename3 = 'noimage.png';
        }

        //フォームの内容をDBに保存
        $food->fill([
            'user_id' => $user_id,
            'date'    => $request->date,
            'time'    => $request->time,
            'title'   => $request->title,
            'comment' => $request->comment,
            'pic1'    => '/updates/'.$filename1,
            'pic2'    => '/updates/'.$filename2,
            'pic3'    => '/updates/'.$filename3,
        ])->save();

        //リダイレクト
        return redirect('/mypage')->with('flash_message', '登録しました！');
    }

    //日記編集
    public function edit($id){
        if(!ctype_digit($id)){
            return redirect('/welcome')->with('flash_message', __('不正な操作が行われました'));
        }

        $user = Auth::user();
        $food = DB::table('food')->find($id);

        return view('mypage/foodEdit', compact('user', 'food'));
    }

    // 日記更新
    public function update(ValidRequest $request, $id){
        if(!ctype_digit($id)){
            return redirect('/welcome')->with('flash_message', __('不正な操作が行われました'));
        }

        $user_id = Auth::user()->id;
        $pic = [];
        $filename = [];

        // 画像のパスを設定
        if($request->pic1 !== null){
            // ファイル形式で保存
            $pic1 = $request->file('pic1');
            $filename1 = $pic1->getClientOriginalName();
            // パス名を指定してupdatesディレクトリに移動
            $pic1->move(public_path('updates'), $filename1);
        }else{
            $filename1 = 'noimage.png';
        }

        if($request->pic2 !== null){
            $pic2 = $request->file('pic2');
            $filename2 = $pic2->getClientOriginalName();
            $pic2->move(public_path('updates'), $filename2);
        }else{
            $filename2 = 'noimage.png';
        }

        if($request->pic3 !== null){
            $pic3 = $request->file('pic3');
            $filename3 = $pic3->getClientOriginalName();
            $pic3->move(public_path('updates'), $filename3);
        }else{
            $filename3 = 'noimage.png';
        }

        Food::where('id', $id)->update([
            'user_id' => $user_id,
            'date'    => $request->date,
            'time'    => $request->time,
            'title'   => $request->title,
            'comment' => $request->comment,
            'pic1'    => '/updates/'.$filename1,
            'pic2'    => '/updates/'.$filename2,
            'pic3'    => '/updates/'.$filename3,
        ]);

        return redirect('/index/food')->with('flash_message', '日記情報を更新しました！');
    }

    public function delete($id){
        if(!ctype_digit($id)){
            return redirect('/welcome')->with('flash_message', __('不正な操作が行われました'));
        }

        $food = Food::where('id', $id);
        $food->delete();

        return redirect('/index/food')->with('flash_message', '削除しました');
    }


}
