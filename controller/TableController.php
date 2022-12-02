<?php

class TableController
{

   private $companyNewsDao;
   private $adminDao;
   private $clientDao;
   private $favoriteDao;

   public function __construct()
   {
      $this->companyNewsDao = new CompanyNewsDaoImpl();
      $this->adminDao = new AdminDaoImpl();
      $this->clientDao = new ClientDaoImpl();
      $this->favoriteDao = new FavoriteDaoImpl();
   }

   public function index()
   {
      $btnAddNews = filter_input(INPUT_POST, "btnAddNews");
      if (isset($btnAddNews)) {
         $today = new DateTimeImmutable();
         $title = filter_input(INPUT_POST, "title");
         $category = filter_input(INPUT_POST, "category-berita");
         $newsFor = filter_input(INPUT_POST, "bagian-berita");
         $notes = filter_input(INPUT_POST, "note-berita");
         $addedBy = filter_input(INPUT_POST, "added-by");

         $newCompanyNews = new CompanyNews();
         $newCompanyNews->setDate($today->format("Y-m-d H:i:s"));
         $newCompanyNews->setTitle($title);
         $newCompanyNews->setLikes(0);
         $newCompanyNews->setStatus(1);
         $newCompanyNews->setNotes($notes);
         $newCompanyNews->setCategory($category);

         $admin = new Admin();
         $admin->setNik($_SESSION['nik']);

         $companyProject = new CompanyProject();
         $companyProject->setProjectTitle($newsFor);

         $statusInsert = $this->companyNewsDao->addNews($admin, $companyProject, $newCompanyNews);

         if ($statusInsert) {
            header("Refresh:0; index.php?menu=tables");
         } else {
            echo "FATAL ERROR FAILED TO INSERT !";
         };
      }

      $companyNewsArr = $this->companyNewsDao->fetchCompanyNews();

      $arrayLikes = [];
      foreach ($companyNewsArr as $c)
         $arrayLikes[] = $this->companyNewsDao->fetchFavorite($c->getId())[0];

      $adminArr = $this->adminDao->fetchAllAdmin();
      $clientArr = $this->clientDao->fetchAllClient();
      include_once "./view/tables-view.php";
   }

   public function detailNews()
   {
      $newsId = filter_input(INPUT_GET, 'news', FILTER_SANITIZE_SPECIAL_CHARS);
      if (isset($newsId)) {
         $companyNewsDetail = $this->companyNewsDao->fetchCompanyNewsViaDetail($newsId);
         $favoriteCondition = $this->favoriteDao->fetchOneFavorite($newsId, $_SESSION['nik']);

         if ($companyNewsDetail)
            include_once "./view/detail-news-view.php";
         else
            include_once "./view/detail-news-view.php";
      } else {
         header("Location: index.php?menu=tables");
         exit;
      }
   }

   public function detailAdmin()
   {
      $availableAdmin = null;
      $adminEmail = filter_input(INPUT_GET, "email", FILTER_SANITIZE_SPECIAL_CHARS);

      if (isset($adminEmail))
         $availableAdmin = $this->adminDao->fetchOneAdmin($adminEmail);

      include_once "./view/admin-detail-view.php";
   }
}
