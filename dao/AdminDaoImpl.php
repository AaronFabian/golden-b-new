<?php

class AdminDaoImpl
{

  public function fetchUser($userName, $password)
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT * FROM admin WHERE username= ? AND password= ? ";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $userName);
    $stmt->bindParam(2, $password);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('Admin');
  }

  public function fetchOneAdmin($adminEmail)
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT email, name, address, city, poscode, bio, subsdistrict, urban, admin_section ,images FROM admin WHERE email= ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $adminEmail);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('admin');
  }

  public function fetchAdminNikAndName()
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT name, nik, images FROM admin";
    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Admin');
    $stmt->execute();

    $link = null;
    return $stmt->fetchAll();
  }

  public function fetchLiveContact($nik)
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT name, username, email, images ,admin_connection_id FROM admin WHERE nik= ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $nik);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('Admin');
  }

  public function fetchToVerifyUser($username, $nik)
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT admin.* FROM admin  WHERE username= ? AND nik= ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $nik);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('Admin');
  }

  public function fetchAllAdmin()
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT * FROM new_golden_db.admin";
    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, "Admin");
    $stmt->execute();

    $link = null;
    return $stmt->fetchAll();
  }

  public function addAdmin(Admin $admin, CompanyProject $companyProject)
  {
    $result = 0;
    $link = PDOUtil::createConnection();
    $query = "INSERT INTO new_golden_db.admin (new_golden_db.admin.email, new_golden_db.admin.username, new_golden_db.admin.password, new_golden_db.admin.nik, new_golden_db.admin.admin_section, new_golden_db.admin.salary, new_golden_db.admin.name) 
    VALUES(?,?,?,?,?,?,?)";

    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $admin->getEmail());
    $stmt->bindValue(2, $admin->getUsername());
    $stmt->bindValue(3, $admin->getPassword());
    $stmt->bindValue(4, $admin->getNik());
    $stmt->bindValue(5, $companyProject->getProjectTitle());
    $stmt->bindValue(6, $admin->getSalary());
    $stmt->bindValue(7, $admin->getName());

    $link->beginTransaction();

    if ($stmt->execute()) {
      $link->commit();
      $result = 1;
    } else {
      $link->rollBack();
    }

    $link = null;
    return $result;
  }

  public function updateProfile(Admin $admin)
  {
    $result = 0;
    $link = PDOUtil::createConnection();

    $query = "UPDATE new_golden_db.admin SET name = ?, address = ?, city = ?, poscode = ?, bio = ?, subsdistrict = ?, urban = ?, images = ? WHERE username = ? AND nik = ?;
    ";

    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $admin->getName());
    $stmt->bindValue(2, $admin->getAddress());
    $stmt->bindValue(3, $admin->getCity());
    $stmt->bindValue(4, $admin->getPoscode());
    $stmt->bindValue(5, $admin->getBio());
    $stmt->bindValue(6, $admin->getSubsdistrict());
    $stmt->bindValue(7, $admin->getUrban());
    $stmt->bindValue(8, $admin->getImages());
    $stmt->bindValue(9, $admin->getUsername());
    $stmt->bindValue(10, $admin->getNik());

    $link->beginTransaction();
    if ($stmt->execute()) {
      $link->commit();
      $result = 1;
    } else {
      $link->rollBack();
    }

    return $result;
  }

  public function updateStatus($username, $nik, $status)
  {
    $result = 0;
    $link = PDOUtil::createConnection();

    $query = "UPDATE new_golden_db.admin SET status= ? WHERE username= ? AND nik= ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $status);
    $stmt->bindParam(2, $username);
    $stmt->bindParam(3, $nik);

    $link->beginTransaction();
    if ($stmt->execute()) {
      $link->commit();
      $result = 1;
    } else {
      $link->rollBack();
    }

    return $result;
  }

  public function updateLiveUsersByConnectionId($connID)
  {
    $result = 0;
    $link = PDOUtil::createConnection();

    $query = "UPDATE admin SET status= 0, connection_id= 0 FROM admin WHERE connection_id= ? AND nik= ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $connID);

    $link->beginTransaction();
    if ($stmt->execute()) {
      $link->commit();
      $result = 1;
    } else {
      $link->rollBack();
    }

    return $result;
  }

  public function updateAdminConnection(Admin $admin)
  {
    $result = 0;
    $link = PDOUtil::createConnection();
    $query = "UPDATE new_golden_db.admin SET admin_token = ?, admin_connection_id = ?, status = ? WHERE username = ?";

    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $admin->getAdminToken());
    $stmt->bindValue(2, $admin->getAdminConnectionId());
    $stmt->bindValue(3, $admin->getStatus());
    $stmt->bindValue(4, $admin->getUsername());

    $link->beginTransaction();
    if ($stmt->execute()) {
      $link->commit();
      $result = 0;
    } else {
      $link->rollBack();
    }

    return $result;
  }
}
