<?php

class AdminList
{

  private $admin_nik;

  private $company_project;

  public function getAdminNik()
  {
    return $this->admin_nik;
  }

  public function setAdminNik($adminNik)
  {
    $this->admin_nik = $adminNik;
  }

  public function getCompanyProject()
  {
    if (!isset($this->company_project)) {
      $this->company_project = new CompanyProject();
    }

    $this->company_project = new CompanyProject();
  }

  public function setCompanyProject($companyProject)
  {
    $this->company_project = $companyProject;
  }
}
