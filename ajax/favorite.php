<?php

include_once "../utils/PDOUtil.php";
include_once "../dao/FavoriteDaoImpl.php";

$favorite = filter_input(
   INPUT_POST,
   "favorite",
   FILTER_SANITIZE_SPECIAL_CHARS
);
$nik = filter_input(
   INPUT_POST,
   "nik",
   FILTER_SANITIZE_SPECIAL_CHARS
);
$companyNewsId = filter_input(
   INPUT_POST,
   "cid",
   FILTER_SANITIZE_SPECIAL_CHARS
);

try {
   $favoriteDao = new FavoriteDaoImpl();
   $favorite === "true" ?
      $favoriteDao->favorite($companyNewsId, $nik) :
      $favoriteDao->deleteFavorite($companyNewsId, $nik);
} catch (PDOException $e) {
   var_dump($e);
}
