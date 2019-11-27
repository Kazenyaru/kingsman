<!-- <div class="card" style="width: 18rem;margin: 25px">
  <img src="<?= BASE_PATH ?>/images/<?= @$data['gambar'] ? 'designer/' . $data['gambar'] : 'home/kingsman1.jpg' ?>" class="card-img-top" alt="<?= $data['nama_cat'] ?>">
  <div class="card-body">
    <h5 class="card-title"><?= ucfirst($cat[0]['nama_cat']) ?></h5>
    <p class="card-text">Rp<?= $cat[0]['harga'] ?></p>
    <p class="card-text"><?= strtoupper($cat[0]['ukuran']) ?></p>
    <p class="card-text"><?= $cat[0]['tahun'] ?></p>
    <a href="<?= BASE_PATH ?>/catalog/<?= $cat[0]['id_cat'] ?>" class="btn btn-primary">Details</a>
  </div>
</div> -->

<div class="card">
  <div class="card-body row p-4">
    <div class="w-50 ml-3">
      <img src="<?= BASE_PATH ?>/images/<?= @$data['gambar'] ? 'designer/' . $data['gambar'] : 'home/kingsman1.jpg' ?>" class="card-img-top d-block float-left" style="border-radius: 2px" alt="<?= $data['nama_cat'] ?>">
    </div>
      <div class="desc-detail-cat ml-5 mt-2 p-3">
        <h5><?= ucfirst($cat[0]['nama_cat']) ?></h5>
        <div class="row ml-2 mt-4">
          <h5 class="desc-cat">Ukuran&ensp;:</h5>
          <h5 class="desc-cat ml-4"><?= strtoupper($cat[0]['ukuran']) ?></h5>
        </div>
        <div class="row ml-2 mb-2">
          <h5 class="desc-cat">Tahun&ensp;&ensp;:</h5>
          <h5 class="desc-cat ml-4"><?= $cat[0]['tahun'] ?></h5>
        </div>
        <p class="harga">Rp. <?= $cat[0]['harga'] ?></p>
        <div class="row ml-2 mb-2">
          <p class="desc-cat mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
        </div>
        <a class="btn btn-primary mt-4" href="<?=BASE_PATH?>/catalog/designer/<?=$cat[0]['id_user']?>">See others from <?= ucfirst(explode('@', $cat[0]['email'])[0]) ?></a>
      </div>
    <!-- <div style="width: 30%">
      <div class="font-weight-bold ml-4 float-left d-block col">
        <h5 class="card-title mb-1"><?= ucfirst($cat[0]['nama_cat']) ?></h5>
      </div>
      <div class="catalog-details float-left ml-4 col">
        <ul class="list-group">
          <li style="font-size:18px; width: 100%; border-left: 0; border-right: 0; height: 50px" class="list-group-item">
            Harga:&emsp;Rp<?= $cat[0]['harga'] ?>
          </li>
          <li style="width: 100%; border-left: 0; border-right: 0" class="list-group-item">Dapibus ac facilisis in</li>
          <li style="width: 100%; border-left: 0; border-right: 0; border-bottom: 0" class="list-group-item">Vestibulum at eros</li>
        </ul>
      </div>
    </div> -->
  </div>
</div>