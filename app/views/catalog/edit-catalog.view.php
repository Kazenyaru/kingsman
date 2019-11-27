<form method="POST" action="<?=BASE_PATH?>/catalog/update/<?=$cat[0]['id_cat']?>" enctype="multipart/form-data">
    <div class="form-group">
        <label for="formGroupExampleInput">Kategori</label>
        <input type="text" class="form-control" name="category" id="category" value="<?=$cat[0]['category']?>" placeholder="Kategori">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Nama</label>
        <input type="text" class="form-control" name="nama_cat" id="nama_cat" value="<?=$cat[0]['nama_cat']?>" placeholder="Nama Catalog">
    </div>
    <div class="form-group mb-4 mt-4">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" name="gambar" class="form-control-file" id="gambar">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Harga</label>
        <input type="number" class="form-control" name="harga" id="harga" value="<?= number_format($cat[0]['harga']) ?>" placeholder="Harga">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Ukuran</label>
        <select class="form-control" name="ukuran" id="ukuran">
            <option value="s" <?= $cat[0]['ukuran'] == 's' ? 'selected' : '' ?> >S</option>
            <option value="m" <?= $cat[0]['ukuran'] == 'm' ? 'selected' : '' ?> >M</option>
            <option value="l" <?= $cat[0]['ukuran'] == 'l' ? 'selected' : '' ?> >L</option>
            <option value="xl" <?= $cat[0]['ukuran'] == 'xl' ? 'selected' : '' ?> >XL</option>
            <option value="xxl" <?= $cat[0]['ukuran'] == 'xxl' ? 'selected' : '' ?> >XXL</option>
            <option value="xxxl" <?= $cat[0]['ukuran'] == 'xxxl' ? 'selected' : '' ?> >XXXL</option>
        </select>
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Tahun</label>
        <input type="number" class="form-control" name="tahun" id="tahun" value="<?=$cat[0]['tahun']?>" placeholder="Tahun" min="1999" max="2999">
    </div>

    <input type="hidden" name="designer" value="<?=$_SESSION['id_user']?>">

    <button type="submit" class="btn btn-primary">Submit</button>
</form>