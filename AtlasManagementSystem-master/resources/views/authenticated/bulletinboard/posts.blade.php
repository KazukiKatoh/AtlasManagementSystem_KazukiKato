@extends('layouts.sidebar')
@section('content')
<div class="board_area w-100 m-auto d-flex">
  <div class="post_view w-75 mt-5">
    <p class="w-75 m-auto">投稿一覧</p>
    @foreach($posts as $post)
    <div class="post_area radius_white border w-75 m-auto p-3">
      <p><span>{{ $post->user->over_name }}</span><span class="ml-3">{{ $post->user->under_name }}</span>さん</p>
      <p><a href="{{ route('post.detail', ['id' => $post->id]) }}">{{ $post->post_title }}</a></p>
      @foreach ($post->subCategories as $subcategory)
      <div>
        <span class="category_btn">{{ $subcategory->sub_category }}</span>
      </div>
      @endforeach
      <div class="post_bottom_area d-flex">
        <div class="d-flex post_status">
          <div class="mr-5">
            <i class="fa fa-comment"></i> <span class="">{{ $post->postComments->count() }}</span>
          </div>
          <div>
            @if(Auth::user()->is_Like($post->id))
            <p class="m-0">
              <i class="fas fa-heart un_like_btn" post_id="{{ $post->id }}"></i> <span class="like_counts{{ $post->id }}">{{ $post->like->count() }}</span>
            </p>
            @else
            <p class="m-0">
              <i class="fas fa-heart like_btn" post_id="{{ $post->id }}"></i>
              <span class="like_counts{{ $post->id }}">
                @if($post->like->count() > 0)
                {{ $post->like->count() }}
                @else
                0
                @endif
              </span>
            </p>
            @endif
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="other_area">
    <div class="m-4">
      <div class="search-input"><a href="{{ route('post.input') }}">投稿</a></div>
      <div class="search-input-container">
        <input type="text" placeholder="キーワードを検索" name="keyword" form="postSearchRequest" class="left-element">
        <input type="submit" value="検索" form="postSearchRequest" class="right-element">
      </div>
      <div class="category_box">
        <input type="submit" name="like_posts" class="two_btn liked_btn" value="いいねした投稿" form="postSearchRequest">
        <input type="submit" name="my_posts" class="two_btn my_post_btn" value="自分の投稿" form="postSearchRequest">
      </div>
      <ul>
        <div><span>カテゴリー検索</span></div>
        @foreach($categories as $category)
        <li class="main_categories" category_id="{{ $category->id }}">
          <span>{{ $category->main_category }}</span>
          <i class="fa-solid fa-chevron-down fa-sm" style="color: #000000; float: right; margin: 14px 10px 0 0;"></i>
          <div></div>
          <ul class="sub_categories">
            @foreach($category->subCategories as $subCategory)
            <li>
              <input type="submit" name="category_word" value="{{ $subCategory->sub_category }}" form="postSearchRequest">
            </li>
            @endforeach
          </ul>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  <form action="{{ route('post.show') }}" method="get" id="postSearchRequest"></form>
</div>
@endsection
