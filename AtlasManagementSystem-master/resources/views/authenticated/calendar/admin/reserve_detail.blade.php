@extends('layouts.sidebar')
@section('content')
<div class="vh-100 d-flex" style="align-items:center; justify-content:center;">
  <div class="w-50 m-auto h-75">
    <p><span>{{ $date }}日</span><span class="ml-3">{{ $part }}部</span></p>
    <div class="radius_white reservation">
      <table class="reservation_list">
        <tr class="reservation_column text-center">
          <th class="w-25">ID</th>
          <th class="w-25">名前</th>
          <th class="w-25">予約場所</th>
        </tr>
        @php $rowNumber = 0 @endphp
        @foreach($reservePersons as $reservePerson)
        @foreach($reservePerson->users as $user)
        @php $rowNumber++ @endphp
        <tr class="text-center {{ $rowNumber % 2 == 0 ? 'even-row' : 'odd-row' }}">
          <td class="w-25">{{ $user->id }}</td>
          <td class="w-25">{{ $user->over_name }} {{ $user->under_name }}</td>
          <td class="w-25">リモート</td>
        </tr>
        <tr>
          <td colspan="3" class="thickline"></td>
        </tr>
        @endforeach
        @endforeach
      </table>
    </div>
  </div>
</div>
@endsection
