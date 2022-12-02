<?php

class AdminListDaoImpl
{

  public function addAdminList(AdminList $adminList, CompanyProject $companyProject)
  {
    $result = 0;
    $link = PDOUtil::createConnection();

    $query = "INSERT INTO new_golden_db.admin_list (admin_list.admin_nik, admin_list.admin_section)
    VALUES(?,?)";
    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $adminList->getAdminNik());
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
