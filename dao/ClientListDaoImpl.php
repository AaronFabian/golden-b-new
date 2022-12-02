<?php

class ClientListDaoImpl
{

  public function fetchClientListTotal()
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT COUNT(new_golden_db.client_list.client_nik) AS total_client FROM new_golden_db.client_list";

    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('ClientList');
  }

  public function addClientList(ClientList $clientList, CompanyProject $companyProject)
  {
    $result = 0;
    $link = PDOUtil::createConnection();

    $query = "INSERT INTO client_list (client_nik, client_section) VALUE(?,?)";

    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $clientList->getClientNik());
    $stmt->bindValue(2, $companyProject->getProjectTitle());

    $link->beginTransaction();

    if ($stmt->execute()) {
      $link->commit();
      $result = 1;
    } else {
      $link->rollBack();
    }

    return $result;
  }
}
