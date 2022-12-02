<?php

class SuperUpdateController{

  private $adminDetailDao;
  private $favoritesDao;

  public function __construct() {
    $this->adminDetailDao = new AdminDetailDaoImpl();
    $this->favorites = new FavoritesDaoImpl();
  }

  public function update()
  {
    // echo "updates";
  }
}