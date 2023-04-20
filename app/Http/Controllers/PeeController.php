<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ValidRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Pee;


class PeeController extends Controller
{
    // 日記一覧へ
    public function index(Request $request)
    {
        $query = Pee::query();
    
        $sort = $request->query('sort');
        if ($sort === 'asc') {
            $query->orderBy('date', 'asc');
        } else if ($sort === 'desc') {
            $query->orderBy('date', 'desc');
        }
    
        $pees = $query->paginate(7);
    
        return view('/mypage/indexPee', compact('pees'));
    }

    // 日記作成ページへ
    public function new(){
        return view('/mypage/newPee');
    }

    // 日記作成
    public function create(ValidRequest $request){
        $food = new Pee;
        $user_id = Auth::id();

        if($request->color === null || $request->volume === null || $request->frequency === null){
            return redirect('/newPee')->with('flash_message', '保存に失敗しました');
        }

        //フォームの内容をDBに保存
        $food->fill([
            'user_id' => $user_id,
            'date'    => $request->date,
            'time'    => $request->time,
            'title'   => $request->title,
            'comment' => $request->comment,
            'color'   => $request->color,
            'volume'  => $request->volume,
            'frequency' => $request->frequency,
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
            $pee = DB::table('pee')->find($id);
            //dd($pee);
    
            return view('mypage/peeEdit', compact('user', 'pee'));
        }

        // 日記情報更新
        public function update(ValidRequest $request, $id){
            if(!ctype_digit($id)){
                return redirect('/welcome')->with('flash_message', __('不正な操作が行われました'));
            }
    
            $user_id = Auth::user()->id;

            // 選択肢がバリデーションしないので、空欄ならリダイレクト
            if($request->color === null || $request->volume === null || $request->frequency === null){
                return redirect('/newPee')->with('flash_message', '保存に失敗しました');
            }
    
            
            Pee::where('id', $id)->update([
                'user_id' => $user_id,
                'date'    => $request->date,
                'time'    => $request->time,
                'title'   => $request->title,
                'comment' => $request->comment,
                'color'   => $request->color,
                'volume'  => $request->volume,
                'frequency' => $request->frequency,
            ]);

            return redirect('/index/pee')->with('flash_message', '日記情報を更新しました');
        }
    
        public function delete($id){
            if(!ctype_digit($id)){
                return redirect('/welcome')->with('flash_message', __('不正な操作が行われました'));
            }
    
            $pee = Pee::where('id', $id);
            $pee->delete();
    
            return redirect('/index/pee')->with('flash_message', '削除しました');
        }
    
}
