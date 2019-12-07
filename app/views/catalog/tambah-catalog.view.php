<form method="POST" action="<?=BASE_PATH?>/catalog/create" enctype="multipart/form-data">
    <div class="form-group">
        <label for="formGroupExampleInput">Kategori</label>
        <input type="text" class="form-control" name="category" id="formGroupExampleInput" placeholder="Kategori">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Nama</label>
        <input type="text" class="form-control" name="nama_cat" id="formGroupExampleInput2" placeholder="Nama Catalog">
    </div>
    <div class="form-group mb-4 mt-4">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Harga</label>
        <input type="number" class="form-control" name="harga" id="formGroupExampleInput2" placeholder="Harga">
    </div>
    <div class="form-group">
        <label for="formGroupExampleInput2">Ukuran</label>
        <select class="form-control" name="ukuran" id="ukuran">
            <option value="s">S</option>
            <option value="m">M</option>
            <option value="l">L</option>
            <option value="xl">XL</option>
            <option value="xxl">XXL</option>
            <option value="xxxl">XXXL</option>
        </select>
    </div>
    <div class="form-group mb-5">
        <label for="formGroupExampleInput2">Tahun</label>
        <input type="number" class="form-control" name="tahun" id="formGroupExampleInput2" placeholder="Tahun" min="1999" max="2999">
    </div>
    <input type="hidden" name="designer" value="<?=$_SESSION['id_user']?>">
    <button type="submit" class="btn btn-primary">Submit</button>
</form>