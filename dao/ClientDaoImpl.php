<?php

class ClientDaoImpl
{

  public function fetchTotalClient()
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT COUNT(new_golden_db.client.nik) AS total_client FROM new_golden_db.client";

    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('Client');
  }

  public function fetchUser($username, $password)
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT * FROM client WHERE username = ? AND password = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $username);
    $stmt->bindParam(2, $password);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('client');
  }

  public function fetchAllClient()
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT email, name, client_section FROM client";
    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Client');
    $stmt->execute();

    $link = null;
    return $stmt->fetchAll();
  }

  public function addClient(Client $client, CompanyProject $companyProject)
  {
    $result = 0;
    $link = PDOUtil::createConnection();

    $query = "INSERT INTO client(nik, email, username, password, name, client_section) VALUES (?,?,?,?,?,?)";

    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $client->getNik());
    $stmt->bindValue(2, $client->getEmail());
    $stmt->bindValue(3, $client->getUsername());
    $stmt->bindValue(4, $client->getPassword());
    $stmt->bindValue(5, $client->getName());
    $stmt->bindValue(6, $companyProject->getProjectTitle());

    $link->beginTransaction();

    if ($stmt->execute()) {
      $result = 1;
      $link->commit();
    } else {
      $link->rollBack();
    }

    return $result;
  }
}
