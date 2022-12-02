<?php

class Client
{

  private $nik;
  private $email;
  private $username;
  private $password;
  private $name;
  private $address;
  private $city;
  private $poscode;
  private $bio;
  private $subsdistrict;
  private $urban;
  private $images;
  private $total_client;

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

  public function getCompanyProject()
  {
    if (!isset($this->company_project))
      $this->company_project = new CompanyProject();

    return $this->company_project;
  }

  public function setCompanyProject($companyProject)
  {
    $this->company_project = $companyProject;
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

  public function getSubsdistrict()
  {
    return $this->subsdistrict;
  }

  public function setSubsdistrict($subsdistrict)
  {
    $this->subsdistrict = $subsdistrict;
  }

  public function getUrban()
  {
    return $this->urban;
  }

  public function setUrban($urban)
  {
    $this->urban = $urban;
  }

  public function getImages()
  {
    return $this->images;
  }

  public function setImages($images)
  {
    $this->images = $images;
  }

  public function getTotalClient()
  {
    return $this->total_client;
  }

  public function setTotalClient($totalClient)
  {
    $this->total_client = $totalClient;
  }

  public function __set($name, $value)
  {
    if (!isset($this->company_project))
      $this->company_project = new CompanyProject();

    switch ($name) {
      case "client_section":
        $this->company_project->setProjectTitle($value);
    }
  }
}
