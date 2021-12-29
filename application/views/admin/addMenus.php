
 <!-- Begin Page Content -->
 <div class="container-fluid">
    <h3>Tambah Data Menu</h3>

    <?php echo form_open_multipart('admin/menus/addMenusFunc');?>
        <!-- id : <br><input type="number" name="id" id="id" required><br><br> -->

        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="type">Menu Type</label><br>
            <input type="radio" name="type" id="type-1" value="foods" required> foods <br>
            <input type="radio" name="type" id="type-2" value="drinks"> drinks <br>
            <input type="radio" name="type" id="type-3" value="snacks"> snacks <br>
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input class="form-control" type="number" name="price" id="price" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input class="form-control-file" type="file" name="image" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    </div>
<!-- /.container-fluid -->