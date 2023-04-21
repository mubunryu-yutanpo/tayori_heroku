@extends('layouts.parent')

@section('title', 'ウンチ日記一覧')

@section('header')

@section('main')
  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>ウンチ日記一覧</p>
  </div>

  <div class="c_main-sort">
    <form method="GET" action="{{ route('index_food', $user->id) }}">
      <select name="sort" id="sort" onchange="this.form.submit()">
        <option value="asc" {{ request()->query('sort') === 'asc' ? 'selected' : '' }}>古い順</option>
        <option value="desc" {{ request()->query('sort') === 'desc' ? 'selected' : '' }}>新しい順</option>
      </select>
    </form>
  </div>

  @foreach($poofs as $poof)
  <div class="c_contents-card">
    <div class="c_contents-title">
        <h3 class="c_contents-title-text">{{ $poof->title }}</h3>
    </div>
    <div class="c_contents-diary">
        <p class="c_contents-diary-date">@if($poof !== null){{ $poof->date }}@endif</p>
        <p>@if($poof !== null){{ $poof->comment }}@endif</p>
        <div class="c_submit ta-right">
          <button type="button" class="p_button-primary">
            <a href="{{ route('edit_poof', $poof->id) }}">編集</a>
          </button>
        </div>
    </div>
  </div>
  @endforeach

  <!-- ページネーション -->
  <div class="pagination">
    {{ $poofs->links() }}
  </div>


@endsection

@section('footer')