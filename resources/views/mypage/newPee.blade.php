@extends('layouts.parent')

@section('title', 'おしっこ日記作成')

@section('header')

@section('main')
  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>おしっこ日記作成</p>
  </div>

  <div class="c_main-top-img">
    <img src="{{ asset('images/img2.png') }}" alt="" class="c_main-top-img-item">
  </div>

  <form action="{{ route('create_pee') }}" method="post" class="p_form">
    @csrf

     <div class="p_form-wrap">

        <!-- 日時 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">日時*</p>
            </div>
            <div class="p_form-content-items input-datetime">
               <label for="date">日付</label>
               <input type="date" name="date" class="p_form-content-input input-datetime @error('date') valid-error @enderror" id="date" value="{{ old('date') }}">
               <label for="time">時間</label>
               <input type="time" name="time" class="p_form-content-input input-datetime @error('time') valid-error @enderror" id="time" value="{{ old('time') }}">

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
               <input type="text" name="title" class="p_form-content-input @error('title') valid-error @enderror" id="title" value="{{ old('title') }}" placeholder="タイトルがある場合は入力してください">
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
                <textarea name="comment" class="p_form-content-input @error('comment') valid-error @enderror" id="comment" cols="30" rows="10">{{ old('comment') }}</textarea>
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
                <p class="">色*</p>
            </div>
            <div class="p_form-content-items">
                <p class="p_form-content-items-text">近いものを選択してください</p>
                <p class="p_form-content-items-text">
                    ( 白・透明<i class="fa-solid fa-backward"></i><i class="fa-solid fa-backward"></i>
                    薄黄<i class="fa-solid fa-forward"></i><i class="fa-solid fa-forward"></i>
                    茶・赤 )
                </p>
                <div class="p_form-content-select justfy-ard">
                @for($i = 1; $i <= 7; $i++)
                  <button class="p_form-content-select-btn select-pee-color{{ $i }} js-select-btn">
                     <input type="checkbox" name="color" class="p_form-content-input color-select{{ $i }} @error('color') valid-error @enderror" id="color" value="{{ $i }}">
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
      
        <!-- 量 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">尿量*</p>
            </div>
            <div class="p_form-content-items">
                <p class="p_form-content-items-text">近いものを選択してください</p>
                <p class="p_form-content-items-text">
                    ( 少<i class="fa-solid fa-backward"></i><i class="fa-solid fa-backward"></i>
                    普通<i class="fa-solid fa-forward"></i><i class="fa-solid fa-forward"></i>
                    多 )
                </p>
                <div class="p_form-content-select justfy-ard">
                  @for($i = 1; $i <= 5; $i++)
                  <button class="p_form-content-select-btn js-select-btn">
                     <input type="checkbox" name="volume" class="p_form-content-input @error('volume') valid-error @enderror" id="volume" value="{{ $i }}">
                     <img src="images/volume{{ $i }}.png" class="p_form-content-select-img">
                  </button>
                  @endfor
                </div>
                <!-- error -->
                @error('volume')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
       
        <!-- 頻度 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">回数*</p>
            </div>
            <div class="p_form-content-items">
                <p class="p_form-content-items-text">選択してください（1日あたり）</p>
                <p class="p_form-content-items-text">
                    ( 〜2回<i class="fa-solid fa-backward"></i><i class="fa-solid fa-backward"></i>
                    3〜7回<i class="fa-solid fa-forward"></i><i class="fa-solid fa-forward"></i>
                    8回〜 )
                </p>
                <div class="p_form-content-select justfy-eve">
                @for($i = 1; $i <= 3; $i++)
                  <button class="p_form-content-select-btn js-select-btn">
                     <input type="checkbox" name="frequency" class="p_form-content-input @error('frequency') valid-error @enderror" id="frequency" value="{{ $i }}">
                     <img src="images/frequency{{ $i }}.png" class="p_form-content-select-img small">
                 </button>
                 @endfor
                </div>
                <!-- error -->
                @error('frequency')
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

@endsection

@section('footer')