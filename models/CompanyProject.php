<?php

class CompanyProject{
  private $project_title;
  private $start_project;
  private $is_finished;
  private $project_area;
  private $project_address;
  private $project_notes;
  private $total_admin;


  public function getProjectTitle()
  {
    return $this->project_title;
  }

  public function setProjectTitle($projectTitle)
  {
    $this->project_title = $projectTitle;
  }

  public function getStartProject()
  {
    return $this->start_project;
  }

  public function setStartProject($startProject)
  {
    $this->start_project = $startProject;
  }

  public function getIsFinished()
  {
    return $this->is_finished;
  }

  public function setIsFinished($isFinished)
  {
    $this->is_finished = $isFinished;
  }

  public function getProjectArea()
  {
    return $this->project_area;
  }

  public function setProjectArea($projectArea)
  {
    $this->project_area = $projectArea;
  }

  public function getProjectAddress()
  {
    return $this->project_address;
  }

  public function setProjectAddress($projectAddress)
  {
    $this->project_address = $projectAddress;
  }

  public function setProjectNotes($projectNotes)
  {
    $this->project_notes = $projectNotes;
  }

  public function getProjectNotes()
  {
    return $this->project_notes;
  }

  public function getTotalAdmin()
  {
    return $this->total_admin;
  }

  public function setTotalAdmin($totalAdmin)
  {
    $this->total_admin = $totalAdmin;
  }
}