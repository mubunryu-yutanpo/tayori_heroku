@extends('layouts.parent')

@section('title', 'おしっこ日記一覧')

@section('header')

@section('main')
  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>おしっこ日記一覧</p>
  </div>

  <div class="c_main-sort">
    <form method="GET" action="{{ route('index_food', $user->id) }}">
      <select name="sort" id="sort" onchange="this.form.submit()">
        <option value="asc" {{ request()->query('sort') === 'asc' ? 'selected' : '' }}>古い順</option>
        <option value="desc" {{ request()->query('sort') === 'desc' ? 'selected' : '' }}>新しい順</option>
      </select>
    </form>
  </div>

  @foreach($pees as $pee)
  <div class="c_contents-card">
    <div class="c_contents-title">
        <h3 class="c_contents-title-text">{{ $pee->title }}</h3>
    </div>
    <div class="c_contents-diary">
            <p class="c_contents-diary-date">@if($pee !== null){{ $pee->date }}@endif</p>
            <p>@if($pee !== null){{ $pee->comment }}@endif</p>
            <div class="c_submit ta-right">
               <button type="button" class="p_button-primary">
                  <a href="{{ route('edit_pee', $pee->id) }}">編集</a>
                </button>
            </div>
    </div>
  </div>
  @endforeach

  <!-- ページネーション -->
  <div class="pagination">
    {{ $pees->links() }}
  </div>


@endsection

@section('footer')