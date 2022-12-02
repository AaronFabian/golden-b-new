<?php

class ClientList{
  private $client_nik;
  private $total_client;

  private $company_project;

  public function getClientNik()
  {
    return $this->client_nik;
  }

  public function setClientNik($nik)
  {
    $this->client_nik = $nik;
  }

  public function getTotalClient()
  {
    return $this->total_client;
  }

  public function setTotalClient($totalClient)
  {
    $this->total_client = $totalClient;
  }

  public function getCompanyProject()
  {
    if(!isset($this->company_project)){
      $this->company_project = new CompanyProject();
    }

    return $this->company_project;
  }

  public function setCompanyProject($companyProject)
  {
    $this->company_project = $companyProject;
  }

  public function __set($name, $value)
  {
    if(!isset($this->company_project)){
      $this->company_project = new CompanyProject();
    }

    switch ($name){
      case "client_section":
        $this->company_project->setProjectTitle($value);
        break;
    }
  }
}