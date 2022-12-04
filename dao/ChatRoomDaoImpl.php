<?php

class ChatRoomDaoImpl
{
   public function fetchIsAvailableMessage(ChatRoom $chatRoom)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT COUNT(from_admin_nik) AS my_total_message, IF(for_guest_nik= ?, from_admin_nik, for_guest_nik) AS friends_nik FROM new_golden_db.chat_room WHERE from_admin_nik= ? OR for_guest_nik= ? GROUP BY room_id;
      ";
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

      $query = "SELECT from_admin_nik, message, room_created_date, admin.name AS name_for_display, admin.images FROM chat_room JOIN admin ON (admin.nik=from_admin_nik) WHERE from_admin_nik= ? AND for_guest_nik=? OR from_admin_nik= ? AND for_guest_nik= ?";
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
}
