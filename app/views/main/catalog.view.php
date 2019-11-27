<style>
  .grid-container {
    display: grid;
    grid-template-columns: auto auto auto;
    grid-gap: 10px;
    background-color: #2196F3;
    padding: 10px;
  }

  .grid-container>.img {
    background-color: rgba(255, 255, 255, 0.8);
    text-align: center;
    padding: 20px 0;
    font-size: 30px;
  }

  .cat-act {
    text-decoration: none;
    color: white;
  }

</style>
<br>
<h4 class="head">Catalog Kingsman</h4>

<?php if( !@$email && @$_SESSION['role'] == 'admin' ) {?>
  <h5>
    <span>
      <a class="badge badge-primary" href="<?=BASE_PATH?>/catalog/designer/<?=$_SESSION['id_user']?>">My Catalog</a>
    </span>
    <span>
      <a class="badge badge-secondary" href="<?=BASE_PATH?>/catalog/tambah">Tambah Catalog</a>
    </span>

    <?php if ( @$fadil && (@$_SESSION['id_user'] == @$id || @$_SESSION['role'] == 'admin') ) { ?>
      <span>
        <li class="nav-item dropdown badge badge-success">
          <a id="navbarDropdown" class="dropdown-toggle cat-act" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Edit <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <?php foreach($fadil as $cat) { ?>
              <a class="dropdown-item" href="<?= BASE_PATH ?>/catalog/edit/<?=$cat['id_cat']?>">
                <?=$cat['id_cat']?>. <?=$cat['nama_cat']?>
              </a> 
            <?php } ?>       
          </div>

        </li>

      </span>

      <span>
        <li class="nav-item dropdown badge badge-danger">
          <a id="navbarDropdown" class="dropdown-toggle cat-act" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Delete <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <?php foreach($fadil as $cat) { ?>
              <a class="dropdown-item" href="<?= BASE_PATH ?>/catalog/edit/<?=$cat['id_cat']?>">
                <?=$cat['id_cat']?>. <?=$cat['nama_cat']?>
              </a> 
            <?php } ?>       
          </div>

        </li>
      </span>
    <?php } ?>

  </h5>
<?php } ?>

<?php if( @$_SESSION['role'] && @$_SESSION['role'] != 'admin' ) {?>
  <h5>
    <span>
      <a class="badge badge-primary" href="<?=BASE_PATH?>/catalog/designer/<?=$_SESSION['id_user']?>">My Catalog</a>
    </span>
    <span>
      <a class="badge badge-secondary" href="<?=BASE_PATH?>/catalog/tambah">Tambah Catalog</a>
    </span>

    <?php if ( @$fadil && (@$_SESSION['id_user'] == @$id || @$_SESSION['role'] == 'admin') ) { ?>
      <span>
        <li class="nav-item dropdown badge badge-success">
          <a id="navbarDropdown" class="dropdown-toggle cat-act" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Edit <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <?php foreach($fadil as $cat) { ?>
              <a class="dropdown-item" href="<?= BASE_PATH ?>/catalog/edit/<?=$cat['id_cat']?>">
                <?=$cat['id_cat']?>. <?=$cat['nama_cat']?>
              </a> 
            <?php } ?>       
          </div>

        </li>

      </span>

      <span>
        <li class="nav-item dropdown badge badge-danger">
          <a id="navbarDropdown" class="dropdown-toggle cat-act" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Delete <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <?php foreach($fadil as $cat) { ?>
              <a class="dropdown-item" href="<?= BASE_PATH ?>/catalog/edit/<?=$cat['id_cat']?>">
                <?=$cat['id_cat']?>. <?=$cat['nama_cat']?>
              </a> 
            <?php } ?>       
          </div>

        </li>
      </span>
    <?php } ?>

  </h5>
<?php } ?>

<div class="container">
  <div class="justify-content-md-center">
    <!-- <?php /*
  if($datas)
    foreach ($datas as $data) {
?>
  <div class="img">
    <img 
      src="<?=file_exist(ROOT.$data['gambar']) ? ROOT.$data['gambar'] : " " ?>" 
      alt="Gambar Catalog <?= $data['nama_cat']?>" />
  </div>
    <?php } */ ?> -->

    <?php $namaClass = 'row'; ?>

    <div class="listCard justify-content-md-center">
      <div class="<?=$namaClass?>">
    <?php
    if (@$fadil) :
      $no = 1;
      foreach ($fadil as $data) {
        $no++;
        if ($no % 3 != 0) {
          $namaClass = 'fadil';
        }
    ?>
        <div class="card" style="width: 18rem;margin: 25px">
          <img src="<?=BASE_PATH?>/images/<?= @$data['gambar'] ? 'designer/'.$data['gambar'] : 'home/kingsman1.jpg'?>" class="card-img-top" alt="<?=$data['nama_cat']?>">
          <div class="card-body">
            <h5 class="card-title"><?= ucfirst($data['nama_cat'])?></h5>
            <p class="card-text">Rp<?= $data['harga'] ?></p>
            <p class="card-text"><?= strtoupper($data['ukuran']) ?></p>
            <p class="card-text"><?= $data['tahun'] ?></p>
            <a href="<?=BASE_PATH?>/catalog/<?=$data['id_cat']?>" class="btn btn-primary">Details</a>
          </div>
        </div>
        <?php }
    endif; ?>
      </div>
    </div>

  <?php
  // return var_dump($fadil['paginate']);
    if(@$paginate)
      for ($i=1; $i <= $paginate ; $i++){ ?>
        <a href="<?php echo $i; ?>"><?php echo $i; ?></a>
  <?php } ?>
    

    <!-- <table class="table table-striped mt-4">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama</th>
          <th scope="col">Harga</th>
          <th scope="col">Ukuran</th>
          <th scope="col">Tahun</th>
          <th scope="col">Designer</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // return var_dump($datas);
        if (@$fadil) :
          $no = 1;
          foreach ($fadil as $data) {
            $no++;
            ?>

            <tr>
              <td scope="row"><?= $no ?></td>
              <td><?= $data['nama_cat'] ?></td>
              <td><?= $data['harga'] ?></td>
              <td><?= $data['ukuran'] ?></td>
              <td><?= $data['tahun'] ?></td>
              <td><?= $data['email'] ?></td>
            </tr>

        <?php }
        endif; ?>
      </tbody>
    </table> -->
  </div>
</div>