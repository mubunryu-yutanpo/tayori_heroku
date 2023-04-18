@extends('Layouts.parent')

@section('title', 'ウンチ日記一覧')

@section('header')

@section('main')
  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>ウンチ日記一覧</p>
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