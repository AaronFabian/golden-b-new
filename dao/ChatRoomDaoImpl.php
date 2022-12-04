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
}
