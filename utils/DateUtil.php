<?php

class DateUtil{

  private static $timeMessage = "";

  static function getDifferentDate($dateStart)
  {
    $start = new DateTimeImmutable($dateStart);
    $now = new DateTimeImmutable();

    $dateOb = $start->diff($now);
    
    if($dateOb->y >= 1):
      if($dateOb->y == 1):
        self::$timeMessage = $dateOb->y . " year ago";
      else:
        self::$timeMessage = $dateOb->y . " years ago";
      endif;
    elseif ($dateOb->m >= 1):
      if($dateOb->d == 0):
        $days = $dateOb->d . " day ago";
      elseif($dateOb->d == 1):
        $days = $dateOb->d . " days ago";
      else:
        $days = $dateOb->d . " days ago";
      endif;

      if($dateOb->m == 1):
        self::$timeMessage = $dateOb->m . " month " . $days;
      else:
        self::$timeMessage = $dateOb->m . " months " . $days;
      endif;
    elseif ($dateOb->d >= 1):
      if($dateOb->d == 1):
        self::$timeMessage = "Yesterday";
      else:
        self::$timeMessage = $dateOb->d . " days ago";
      endif;
    elseif ($dateOb->i >= 1):
      if($dateOb->i == 1):
        self::$timeMessage = $dateOb->i . "minute ago";
      else:
        self::$timeMessage = $dateOb->i . " minutes ago";
      endif;
    else:
      if($dateOb->s < 30):
        self::$timeMessage = "Just now";
      else:
        self::$timeMessage = $dateOb->s . " seconds ago";
      endif;
    endif;

    return self::$timeMessage;
  }
}