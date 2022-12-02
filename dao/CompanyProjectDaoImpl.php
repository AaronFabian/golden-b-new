<?php

class CompanyProjectDaoImpl{

  public function fetchCompanyProject()
  {
    $link = PDOUtil::createConnection();

    // $query = "SELECT * FROM new_golden_db.company_project LIMIT 5";
    $query = "SELECT new_golden_db.company_project.*, COUNT(new_golden_db.admin.nik) AS total_admin FROM new_golden_db.company_project JOIN admin ON (admin.admin_section = company_project.project_title) GROUP BY new_golden_db.company_project.project_title";
    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'CompanyProject');
    $stmt->execute();

    $link = null;
    return $stmt->fetchAll();
  }

  public function fetchCompanyProjectViaJs($title)
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT * FROM new_golden_db.company_project WHERE project_title = ? ";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $title);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('CompanyProject');
  }
}