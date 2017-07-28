<?php

namespace App\library;

class Date
{

  private $monthNameAbbrev = array(
    'ม.ค.',
    'ก.พ.',
    'มี.ค.',
    'เม.ย.',
    'พ.ค.',
    'มิ.ย.',
    'ก.ค.',
    'ส.ค.',
    'ก.ย.',
    'ต.ค.',
    'พ.ย.',
    'ธ.ค.',
  );

  private $monthName = array(
    'มกราคม',
    'กุมภาพันธ์',
    'มีนาคม',
    'เมษายน',
    'พฤษภาคม',
    'มิถุนายน',
    'กรกฎาคม',
    'สิงหาคม',
    'กันยายน',
    'ตุลาคม',
    'พฤศจิกายน',
    'ธันวาคม',
  );

  public function today($time = true, $timestamp = false) {

    $today = date('Y-m-d 00:00:00');
    if(!$time) {
      $today = date('Y-m-d');
    }
    
    if($timestamp) {
      return strtotime($today);
    }

    return $today;

  }

  public function now($time = true, $timestamp = false) {

    $now = date('Y-m-d H:i:s');
    if(!$time) {
      $now = date('Y-m-d');
    }
    
    if($timestamp) {
      return strtotime($now);
    }

    return $now;

  }

  public function getYearTh($year) {
    return $year+543;
  }

  public function covertDateToSting($date) {
    $date = explode('-', $date);
    return (int)$date[2].' '.$this->getMonthName($date[1]).' '.($date[0]+543);
  }

  public function covertTimeToSting($dateTime) {
    list($date,$time) = explode(' ', $dateTime);

    $time = explode(':', $time);

    return (int)$time[0].':'.$time[1];
  }

  public function covertDateTimeToSting($dateTime,$includeSec = false) {

    list($date,$time) = explode(' ', $dateTime);

    $date = explode('-', $date);
    $time = explode(':', $time);

    return (int)$date[2].' '.$this->getMonthName($date[1]).' '.($date[0]+543). ' เวลา '.(int)$time[0].':'.$time[1];
  }

  public function explodeDateTime($dateTime) {
    list($date,$time) = explode(' ', $dateTime);

    $date = explode('-', $date);
    $time = explode(':', $time);

    return array(
      'year' => $date[0],
      'month' => $date[1],
      'day' => $date[2],
      'hour' => $time[0],
      'min' => $time[1],
      'sec' => $time[2],
    );
  }

  public function getDayName($day) {   

    $dayName = array(
      'วันจันทร์',
      'วันอังคาร',
      'วันพุธ',
      'วันพฤหัสบดี',
      'วันศุกร์',
      'วันเสาร์',
      'วันอาทิตย์'
    );

    return !empty($dayName[$day-1]) ? $dayName[$day-1] : null;

  }

  public function getMonthName($month,$Abbrev = false) {   

    if($Abbrev) {
      return !empty($this->monthNameAbbrev[$month-1]) ? $this->monthNameAbbrev[$month-1] : null;
    }

    return !empty($this->monthName[$month-1]) ? $this->monthName[$month-1] : null;

  }

  public function appendTimeForDateStartAndDateEnd($dateStart,$dateEnd) {
    return array(
      'date_start' => date('Y-m-d',strtotime($dateStart)). ' 00:00:00',
      'date_end' => date('Y-m-d',strtotime($dateEnd)). ' 23:59:59'
    );
  }

  // public function setPeriodData($attributes) {

  //   $data = array();

  //   $data = array(
  //     'start_year' => null,
  //     'start_month' => null,
  //     'start_day' => null,
  //     'end_year' => null,
  //     'end_month' => null,
  //     'end_day' => null,
  //     'current' => null,
  //   );

  //   if(!empty($attributes['date_start'])) {
  //     foreach ($attributes['date_start'] as $key => $value) {
  //       $data['start_'.$key] = $value;
  //     }
  //   }

  //   if(empty($attributes['current']) && !empty($attributes['date_end'])) {
  //     foreach ($attributes['date_end'] as $key => $value) {
  //       $data['end_'.$key] = $value;
  //     }
  //   }
  //   elseif(!empty($attributes['current'])) {
  //     $data['current'] = $attributes['current'];
  //   }

  //   return $data;

  // }

  public function getFirstAndLastDateOfMonth($month,$year) {

    $month = (int)$month;

    if(in_array($month, array(1,3,5,7,8,10,12))) {
      $date = 31;
    }elseif(in_array($month, array(4,6,9,11))) {
      $date = 30;
    }elseif($this->isLeapYear($year)) {
      $date = 29;
    }else{
      $date = 28;
    }

    return array(
      'start' => $year.'-'.$month.'-1 00:00:00',
      'end' => $year.'-'.$month.'-'.$date.' 23:59:59',
    );

  }

  public function remainingDate($end = null,$strat = null) {

    if(empty($end)) {
      $end  = strtotime(date('Y-m-t'))+86400; // First Date of next month
    }else{
      $end = strtotime($end);
    }

    if(empty($start)) {
      $start  = time(); // Current time
    }else{
      $start = strtotime($start);
    }

    if($start > $end) {
      return null;
    }

    $secs = $end - $start;
    $mins = (int)floor($secs / 60);
    $hours = (int)floor($mins / 60);
    $days = (int)floor($hours / 24);
    $months = (int)floor($days / 30);
    $years = (int)floor($months / 12);

    if($years > 0) {
      $label = $years.' ปี';
    }elseif($months > 0) {
      // $remainingDays = $days - (30 * $months);
      $label = $months.' เดือน ';
    }elseif($days > 0) {
      $label = $days.' วัน';
    }else {
      $remainingSecs = $secs % 60;
      $remainingMins = $mins % 60;
      $remainingHours = $hours % 24;

      if($remainingHours != 0) {
        $label = $remainingHours.' ชั่วโมง';
      }elseif($remainingMins != 0) {
        $label = $remainingMins.' นาที';
      }elseif($remainingSecs > 30) {
        $label = $remainingSecs.' วินาที';
      }elseif($remainingSecs > 5) {
        $label = 'ไม่กี่วินาที';
      }
    }

    return $label;
  }

  // public function calPassedDate($dateTime) {

  //   $secs = time() - strtotime($dateTime);
  //   $mins = (int)floor($secs / 60);
  //   $hours = (int)floor($mins / 60);
  //   $days = (int)floor($hours / 24);

  //   $passed = 'เมื่อสักครู่นี้';
  //   if($days == 0) {
  //     $passedSecs = $secs % 60;
  //     $passedMins = $mins % 60;
  //     $passedHours = $hours % 24;

  //     if($passedHours != 0) {
  //       $passed = $passedHours.' ชั่วโมงที่แล้ว';
  //     }elseif($passedMins != 0) {
  //       $passed = $passedMins.' นาทีที่แล้ว';
  //     }elseif($passedSecs > 30) {
  //       $passed = $passedSecs.' วินาทีที่แล้ว';
  //     }elseif($passedSecs > 10) {
  //       $passed = 'ไม่กี่วินาทีที่แล้ว';
  //     }

  //   }elseif($days == 1){
  //     $passed = 'เมื่อวานนี้ เวลา '.$this->covertTimeToSting($dateTime);
  //   }else{
  //     $passed = $this->covertDateTimeToSting($dateTime);
  //   }

  //   return $passed;
  // }

  public function isLeapYear($year) {
    return ((($year % 4) == 0) && ((($year % 100) != 0) || (($year % 400) == 0)));
  }

  // public function findDateRange($start,$end,$date = array()) {

  //   $yearStart = $date['year'] - $end;
  //   $yearEnd = $date['year'] - $start;

  //   if(!$this->isLeapYear($yearStart) && ((int)$date['month'] == 2) && ($date['day'] == 29)) {
  //     $start = $yearStart.'-'.$date['month'].'-28 00:00:00';
  //   }else{
  //     $start = $yearStart.'-'.$date['month'].'-'.$date['day'].' 00:00:00';
  //   }

  //   if(!$this->isLeapYear($yearEnd) && ((int)$date['month'] == 2) && ($date['day'] == 29)) {
  //     $end = $yearEnd.'-'.$date['month'].'-28 23:59:59';
  //   }else{
  //     $end = $yearEnd.'-'.$date['month'].'-'.$date['day'].' 23:59:59';
  //   }

  //   return array(
  //     'start' => $start,
  //     'end' => $end
  //   );

  // }

}
