<?php

class DashboardController
{

  private $companyProjectDao;
  private $clientDao;

  public function __construct()
  {
    $this->companyProjectDao = new CompanyProjectDaoImpl();
    $this->clientDao = new ClientDaoImpl();
  }

  public function index()
  {
    $companyProjectArr = $this->companyProjectDao->fetchCompanyProject();
    $clientNumber = $this->clientDao->fetchTotalClient();

    include_once "./view/dashboard-view.php";
  }

  public function clientIndex()
  {
    include_once "./view/client_dashboard-view.php";
  }

  public function liveIndex()
  {
    # code...
  }
}
