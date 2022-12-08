<?php

class ChatRoom
{

   private $for_guest_nik;
   private $message;
   private $room_created_date;
   private $my_total_message;
   private $room_id;

   private $admin;

   private $friends_nik;
   private $name_for_display;
   private $images_for_display;


   public function getForGuestNik()
   {
      return $this->for_guest_nik;
   }

   public function setForGuestNik($ForGuestNik)
   {
      $this->for_guest_nik = $ForGuestNik;
   }

   public function getMessage()
   {
      return $this->message;
   }

   public function setMessage($_message)
   {
      $this->message = $_message;
   }

   public function getRoomCreatedDate()
   {
      return $this->room_created_date;
   }

   public function setRoomCreatedDate($roomCreatedDate)
   {
      $this->room_created_date = $roomCreatedDate;
   }

   public function getMyTotalMessage()
   {
      return $this->my_total_message;
   }

   public function setMyTotalMessage($myTotalMessage)
   {
      $this->my_total_message = $myTotalMessage;
   }

   public function getAdmin()
   {
      if (!isset($this->admin)) {
         $this->admin = new Admin();
      }

      return $this->admin;
   }

   public function setAdmin($_admin)
   {
      $this->admin = $_admin;
   }

   public function getFriendsNik()
   {
      return $this->friends_nik;
   }

   public function setFriendsNik($friendsNik)
   {
      $this->friends_nik = $friendsNik;
   }

   public function getNameForDisplay()
   {
      return $this->name_for_display;
   }

   public function setNameForDisplay($nameForDisplay)
   {
      $this->name_for_display = $nameForDisplay;
   }

   public function getImagesForDisplay()
   {
      if (!isset($this->images_for_display)) {
         $this->images_for_display = new Admin();
      }

      return $this->images_for_display;
   }

   public function setImagesForDisplay($imagesForDisplay)
   {
      $this->images_for_display = $imagesForDisplay;
   }

   public function getRoomId()
   {
      return $this->room_id;
   }

   public function setRoomId($roomId)
   {
      $this->room_id = $roomId;
   }

   public function __set($name, $value)
   {
      if (!isset($this->admin)) {
         $this->admin = new Admin();
      }

      if (!isset($this->admin_connection_id)) {
         $this->admin = new Admin();
      }

      switch ($name) {
         case 'my_total_message':
            $this->setMyTotalMessage($value);
            break;
         case 'admin_connection_id':
            $this->admin->setAdminConnectionId($value);
            break;
      }
   }
}
