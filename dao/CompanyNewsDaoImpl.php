<?php

class CompanyNewsDaoImpl{

  public function fetchCompanyNewsViaDetail($id)
  {
    $link = PDOUtil::createConnection();
    
    $query = "SELECT *, admin.name AS admin_name FROM new_golden_db.company_news JOIN admin ON (admin.nik = company_news.admin_nik) WHERE id = ?";
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();

    $link = null;
    return $stmt->fetchObject('CompanyNews');
  }

  // SELECT company_news.* ,COUNT(favorites.company_news_id) AS liked, admin.name AS admin_name FROM new_golden_db.company_news INNER JOIN favorites ON (favorites.company_news_id = company_news.id) INNER JOIN admin ON (admin.nik = company_news.admin_nik) GROUP BY favorites.company_news_id ORDER BY company_news.date DESC

  public function fetchCompanyNews()
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT company_news.* ,admin.name AS admin_name FROM new_golden_db.company_news INNER JOIN admin ON (admin.nik = company_news.admin_nik) ORDER BY company_news.date DESC";
    $stmt = $link->prepare($query);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'CompanyNews');
    $stmt->execute();

    $link = null;
    return $stmt->fetchAll();
  }

  public function addNews(Admin $admin, CompanyProject $companyProject, CompanyNews $companyNews)
  {
    $statusQuery = 0;
    $link = PDOUtil::createConnection();

    $query = "INSERT INTO new_golden_db.company_news (date, title, likes, status, notes, category, news_for, admin_nik) VALUES (?,?,?,?,?,?,?,?);";
    $stmt = $link->prepare($query);
    $stmt->bindValue(1, $companyNews->getDate());
    $stmt->bindValue(2, $companyNews->getTitle());
    $stmt->bindValue(3, $companyNews->getLikes());
    $stmt->bindValue(4, $companyNews->getStatus());
    $stmt->bindValue(5, $companyNews->getNotes());
    $stmt->bindValue(6, $companyNews->getCategory());
    $stmt->bindValue(7, $companyProject->getProjectTitle());
    $stmt->bindValue(8, $admin->getNik());

    $link->beginTransaction();

    if($stmt->execute()):
      $link->commit();
      $statusQuery = 1;
    else:
      $link->rollBack();
    endif;

    $link = null;
    return $statusQuery;
  }

  public function fetchFavorite($id)
  {
    $link = PDOUtil::createConnection();

    $query = "SELECT COUNT(*) AS liked FROM company_news INNER JOIN favorite ON (favorite.company_news_id = company_news.id) WHERE company_news.id = ?";
    
    $stmt = $link->prepare($query);
    $stmt->bindParam(1, $id);
    $stmt->execute();

    $link = null;
    return $stmt->fetch();
  }

  public function update()
  {
    $link = PDOUtil::createConnection();

    $query = "";
    $link = null;
  }
}
