<?php

class ProfileController
{

  private $adminDao;

  public function __construct()
  {
    $this->adminDao = new AdminDaoImpl();
  }

  public function index()
  {
    $error_arr = [];
    $username = $_SESSION["username"];
    $nik = $_SESSION["nik"];
    $userProfile = $this->adminDao->fetchToVerifyUser($username, $nik);

    $btnEdit = filter_input(INPUT_POST, 'btnEdit');
    if (isset($btnEdit) and $userProfile) {
      $name = filter_input(INPUT_POST, "form-name");
      $email = filter_input(INPUT_POST, "form-email", FILTER_SANITIZE_EMAIL);
      $zipCode = filter_input(INPUT_POST, "form-kodepos");
      $subsdistrict = filter_input(INPUT_POST, "form-kecamatan");
      $urban = filter_input(INPUT_POST, "form-kelurahan");

      $city = filter_input(INPUT_POST, "form-kota");
      $address = filter_input(INPUT_POST, "form-address");
      $bio = filter_input(INPUT_POST, "form-bio");
      $image = "";

      if ($_FILES["fileImg"]["name"]) {
        $directory = "./src/img/uploads";
        $fileExtension = pathinfo($_FILES['fileImg']['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid() . "." . $fileExtension;
        $targetFile = "$directory/$newFileName";
        if ($_FILES['fileImg']['size'] > 1024 * 2048) {
          echo "<div class='bg-danger py-2'>Upload error. File size exceed 2MB</div>";
        } else {
          move_uploaded_file($_FILES['fileImg']['tmp_name'], $targetFile);
          $image = $newFileName; // success !
        }
      }

      if (
        empty($name) or empty($email) or empty($zipCode) or empty($subsdistrict) or
        empty($urban) or empty($city) or !is_numeric($zipCode)
      )
        $error_arr["err"] = true;

      if (empty($error_arr)) :
        $newAdmin = new Admin();
        $newAdmin->setNik($_SESSION['nik']);
        $newAdmin->setUsername($username);
        $newAdmin->setName(trim($name));
        $newAdmin->setEmail($email);
        $newAdmin->setPoscode($zipCode);
        $newAdmin->setCity($city);
        $newAdmin->setSubsdistrict($subsdistrict);
        $newAdmin->setUrban($urban);
        $newAdmin->setAddress($address);
        $newAdmin->setBio($bio);
        $newAdmin->setImages($image);

        $updateCondition = $this->adminDao->updateProfile($newAdmin);
        // JSONUtil::createNewAdminJSON($newAdmin, $newAdminList);
        if ($updateCondition)
          header("Refresh:0 index.php?menu=profile");
        else
          echo "FATAL ERROR segera hubungi admin !!";
      else :
        echo "
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <strong>Peringatan !</strong> tolong isi semua kolom !
        <button type='button' class='btn-close bg-secondary' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
        ";
        include_once "./view/profile-view.php";
      endif;
    } else if ($userProfile) {
      include_once "./view/profile-view.php";
    } else
      header("Location: index.php?menu=logout"); // fatal: unknown user
  }

  public function editUser()
  {
    echo "test";
    include_once "./view/login-view.php";
  }
}
