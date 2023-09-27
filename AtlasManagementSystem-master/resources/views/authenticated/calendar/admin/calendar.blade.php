@extends('layouts.sidebar')
@section('content')
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-100 vh-100 border p-5">
    <div id="wrapper" class="m-auto border" style="border-radius:5px; background:#FFF;">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div>
        {!! $calendar->render() !!}
      </div>
    </div>
  </div>
</div>
</div>
@endsection
