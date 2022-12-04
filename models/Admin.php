<?php

class Admin
{

  private $nik;
  private $email;
  private $username;
  private $password;
  private $salary;
  private $name;
  private $address;
  private $city;
  private $poscode;
  private $bio;
  private $status;
  private $subsdistrict;
  private $urban;
  private $images;
  private $admin_token;
  private $admin_connnection_id;

  private $company_project;

  public function getNik()
  {
    return $this->nik;
  }

  public function setNik($nik)
  {
    $this->nik = $nik;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }

  public function getUsername()
  {
    return $this->username;
  }

  public function setUsername($username)
  {
    $this->username = $username;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function setPassword($password)
  {
    $this->password = $password;
  }

  public function getSalary()
  {
    return $this->salary;
  }

  public function setSalary($salary)
  {
    $this->salary = $salary;
  }

  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getAddress()
  {
    return $this->address;
  }

  public function setAddress($address)
  {
    $this->address = $address;
  }

  public function getCity()
  {
    return $this->city;
  }

  public function setCity($city)
  {
    $this->city = $city;
  }

  public function getPoscode()
  {
    return $this->poscode;
  }

  public function setPoscode($poscode)
  {
    $this->poscode = $poscode;
  }

  public function getBio()
  {
    return $this->bio;
  }

  public function setBio($bio)
  {
    $this->bio = $bio;
  }

  public function getStatus()
  {
    return $this->status;
  }

  public function setStatus($status)
  {
    $this->status = $status;
  }

  public function getSubsdistrict()
  {
    return $this->subsdistrict;
  }

  public function setSubsdistrict($subdistrict)
  {
    $this->subsdistrict = $subdistrict;
  }

  public function getUrban()
  {
    return $this->urban;
  }

  public function setUrban($urban)
  {
    $this->urban = $urban;
  }

  public function getAdminToken()
  {
    return $this->admin_token;
  }

  public function setAdminToken($adminToken)
  {
    $this->admin_token = $adminToken;
  }

  public function getAdminConnectionId()
  {
    return $this->admin_connnection_id;
  }

  public function setAdminConnectionId($adminConnnectionId)
  {
    $this->admin_connnection_id = $adminConnnectionId;
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

  public function getImages()
  {
    return $this->images;
  }

  public function setImages($images)
  {
    $this->images = $images;
  }

  public function __set($name, $value)
  {
    if (!isset($this->company_project)) {
      $this->company_project = new CompanyProject();
    }

    switch ($name) {
      case 'admin_section':
        $this->company_project->setProjectTitle($value);
        break;
    }
  }
}
