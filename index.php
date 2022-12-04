<?php
session_start();

include_once "./utils/DateUtil.php";
include_once "./utils/PDOUtil.php";
include_once "./utils/StringUtil.php";
include_once "./utils/JSONutil.php";

include_once "./controller/LoginController.php";
include_once "./controller/DashboardController.php";
include_once "./controller/TableController.php";
include_once "./controller/ProfileController.php";
include_once "./controller/SuperUpdateController.php";
include_once "./dao/AdminDaoImpl.php";
include_once "./dao/CompanyProjectDaoImpl.php";
include_once "./dao/CompanyNewsDaoImpl.php";
include_once "./dao/ClientDaoImpl.php";
include_once "./dao/FavoriteDaoImpl.php";
include_once "./dao/ChatRoomDaoImpl.php";
include_once "./models/Admin.php";
include_once "./models/CompanyProject.php";
include_once "./models/CompanyNews.php";
include_once "./models/Client.php";
include_once "./models/Favorite.php";
include_once "./models/ChatRoom.php";


$menu = filter_input(INPUT_GET, 'menu');

if (!$menu)
   $menu = "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="apple-touch-icon" sizes="76x76" href="./src/img/apple-icon.png">
   <link rel="icon" type="image/png" href="./src/img/favicon.png">
   <title>
      Golden B <?= $menu ? $menu : "dashboard" ?>
   </title>
   <?php if (isset($_SESSION['web-client'])) : ?>
      <!-- Font Awesome Icons -->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
      <!-- Nucleo Icons -->
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      <!-- CSS Files -->
      <link id="pagestyle" href="./src_client/css/material-dashboard.css" rel="stylesheet" />
   <?php else : ?>
      <!--     Fonts and icons     -->
      <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
      <!-- Material Icons -->
      <link href="./src/css/nucleo-icons.css" rel="stylesheet" />
      <link href="./src/css/nucleo-svg.css" rel="stylesheet" />
      <!-- Font Awesome Icons -->
      <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
      <link href="./src/css/nucleo-svg.css" rel="stylesheet" />
      <!-- CSS Files -->
      <link id="pagestyle" href="./src/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
   <?php endif; ?>

   <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

   <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

</head>

<body class="g-sidenav-show   bg-gray-100">

   <?php
   if (isset($_SESSION['web-user'])) :
      switch ($menu) {
         case 'profile':
            $profileController = new ProfileController();
            $profileController->index();
            break;
         case 'chat':
            $tableController = new TableController();
            $tableController->chat();
            break;
         case 'tables':
            $tableController = new TableController();
            $tableController->index();
            break;
         case 'detail-news':
            $tableController = new TableController();
            $tableController->detailNews();
            break;
         case 'admin-detail':
            $tableController = new TableController();
            $tableController->detailAdmin();
            break;
         case 'billing':
            include_once "./view/billing-view.php";
            break;
         case 'logout':
            $loginController = new LoginController();
            $loginController->logout();
            break;
         case 'webpage':
            include_once "./view/landing-view.php";
            break;
         default:
            $dashboardController = new DashboardController();
            $dashboardController->index();
      }
   elseif (isset($_SESSION['web-client'])) :
      switch ($menu) {
         case 'billing':
            include_once "./view/billing-view.php";
            break;
         case 'webpage':
            include_once "./view/landing-view.php";
            break;
         case 'profile':
            include_once "./view/profile-view.php";
            break;
         case 'logout':
            $dashboardController = new LoginController();
            $dashboardController->logout();
         default:
            $dashboardController = new DashboardController();
            $dashboardController->clientIndex();
            break;
      }
   else :
      switch ($menu) {
         case "register":
            $loginController = new LoginController();
            $loginController->register();
            break;
         case "webpage":
            include_once "./view/landing-view.php";
            break;
         default:
            $loginController = new LoginController();
            $loginController->index();
      }
   endif;
   ?>
</body>

</html>