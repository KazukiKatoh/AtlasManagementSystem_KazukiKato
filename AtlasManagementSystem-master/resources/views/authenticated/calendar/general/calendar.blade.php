@extends('layouts.sidebar')
@section('content')
<div class="w-100 vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-100 vh-100 border p-5">
    <div id="wrapper" class="m-auto border" style="border-radius:5px; background:#FFF;">
      <p class="text-center">{{ $calendar->getTitle() }}</p>
      <div>
        {!! $calendar->render() !!}
      </div>
      <div class="adjust-table-btn m-auto text-right">
        <input type="submit" class="btn calendar-btn btn-primary" value="予約する" form="reserveParts">
      </div>
    </div>
    <div class="modal js-modal">
      <div class="modal__bg js-modal-close"></div>
      <div class="modal__content">
        <div class="w-100">
          <div class="modal-reserve-date w-50 m-auto">
            <label for="reserve_date">予約日：</label>
            <input type="text" id="reserve_date" name="reserve_date" form="deleteParts" readonly>
          </div>
          <div class="modal-reserve-part w-50 m-auto pt-3 pb-3">
            <label for="reserve_part">時間：リモ</label>
            <input type="text" id="reserve_part" name="reserve_part" form="deleteParts" readonly>
            <span>部</span>
          </div>
          <div class="w-50 m-auto edit-modal-btn d-flex">
            <a class="js-modal-close btn btn-danger d-inline-block" href="#">閉じる</a>
            <input type="submit" class="btn btn-primary d-block" value="キャンセル" form="deleteParts">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
