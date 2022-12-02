<?php

class FavoriteDaoImpl
{
   public function fetchOneFavorite($companyNewsId, $adminNik)
   {
      $link = PDOUtil::createConnection();

      $query = "SELECT * FROM favorite WHERE company_news_id=? AND admin_nik=?";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $companyNewsId);
      $stmt->bindParam(2, $adminNik);
      $stmt->setFetchMode(PDO::FETCH_OBJ);
      $stmt->execute();

      $link = null;
      return $stmt->fetchObject('favorite');
   }

   public function favorite($companyNewsId, $nik)
   {
      $statusQuery = 0;
      $link = PDOUtil::createConnection();

      $query = "INSERT INTO favorite(company_news_id, admin_nik)VALUES(?, ?)";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $companyNewsId);
      $stmt->bindParam(2, $nik);
      $link->beginTransaction();

      if ($stmt->execute()) :
         $link->commit();
         $statusQuery = 1;
      else :
         $link->rollBack();
      endif;

      $link = null;
      return $statusQuery;
   }

   public function deleteFavorite($companyNewsId, $nik)
   {
      $statusQuery = 0;
      $link = PDOUtil::createConnection();

      $query = "DELETE FROM favorite WHERE company_news_id=? AND admin_nik=?";
      $stmt = $link->prepare($query);
      $stmt->bindParam(1, $companyNewsId);
      $stmt->bindParam(2, $nik);
      $link->beginTransaction();

      if ($stmt->execute()) :
         $link->commit();
         $statusQuery = 1;
      else :
         $link->rollBack();
      endif;

      $link = null;
      return $statusQuery;
   }
}
