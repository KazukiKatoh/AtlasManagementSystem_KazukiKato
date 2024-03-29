<?php

namespace App\Calendars\General;

use Carbon\Carbon;

class CalendarView
{
  private $carbon;
  function __construct($date)
  {
    $this->carbon = new Carbon($date);
  }
  public function getTitle()
  {
    return $this->carbon->format('Y年n月');
  }
  public function render()
  {
    $html = [];
    $html[] = '<div id="wrapper" class="calendar radius_white text-center">';
    $html[] = '<table class="table m-auto border">';
    $html[] = '<thead>';
    $html[] = '<tr>';
    $html[] = '<th>月</th>';
    $html[] = '<th>火</th>';
    $html[] = '<th>水</th>';
    $html[] = '<th>木</th>';
    $html[] = '<th>金</th>';
    $html[] = '<th>土</th>';
    $html[] = '<th>日</th>';
    $html[] = '</tr>';
    $html[] = '</thead>';
    $html[] = '<tbody>';
    $weeks = $this->getWeeks();
    foreach ($weeks as $week) {
      $html[] = '<tr class="' . $week->getClassName() . '">';
      $days = $week->getDays();
      foreach ($days as $day) {
        $startDay = $this->carbon->copy()->format("Y-m-01");
        $toDay = $this->carbon->copy()->format("Y-m-d");
        // 過去日指定
        if ($startDay <= $day->everyDay() && $toDay >= $day->everyDay()) {
          $html[] = '<td class="calendar-td " style="background-color: #D3D3D3;">';
        } else {
          $html[] = '<td class="calendar-td ' . $day->getClassName() . '">';
        }
        $html[] = $day->render();
        // ログインしている人が予約している場合
        if (in_array($day->everyDay(), $day->authReserveDay())) {
          $reservePart = $day->authReserveDate($day->everyDay())->first()->setting_part;
          if ($reservePart == 1) {
            $reservePart = "リモ1部";
          } else if ($reservePart == 2) {
            $reservePart = "リモ2部";
          } else if ($reservePart == 3) {
            $reservePart = "リモ3部";
          }
          // 予約していてかつ過去日の場合
          if ($startDay <= $day->everyDay() && $toDay >= $day->everyDay()) {
            $html[] = '<p class="m-auto p-0 w-75" style="font-size:12px">' . $reservePart . '参加' . '</p>';
            $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
          }
          // 予約していて過去日ではない場合
          else {
            $html[] = '<button type="submit" class="delete-modal-open btn btn-danger p-0 w-75" name="delete_date" reserve_date ="' . $day->authReserveDate($day->everyDay())->first()->setting_reserve . '" reserve_part="' . $day->authReserveDate($day->everyDay())->first()->setting_part . '" style="font-size:12px" value="">' . $reservePart . '</button>';
            $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
          }
          // 予約してない場合
        } else {
          if ($startDay <= $day->everyDay() && $toDay >= $day->everyDay()) {
            $html[] = '<p class="m-auto p-0 w-75" style="font-size:12px; color:#000;">受付終了</p>';
            $html[] = '<input type="hidden" name="getPart[]" value="" form="reserveParts">';
          } else {
            $html[] = $day->selectPart($day->everyDay());
          }
        }
        $html[] = $day->getDate();
        $html[] = '</td>';
      }
      $html[] = '</tr>';
    }
    $html[] = '</tbody>';
    $html[] = '</table>';
    $html[] = '</div>';
    $html[] = '<form action="/reserve/calendar" method="post" id="reserveParts">' . csrf_field() . '</form>';
    $html[] = '<form action="/delete/calendar" method="post" id="deleteParts">' . csrf_field() . '</form>';
    return implode('', $html);
  }
  protected function getWeeks()
  {
    $weeks = [];
    $firstDay = $this->carbon->copy()->firstOfMonth();
    $lastDay = $this->carbon->copy()->lastOfMonth();
    $week = new CalendarWeek($firstDay->copy());
    $weeks[] = $week;
    $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();
    while ($tmpDay->lte($lastDay)) {
      $week = new CalendarWeek($tmpDay, count($weeks));
      $weeks[] = $week;
      $tmpDay->addDay(7);
    }
    return $weeks;
  }
}
