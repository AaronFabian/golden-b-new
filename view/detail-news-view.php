<div class="container mt-5">
   <div class="row g-0 bg-light position-relative">
      <div class="col-md-6 mb-md-0 p-md-4">

         <?php if ($companyNewsDetail) : ?>
            <div class="row">
               <div class="col">
                  <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label">Judul Berita :</label>
                     <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $companyNewsDetail->getTitle(); ?>" readonly>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label">Ditambahkan Oleh :</label>
                     <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= StringUtil::convertTitle($companyNewsDetail->getAdmin()->getName()); ?>" readonly>
                  </div>
               </div>
               <div class="col">
                  <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label">Tanggal Dibuat :</label>
                     <?php
                     $tanggal = date_create($companyNewsDetail->getdate());
                     $format = date_format($tanggal, "d M Y");
                     ?>
                     <input type="text" class="form-control" id="exampleFormControlInput1" value=" <?= $format; ?> / (<?= DateUtil::getDifferentDate($companyNewsDetail->getDate()); ?>)" readonly>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label">Category :</label>
                     <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $companyNewsDetail->getCategory(); ?>" readonly>
                  </div>
               </div>
               <div class="col">
                  <div class="mb-3">
                     <label for="exampleFormControlInput1" class="form-label">Bagian :</label>
                     <input type="text" class="form-control" id="exampleFormControlInput1" value="<?= $companyNewsDetail->getCompanyProject()->getProjectTitle(); ?>" readonly>
                  </div>
               </div>
            </div>
         <?php else : ?>
            <h1 class="display-1">Data Not found !</h1>
         <?php endif; ?>

      </div>
      <div class="col-md-6 p-4 ps-md-0">
         <form action="?menu=tables" method="POST">
            <?php if ($companyNewsDetail) : ?>
               <h5 class="mt-0">Catatan Berita : </h5>
               <p><?= $companyNewsDetail->getNotes(); ?></p>
               <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="favorite" name="favorite" id="favorite" <?= $favoriteCondition ? "checked" : ""; ?>>
                  <label class="form-check-label" for="favorite">
                     tambah ke favorite
                  </label>
               </div>
            <?php endif; ?>
            <button class="btn btn-success">Kembali</button>
         </form>
      </div>
   </div>
</div>
<script>
   const inpFavorite = document.getElementById('favorite');

   const labelFavoriteEvent = (el) => {
      const checked = el.target.checked;

      $.ajax({
         type: "POST",
         url: "./ajax/favorite.php",
         data: {
            favorite: checked,
            nik: <?= $_SESSION['nik']; ?>,
            cid: <?= $companyNewsDetail->getId(); ?>
         },
         cache: false,
         success: () => {}
      })
   }
   inpFavorite.addEventListener('change', labelFavoriteEvent);
</script>