@extends('layouts.parent')

@section('title', 'マイページ')

@section('header')

@section('main')

  <div class="c_main-user">
    <p class="c_main-user-name">{{ $user->name }} さん</p>
    <div class="c_main-user-img">
      <img src="{{ $avatar }}" alt="" class="c_main-user-img-item">
    </div>
  </div>

  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>マイページ</p>
      <p class="c_main-title-about margin-b-40">※最新の日記のみ表示しています</p>
  </div>

  <div class="c_contents-card">
    <div class="c_contents-title">
        <h3 class="c_contents-title-text">@if($poof !== null){{ $poof->title }}@else ウンチ日記 @endif</h3>
    </div>
    <div class="c_contents-diary">
            <p class="c_contents-diary-date">@if($poof !== null){{ $poof->date }}@endif</p>
            <p>@if($poof !== null){{ $poof->comment }}@else まだ日記がありません @endif</p>
            @if($poof !== null)
            <div class="c_submit ta-right">
              <button type="button" class="p_button-primary">
                <a href="{{ route('edit_poof', $poof->id) }}">編集</a>
              </button>
            </div>
            @endif
    </div>
  </div>

  <div class="c_contents-card">
    <div class="c_contents-title">
        <h3 class="c_contents-title-text">@if($pee !== null){{ $pee->title }}@else オシッコ日記 @endif</h3>
    </div>
    <div class="c_contents-diary">
            <p class="c_contents-diary-date">@if($pee !== null){{ $pee->date }}@endif</p>
            <p>@if($pee !== null){{ $pee->comment }}@else まだ日記がありません @endif</p>
            @if($pee !== null)
            <div class="c_submit ta-right">
              <button type="button" class="p_button-primary">
                <a href="{{ route('edit_pee', $pee->id) }}">編集</a>
              </button>
            </div>
            @endif
    </div>
  </div>

  <div class="c_contents-card">
    <div class="c_contents-title">
        <h3 class="c_contents-title-text">@if($food !== null){{ $food->title }}@else 食べたもの日記 @endif</h3>
    </div>
    <div class="c_contents-diary">
            <p class="c_contents-diary-date">@if($food !== null){{ $food->date }}@endif</p>
            <div class="c_contents-diary-img">
                @if($food !== null)
                <img src="{{ $food->pic1 }}" alt="" class="c_contents-diary-img-item">
                @endif
            </div>
            <p>@if($food !== null){{ $food->comment }}@else まだ日記がありません @endif</p>
            @if($food !== null)
            <div class="c_submit ta-right">
              <button type="button" class="p_button-primary">
                <a href="{{ route('edit_food', $food->id) }}">編集</a>
              </button>
            </div>
            @endif
    </div>
  </div>

@endsection

@section('footer')