@extends('layouts.parent')

@section('title', 'プロフィール編集')

@section('header')

@section('main')
  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>プロフィール編集画面</p>
  </div>

  <form action="{{ route('prof_update', $user->id) }}" method="post" class="p_form" enctype="multipart/form-data">
    @csrf

     <div class="p_form-wrap">

        <!-- 名前 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">名前</p>
            </div>
            <div class="p_form-content-items">
               <input type="text" name="name" class="p_form-content-input @error('name') valid-error @enderror" id="name" value="{{ $user->name }}">
                <!-- error -->
                @error('name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- mail -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">Email</p>
            </div>
            <div class="p_form-content-items">
               <input type="text" name="email" class="p_form-content-input @error('email') valid-error @enderror" id="email" value="{{ $user->email }}">
                <!-- error -->
                @error('email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- 画像 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">アバター画像</p>
            </div>
            <div class="p_form-content-items">
                    <label class="c_file-label">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                        <input type="file" class="c_file-input js-file-input" name="avatar" enctype="multipart/form-data">
                        <img src="{{ $user->avatar }}" alt="" class="c_file-img js-file-img">
                        ドラッグ＆ドロップ
                    </label>
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

        <div class="">
            <a href="{{ route('withdrow', $user->id) }}" class="p_withdrow-text">退会はこちら</a>
        </div>

     </div><!--form-wrap-->
  </form>

@endsection

@section('footer')