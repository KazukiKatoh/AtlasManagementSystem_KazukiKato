@extends('layouts.sidebar')
@section('content')
<div class="search_content w-100 d-flex">
  <div class="reserve_users_area">
    @foreach($users as $user)
    <div class="border radius_white one_person">
      <div>
        <span>ID : </span><span>{{ $user->id }}</span>
      </div>
      <div><span>名前 : </span>
        <a href="{{ route('user.profile', ['id' => $user->id]) }}">
          <span>{{ $user->over_name }}</span>
          <span>{{ $user->under_name }}</span>
        </a>
      </div>
      <div>
        <span>カナ : </span>
        <span>({{ $user->over_name_kana }}</span>
        <span>{{ $user->under_name_kana }})</span>
      </div>
      <div>
        @if($user->sex == 1)
        <span>性別 : </span><span>男</span>
        @elseif($user->sex == 2)
        <span>性別 : </span><span>女</span>
        @elseif($user->sex == 3)
        <span>性別 : </span><span>その他</span>
        @endif
      </div>
      <div>
        <span>生年月日 : </span><span>{{ $user->birth_day }}</span>
      </div>
      <div>
        @if($user->role == 1)
        <span>権限 : </span><span>教師(国語)</span>
        @elseif($user->role == 2)
        <span>権限 : </span><span>教師(数学)</span>
        @elseif($user->role == 3)
        <span>権限 : </span><span>講師(英語)</span>
        @else
        <span>権限 : </span><span>生徒</span>
        @endif
      </div>
      <div>
        @if($user->role == 4)
        <span>選択科目 :</span>
        @foreach($user->subjects as $subject)
        <span> {{$subject->subject}}</span>
        @endforeach
        @endif
      </div>
    </div>
    @endforeach
  </div>
  <div class="search_area w-25">
    <div>
      <h3>検索</h3>
    </div>
    <div class="w-100 radius_gray">
      <input type="text" class="free_word" name="keyword" placeholder="キーワードを検索" form="userSearchRequest">
    </div>
    <div>
      <lavel class="search_column">カテゴリ</lavel>
      <div class="radius_gray">
        <select form="userSearchRequest" name="category">
          <option value="name">名前</option>
          <option value="id">社員ID</option>
        </select>
      </div>
    </div>
    <div>
      <label class="search_column">並び替え</label>
      <div class="radius_gray">
        <select name="updown" form="userSearchRequest">
          <option value="ASC">昇順</option>
          <option value="DESC">降順</option>
        </select>
      </div>
    </div>
    <div class="search_addition">
      <p class="search_conditions">
        <span>検索条件の追加</span> <i class="fa-solid fa-chevron-down fa-sm" style="color: #000000;"></i>
      </p>
      <div class="underline"></div>
      <div class="search_conditions_inner">
        <div>
          <label class="search_column">性別</label>
          <div>
            <span>男 </span><input type="radio" name="sex" value="1" form="userSearchRequest">
            <span>　女 </span><input type="radio" name="sex" value="2" form="userSearchRequest">
            <span>　その他 </span><input type="radio" name="sex" value="3" form="userSearchRequest">
          </div>
        </div>
        <div class="w-30 radius_gray">
          <label class="search_column">権限</label>
          <div>
            <select name="role" form="userSearchRequest" class="engineer">
              <option selected disabled>----</option>
              <option value="1">教師(国語)</option>
              <option value="2">教師(数学)</option>
              <option value="3">教師(英語)</option>
              <option value="4">生徒</option>
            </select>
          </div>
        </div>
        <div class="selected_engineer">
          <label class="search_column">選択科目</label>
          <div class="checkbox-container">
            @foreach($subjects as $subject)
            <div class="checkbox-item">
              <label>{{ $subject->subject }}</label>
              <input type="checkbox" name="subject[]" value="{{ $subject->id }}" form="userSearchRequest">　
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <div>
      <input type="submit" class="search-input" name="search_btn" value="検索" form="userSearchRequest">
    </div>
    <div>
      <input type="reset" class="reset" value="リセット" form="userSearchRequest">
    </div>
  </div>
  <form action="{{ route('user.show') }}" method="get" id="userSearchRequest"></form>
</div>
@endsection
