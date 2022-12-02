<?php

class JSONUtil{
  static public function createNewAdminJSON(AdminDetail $newAdminDetail,AdminList $newAdminList)
  {
    $data = [
            "name" => $newAdminDetail->getName(), 
            "username" => $newAdminDetail->getUsername(), 
            "nik" => $newAdminList->getAdminNik(), 
            "city" => $newAdminDetail->getCity(), 
            "bio" => $newAdminDetail->getBio()
            ];


    if ($f = fopen("./src/json/admin/" . $newAdminDetail->getUsername() . ".json", 'w+'))
      fwrite($f, json_encode($data));
      fclose($f);
  }

  static public function openAdminJson()
  {
    
  }
}