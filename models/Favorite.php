<?php

class Favorite
{

  private $companyNews;
  private $admin;

  public function getCompanyNews()
  {
    if (!isset($this->companyNews)) {
      $this->companyNews = new CompanyNews();
    }
    return $this->companyNews;
  }

  public function setCompanyNews($companyNews)
  {
    $this->companyNews = $companyNews;
  }

  public function getAdmin()
  {
    if (!isset($this->admin)) {
      $this->admin = new Admin();
    }
    return $this->admin;
  }

  public function setAdmin($admin)
  {
    $this->admin = $admin;
  }

  public function __set($name, $value)
  {
    if (!isset($this->companyNews)) {
      $this->companyNews = new CompanyNews();
    }

    if (!isset($this->admin)) {
      $this->admin = new Admin();
    }

    switch ($name) {
      case "company_news_id":
        $this->setCompanyNews($value);
        break;
      case "admin_nik":
        $this->setAdmin($value);
        break;
    }
  }
}
