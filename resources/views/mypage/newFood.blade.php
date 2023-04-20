@extends('layouts.parent')

@section('title', '食べたもの日記作成')

@section('header')

@section('main')
  <div class="c_main-title">
      <p class="c_main-title-text"><i class="fa-solid fa-poo fa-fw"></i>食べたもの日記作成</p>
  </div>

  <div class="c_main-top-img">
    <img src="{{ asset('images/img2.png') }}" alt="" class="c_main-top-img-item">
  </div>

  <form action="{{ route('create_food') }}" method="POST" class="p_form" enctype="multipart/form-data">
    @csrf

     <div class="p_form-wrap">

        <!-- 日時 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">日時</p>
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

        <!-- 画像 -->
        <div class="p_form-content">
            <div class="p_form-content-title">
                <p class="">食べたもの</p>
            </div>
            <div class="p_form-content-items">
                @for($i = 1; $i <= 3; $i++)
                    <p class="">画像{{ $i }}</p>
                    <label class="c_file-label">
                        <input type="hidden" name="MAX_FILE_SIZE" value="3145728">
                        <input type="file" class="c_file-input js-file-input" name="pic{{ $i }}" enctype="multipart/form-data">
                        <img src="" alt="" class="c_file-img js-file-img">
                        ドラッグ＆ドロップ
                    </label>
                 @endfor
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