<div class="card" style="width: 18rem;margin: 25px">
  <img src="<?=BASE_PATH?>/images/home/kingsman1.jpg" class="card-img-top" alt="ini baju">
  <div class="card-body">
    <h5 class="card-title"><?= ucfirst($cat[0]['nama_cat'])?></h5>
    <p class="card-text">Rp<?= $cat[0]['harga'] ?></p>
    <p class="card-text"><?= strtoupper($cat[0]['ukuran']) ?></p>
    <p class="card-text"><?= $cat[0]['tahun'] ?></p>
    <a href="<?=BASE_PATH?>/catalog/<?=$cat[0]['id_cat']?>" class="btn btn-primary">Details</a>
  </div>
</div>