@extends('layouts.parent')

@section('title', '退会ページ')

@section('header')

@section('main')
  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>退会ページ</p>
  </div>

  <div class="c_contents-withdrow">
    <div class="c_contents-withdrow-title">
      <strong>データを消去して退会しますか？</strong>
    </div>
    <p class="c_contents-withdrow-about">現在保存されている全ての日記データがTayoriから完全に削除されます。</p>
    <p class="c_contents-withdrow-about">削除されたデータの復元はできません。</p>

    <form action="{{ route('delete_user', $user->id) }}" method="post">
        @csrf
        <div class="c_submit ta-center">
          <button type="submit" class="c_submit-btn" onclick='return confirm("全データを削除して退会します");'>退会する</button>
        </div>
    </form>

  </div>

@endsection

@section('footer')
