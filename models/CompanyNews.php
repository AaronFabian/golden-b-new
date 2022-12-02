<?php

class CompanyNews
{
  private $id;
  private $date;
  private $title;
  private $likes;
  private $status;
  private $notes;
  private $category;

  private $company_project;
  private $admin;

  private $favorites;

  public function getId()
  {
    return $this->id;
  }

  public function setId($id)
  {
    $this->id = $id;
  }

  public function getDate()
  {
    return $this->date;
  }

  public function setDate($date)
  {
    $this->date = $date;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function setTitle($title)
  {
    $this->title = $title;
  }

  public function getLikes()
  {
    return $this->likes;
  }

  public function setLikes($like)
  {
    $this->likes = $like;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getNotes()
  {
    return $this->notes;
  }

  public function setNotes($notes)
  {
    $this->notes = $notes;
  }

  public function getCategory()
  {
    return $this->category;
  }

  public function setCategory($category)
  {
    $this->category = $category;
  }

  public function getCompanyProject()
  {
    if (!isset($this->company_project)) {
      $this->company_project = new CompanyProject();
    }

    return $this->company_project;
  }

  public function setCompanyProject($companyProject)
  {
    $this->company_project = $companyProject;
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

  public function getFavorites()
  {
    if (!isset($this->favorites))
      $this->favorites = new Favorite();

    return $this->favorites;
  }

  public function setFavorites($favorites)
  {
    $this->favorites = $favorites;
  }

  public function __set($name, $value)
  {
    if (!isset($this->company_project)) :
      $this->company_project = new CompanyProject();
    endif;

    if (!isset($this->admin)) :
      $this->admin = new Admin();
    endif;

    if (!isset($this->favorite)) :
      $this->favorites = new Favorite();
    endif;

    switch ($name) {
      case 'admin_nik':
        $this->admin->setNik($value);
        break;
      case 'admin_name':
        $this->admin->setName($value);
        break;
      case 'news_for':
        $this->company_project->setProjectTitle($value);
        break;
      case 'liked':
        $this->favorites->setLiked($value);
    }
  }
}
