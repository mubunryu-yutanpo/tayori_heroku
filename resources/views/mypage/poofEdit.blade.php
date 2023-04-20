@extends('layouts.parent')

@section('title', 'ウンチ日記編集')

@section('header')

@section('main')
  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>ウンチ日記編集</p>
  </div>

  <div class="c_main-top-img">
    <img src="{{ asset('images/img2.png') }}" alt="" class="c_main-top-img-item">
  </div>

  <form action="{{ route('update_poof', $poof->id) }}" method="post" class="p_form">
    @csrf

     <div class="p_form-wrap">

        <!-- 日時 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">日時</p>
            </div>
            <div class="p_form-content-items input-datetime">
               <label for="date">日付</label>
               <input type="date" name="date" class="p_form-content-input input-datetime @error('date') valid-error @enderror" id="date" value="{{ $poof->date }}">
               <label for="time">時間</label>
               <input type="time" name="time" class="p_form-content-input input-datetime @error('time') valid-error @enderror" id="time" value="{{ $poof->time }}">

               <!-- error -->
                @error('date')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- タイトル -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">タイトル</p>
            </div>
            <div class="p_form-content-items">
               <input type="text" name="title" class="p_form-content-input @error('title') valid-error @enderror" id="title" value="{{ $poof->title }}" placeholder="タイトルがある場合は入力してください">
                <!-- error -->
                @error('title')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- コメント -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">コメント</p>
            </div>
            <div class="p_form-content-items">
                <textarea name="comment" class="p_form-content-input @error('comment') valid-error @enderror" id="comment" cols="30" rows="10">{{ $poof->comment }}</textarea>
                <!-- error -->
                @error('comment')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- 色 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">色</p>
            </div>
            <div class="p_form-content-items">
                <p class="p_form-content-items-text">近いものを選択してください</p>
                <div class="p_form-content-select">
                @for($i = 1; $i <= 9; $i++)
                  <button class="p_form-content-select-btn select-poof-color{{ $i }} js-select-btn @if($i === $poof->color) selected @endif">
                     <input type="checkbox" name="color" class="p_form-content-input color-select{{ $i }} @error('color') valid-error @enderror" id="color" value="{{ $i }}" @if($i === $poof->color) checked @endif>
                 </button>
                 @endfor
                </div>
                <!-- error -->
                @error('color')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
      
        <!-- 形 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">形</p>
            </div>
            <div class="p_form-content-items">
                <p class="p_form-content-items-text">近いものを選択してください</p>
                <p class="p_form-content-items-text">
                    ( 固形<i class="fa-solid fa-backward"></i><i class="fa-solid fa-backward"></i>
                    普通<i class="fa-solid fa-forward"></i><i class="fa-solid fa-forward"></i>
                    水状 )
                </p>
                <div class="p_form-content-select nowrap">
                  @for($i = 1; $i <= 7; $i++)
                  <button class="p_form-content-select-btn js-select-btn @if($i === $poof->shape) selected @endif">
                     <input type="checkbox" name="shape" class="p_form-content-input @error('shape') valid-error @enderror" id="shape" value="{{ $i }}" @if($i === $poof->smell) checked @endif">
                     <img src="{{ asset('images/shape' .$i. '.png') }}" class="p_form-content-select-img">
                  </button>
                  @endfor
                </div>
                <!-- error -->
                @error('shape')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
       
        <!-- ニオイ -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">ニオイ</p>
            </div>
            <div class="p_form-content-items">
                <p class="p_form-content-items-text">近いものを選択してください</p>
                <p class="p_form-content-items-text">
                    ( 無臭<i class="fa-solid fa-backward"></i><i class="fa-solid fa-backward"></i>
                    普通<i class="fa-solid fa-forward"></i><i class="fa-solid fa-forward"></i>
                    強烈 )
                </p>
                <div class="p_form-content-select justfy-eve">
                @for($i = 1; $i <= 3; $i++)
                  <button class="p_form-content-select-btn js-select-btn @if($i === $poof->smell) selected @endif">
                     <input type="checkbox" name="smell" class="p_form-content-input @error('smell') valid-error @enderror" id="smell" value="{{ $i }}" @if($i === $poof->smell) checked @endif">
                     <img src="{{ asset('images/smell' .$i. '.png') }}" class="p_form-content-select-img small">
                 </button>
                 @endfor
                </div>
                <!-- error -->
                @error('smell')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="c_submit">
            <button type="submit" class="c_submit-btn">登録する</button>
        </div>

     </div><!--form-wrap-->
  </form>

  <form action="{{ route('delete_poof', $poof->id) }}" method="post" class="p_form ta-right">
    @csrf
    <button type="submit" class="c_submit-btn" onclick='return confirm("この日記を削除しますか？");'>削除する</button>
  </form>


@endsection

@section('footer')