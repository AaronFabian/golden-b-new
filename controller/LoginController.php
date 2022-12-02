<?php

class LoginController
{

  private $adminDao;
  private $clientDao;

  public function __construct()
  {
    $this->adminDao = new AdminDaoImpl();
    $this->clientDao = new ClientDaoImpl();
  }

  public function index()
  {
    $btnSignin = filter_input(INPUT_POST, 'btnSignin');
    if (isset($btnSignin)) {
      $usernameInp = filter_input(INPUT_POST, 'username');
      $passwordInp = filter_input(INPUT_POST, 'password');

      $admin = $this->adminDao->fetchUser($usernameInp, md5($passwordInp));  // admin side
      $client = $this->clientDao->fetchUser($usernameInp, md5($passwordInp)); // Client side

      if ($admin) {
        $_SESSION["web-user"] = true;
        $_SESSION['name'] = $admin->getName();
        $_SESSION['username'] = $admin->getUsername();
        $_SESSION['nik'] = $admin->getNik();

        $this->adminDao->updateStatus($_SESSION["username"], $_SESSION["nik"], 1);

        header("Location: index.php");
      } else if ($client) {
        $_SESSION['web-client'] = true;
        $_SESSION['name'] = $client->getName();
        $_SESSION['username'] = $client->getUsername();
        $_SESSION['nik'] = $client->getNik();

        header("Location: index.php");
      } else {
        echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>Peringatan !</strong> <br>username atau password salah !
                <button type='button' class='btn-close btn-light' data-bs-dismiss='alert' aria-label='Close'></button>
              </div>";
        include_once "./view/login-view.php";
      }
    } else {
      include_once "./view/login-view.php";
    }
  }

  public function register()
  {
    $error_arr = [];
    $btnRegister = filter_input(INPUT_POST, "btnRegister");
    if (isset($btnRegister)) {
      $firstName = filter_input(INPUT_POST, "firstName");
      $lastName = filter_input(INPUT_POST, "lastName");
      $username = filter_input(INPUT_POST, "username");
      $email = filter_input(INPUT_POST, "email");
      $password1 = filter_input(INPUT_POST, "password1");
      $password2 = filter_input(INPUT_POST, "password2");
      $nik = filter_input(INPUT_POST, "nik");
      $adminSection = filter_input(INPUT_POST, "adminSection");
      $agreeBtn = filter_input(INPUT_POST, "agreeBtn");

      if (empty($firstName) or preg_match('/[^A-Za-z]/', $firstName))
        $error_arr["firstName"] = true;
      if (empty($lastName) or preg_match('/[^A-Za-z]/', $lastName))
        $error_arr["lastName"] = true;
      if (empty($username))
        $error_arr["username"] = true;
      if (empty($email))
        $error_arr["email"] = true;
      if (empty($password1) or empty($password2) or $password1 !== $password2)
        $error_arr["password"] = true;
      if (empty($nik) or !is_numeric(intval($nik)))
        $error_arr["nik"] = true;
      if (empty($adminSection))
        $error_arr["adminSection"] = true;
      if (!isset($agreeBtn))
        $error_arr["agreeBtn"] = true;

      if (empty($error_arr)) :

        try {
          $userFilter = explode("777", $nik);
          if (isset($userFilter[1]) and $userFilter[1] === "021") {
            // admin side
            $newAdmin = new Admin();
            $newAdmin->setNik($userFilter[0]); // !!!
            $newAdmin->setName(implode(" ", [$firstName, $lastName]));
            $newAdmin->setEmail($email);
            $newAdmin->setPassword(md5($password2));
            $newAdmin->setSalary(0);
            $newAdmin->setUsername($username);


            $newCompanyProject = new CompanyProject();
            $newCompanyProject->setProjectTitle(strtoupper($adminSection));

            $resultAdminDao = $this->adminDao->addAdmin($newAdmin, $newCompanyProject);
            // JSONUtil::createNewAdminJSON($newAdmin, $newAdminList);
          } else {
            // client side
            $newClient = new Client();
            $newClient->setNik($nik); // !!!
            $newClient->setName(implode(" ", [$firstName, $lastName]));
            $newClient->setEmail($email);
            $newClient->setUsername($username);
            $newClient->setPassword(md5($password2));

            $newCompanyProject = new CompanyProject();
            $newCompanyProject->setProjectTitle($adminSection);

            $resultClientlDao = $this->clientDao->addClient($newClient, $newCompanyProject);
          }
          echo "<div class='alert alert-primary text-light' role='alert'>
                  Registrasi selesai, silahkan login ke <a href=index.php class='text-light'>halaman login</a>
                </div>";
        } catch (PDOException $e) {
          if (str_contains($e->getMessage(), "email_UNIQUE")) {
            echo "email sudah terdaftar !";
            $error_arr['email'] = true;
          } else if (str_contains($e->getMessage(), "username_UNIQUE")) {
            echo "username sudah terdaftar !";
            $error_arr['username'] = true;
          } else if (str_contains($e->getMessage(), "PRIMARY")) {
            $error_arr['nik'] = true;
            echo "FATAL ERROR nik sudah terdaftar !!";
          }
        }
      else :
        echo "register invalid !";
      endif;
    }

    include_once "./view/sign-in-view.php";
  }

  public function logout()
  {
    if (isset($_SESSION["nik"]) and isset($_SESSION["username"]) and !isset($_SESSION['web-client']))
      $this->adminDao->updateStatus($_SESSION["username"], $_SESSION["nik"], 0);

    session_unset();
    session_destroy();

    header("Location: index.php");
  }
}
