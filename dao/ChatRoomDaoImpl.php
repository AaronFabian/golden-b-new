<?php

class ChatRoomDaoImpl
{
   public function fetchIsAvailableMessage(ChatRoom $chatRoom)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT COUNT(from_admin_nik) AS my_total_message, IF(for_guest_nik= ?, from_admin_nik, for_guest_nik) AS friends_nik FROM new_golden_db.chat_room WHERE from_admin_nik= ? OR for_guest_nik= ? GROUP BY room_id";
      $stmt = $link->prepare($query);

      $stmt->bindValue(1, $chatRoom->getAdmin());
      $stmt->bindValue(2, $chatRoom->getAdmin());
      $stmt->bindValue(3, $chatRoom->getAdmin());
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "ChatRoom");
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchMessageData(ChatRoom $chatRoom)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT from_admin_nik, message, room_created_date,room_id, admin.name AS name_for_display, admin.admin_connection_id FROM chat_room JOIN admin ON (admin.nik=from_admin_nik) WHERE from_admin_nik= ? AND for_guest_nik=? OR from_admin_nik= ? AND for_guest_nik= ? ORDER BY room_created_date ASC";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $chatRoom->getAdmin());
      $stmt->bindValue(2, $chatRoom->getForGuestNik());
      $stmt->bindValue(3, $chatRoom->getForGuestNik());
      $stmt->bindValue(4, $chatRoom->getAdmin());
      $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'ChatRoom');
      $stmt->execute();

      $link = null;
      return $stmt->fetchAll();
   }

   public function fetchLatestMessageInfo(ChatRoom $chatRoom)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT room_created_date, admin.name AS name_for_display, admin.admin_connection_id FROM chat_room JOIN admin ON (admin.nik=from_admin_nik) WHERE from_admin_nik= ? AND for_guest_nik= ? OR from_admin_nik=  ? AND for_guest_nik= ? ORDER BY room_created_date DESC LIMIT 1";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $chatRoom->getAdmin());
      $stmt->bindValue(2, $chatRoom->getForGuestNik());
      $stmt->bindValue(3, $chatRoom->getForGuestNik());
      $stmt->bindValue(4, $chatRoom->getAdmin());
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('ChatRoom');
   }

   public function insertNewMessage(ChatRoom $chatRoom)
   {
      $result = 0;
      $link = PDOUtil::createConnection();

      $query = "INSERT INTO chat_room (from_admin_nik, for_guest_nik, message, is_readed, room_id) VALUES (?,?,?, 0, IF(? = '', RAND(),?))
      ";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $chatRoom->getAdmin());
      $stmt->bindValue(2, $chatRoom->getForGuestNik());
      $stmt->bindValue(3, $chatRoom->getMessage());
      $stmt->bindValue(4, $chatRoom->getRoomId());
      $stmt->bindValue(5, $chatRoom->getRoomId());

      $link->beginTransaction();
      if ($stmt->execute()) {
         $link->commit();
         $result = 1;
      } else {
         $link->rollBack();
      }

      return $result;
   }

   public function fetchIsRoomAvailble(ChatRoom $chatRoom)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT room_id FROM new_golden_db.chat_room WHERE from_admin_nik= ? AND for_guest_nik= ? OR from_admin_nik= ? AND for_guest_nik= ? GROUP BY room_id";
      $stmt = $link->prepare($query);
      $stmt->bindValue(1, $chatRoom->getAdmin());
      $stmt->bindValue(2, $chatRoom->getForGuestNik());
      $stmt->bindValue(3, $chatRoom->getForGuestNik());
      $stmt->bindValue(4, $chatRoom->getAdmin());
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('ChatRoom');
   }

   // public function fetchMessageForAvailableMessage(ChatRoom $chatRoom)
   // {
   //    $link = PDOUtil::createConnection();
   //    $query = "SELECT from_admin_nik, message, room_created_date,room_id, admin.name AS name_for_display, admin.admin_connection_id FROM chat_room JOIN admin ON (admin.nik=from_admin_nik) WHERE from_admin_nik= ? AND for_guest_nik=? OR from_admin_nik= ? AND for_guest_nik= ? ORDER BY room_created_date ASC";
   //    $stmt = $link->prepare($query);
   //    $stmt->bindValue(1, $chatRoom->getAdmin());
   //    $stmt->bindValue(2, $chatRoom->getForGuestNik());
   //    $stmt->bindValue(3, $chatRoom->getForGuestNik());
   //    $stmt->bindValue(4, $chatRoom->getAdmin());
   //    $stmt->setFetchMode(PDO::FETCH_OBJ);
   //    $stmt->execute();

   //    $link = null;
   //    return $stmt->fetchObject('ChatRoom');
   // }
}
