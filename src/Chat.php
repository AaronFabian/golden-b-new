<?php

namespace MyApp;

include_once dirname(__DIR__) . "/utils/PDOUtil.php";

include_once dirname(__DIR__) . "/dao/AdminDaoImpl.php";
include_once dirname(__DIR__) . "/dao/CompanyProjectDaoImpl.php";
include_once dirname(__DIR__) . "/dao/ChatRoomDaoImpl.php";
include_once dirname(__DIR__) . "/models/CompanyProject.php";
include_once dirname(__DIR__) . "/models/Admin.php";
include_once dirname(__DIR__) . "/models/ChatRoom.php";

use Admin;
use AdminDaoImpl;
use ChatRoom;
use ChatRoomDaoImpl;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;


class Chat implements MessageComponentInterface
{
   protected $clients;
   private $adminDaoImpl;
   private $chatRoomDaoImpl;

   public function __construct()
   {
      $this->clients = new \SplObjectStorage;
      $this->adminDaoImpl = new AdminDaoImpl();
      $this->chatRoomDaoImpl = new ChatRoomDaoImpl();
      echo "Server start\n";
   }

   public function onOpen(ConnectionInterface $conn)
   {
      // Store the new connection to send messages to later
      $this->clients->attach($conn);
      $querystring = $conn->httpRequest->getUri()->getQuery();
      parse_str($querystring, $queryArr);

      if (isset($queryArr['token'])) {

         $newAdmin = new Admin();
         $newAdmin->setAdminToken($queryArr['token']);
         $newAdmin->setAdminConnectionId($conn->recourceId);
         $newAdmin->setStatus(1);
         $this->adminDaoImpl->updateAdminConnection($newAdmin);
         echo "token generated.";
      }

      echo "New connection! ({$conn->resourceId})\n";
   }

   public function onMessage(ConnectionInterface $from, $msg)
   {
      $querystring = $from->httpRequest->getUri()->getQuery();
      $userData = json_decode($msg, true);
      $numRecv = count($this->clients) - 1;
      parse_str($querystring, $queryArr);

      switch ($userData['type']) {
         case 'dashboard-view':
            $newAdmin = new Admin();
            $newAdmin->setAdminToken(isset($queryArr['token']) ? $queryArr['token'] : 'none');
            $newAdmin->setAdminConnectionId($from->resourceId);
            $newAdmin->setStatus(1);
            $newAdmin->setUsername($userData['username']);
            $this->adminDaoImpl->updateAdminConnection($newAdmin);
            foreach ($this->clients as $client) {
               if ($from == $client)
                  $from->send(json_encode([
                     'response' => 'connected with ' . $numRecv . ' user',
                     'onlineAdmin' => $numRecv + 1,
                     'type' => 'response',
                  ]));
               else
                  $client->send(json_encode([
                     'response' => $userData['username'] . ' is now online :)',
                     'onlineAdmin' => $numRecv + 1,
                     'type' => 'response',
                  ]));
            }
            break;
         case 'chat-view':
            $user = new ChatRoom();
            $user->setAdmin($userData['nik']);
            $friendList = $this->chatRoomDaoImpl->fetchIsAvailableMessage($user);

            $fetchFriendsNik = [];
            foreach ($friendList as $f) {
               $friendObj = $this->adminDaoImpl->fetchLiveContact($f->getFriendsNik());
               $fetchFriendsNik[] = [$f->getFriendsNik(), $friendObj->getName(), $friendObj->getEmail()];
            }

            foreach ($this->clients as $client) {
               if ($from == $client)
                  $from->send(json_encode([
                     'response' => $fetchFriendsNik,
                     'onlineAdmin' => $numRecv + 1,
                     'type' => 'parsing-contact'
                  ]));
               else
                  $client->send(json_encode([
                     'onlineAdmin' => $numRecv + 1,
                     'type' => 'response',
                  ]));
            }
            break;
         case 'chat-detail-request':
            $requestedBy = new ChatRoom();
            $requestedBy->setAdmin($userData['reqBy']);
            $requestedBy->setForGuestNik($userData['reqId']);
            $requestedMessageData = $this->chatRoomDaoImpl->fetchMessageData($requestedBy);

            $arrayMessage = [];
            $messageFor = null;
            foreach ($requestedMessageData as $r) {
               $arrayMessage[] = [
                  $r->getNameForDisplay(),
                  $r->getMessage(),
                  $r->getRoomCreatedDate(),
                  $requestedBy->getForGuestNik()
               ];
               if (!$messageFor)
                  $messageFor[] = $r->getNameForDisplay();
            }

            foreach ($this->clients as $client) {
               $from == $client ?
                  $from->send(json_encode([
                     'message_user' => $arrayMessage,
                     'type' => 'data-message',
                     'relation' => "me"
                  ])) :
                  $client->send(json_encode([
                     'message_user' => $arrayMessage,
                     'type' => 'data-message',
                     'relation' => $messageFor
                  ]));
            }
            echo $userData['username'] . " is requesting data..." . "\n";
            break;
         case 'tables-view':
            foreach ($this->clients as $client) {
               if ($from == $client)
                  $from->send(json_encode([
                     'response' => 'connected with ' . $numRecv . ' user',
                     'onlineAdmin' => $numRecv + 1,
                     'type' => 'response',
                  ]));
               else
                  $client->send(json_encode([
                     'response' => $userData['username'] . ' is now online :)',
                     'onlineAdmin' => $numRecv + 1,
                     'type' => 'response',
                  ]));
            }
            break;
         case 'profile-view':
            foreach ($this->clients as $client) {
               if ($from == $client)
                  $from->send(json_encode([
                     'response' => 'connected with ' . $numRecv . ' user',
                     'onlineAdmin' => $numRecv + 1,
                     'type' => 'response',
                  ]));
               else
                  $client->send(json_encode([
                     'response' => $userData['username'] . ' is now online :)',
                     'onlineAdmin' => $numRecv + 1,
                     'type' => 'response',
                  ]));
            }
            break;
      }

      // log server message...
      echo sprintf(
         'Connection %d sending message "%s" to %d other connection%s' . "\n",
         $from->resourceId,
         $msg,
         $numRecv,
         $numRecv < 1 ? '' : 's'
      );
      echo $userData["username"] . " currently at " . $userData['type'] .  " area" . "\n";
      echo "Number of online client : " . $numRecv + 1 . "\n\n";
   }

   public function onClose(ConnectionInterface $conn)
   {
      // The connection is closed, remove it, as we can no longer send it messages
      $this->clients->detach($conn);
      $numRecv = count($this->clients);

      foreach ($this->clients as $client)
         $client->send(json_encode(['onlineAdmin' => $numRecv, 'type' => 'close']));

      echo "Connection {$conn->resourceId} has disconnected, online users : $numRecv\n\n";
   }

   public function onError(ConnectionInterface $conn, \Exception $e)
   {
      echo "An error has occurred: {$e->getMessage()}\n";
      $conn->close();
   }
}
