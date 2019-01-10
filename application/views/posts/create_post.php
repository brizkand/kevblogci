<h1 class='h1-responsive font-weight-bold text-center my-5 wow animated bounceInUp'><?= $title;?></h1>
<b class='text-danger'><?php echo validation_errors(); ?></b>


    <?php echo form_open_multipart('post/create'); ?>
        <!-- Title -->
        <div class="md-form">
            <input type="text" name='title' class="form-control">
            <label>Title</label>
        </div>

        <!-- Body -->
        <div class="md-form">
        <textarea  name="body" id='editor' placeholder="Write something here..."></textarea>
        </div>

        <!--Category-->
        <div class="md-form">
            Category:
            <select name='category' class="browser-default custom-select">
                <?php foreach($categories as $category):?>
                    <option value='<?= $category['id'];?>'><?= $category['category'];?></option>
                <?php endforeach?>
            </select>
        </div>
        <!-- Upload Image -->
        <div class="file-field">
            <div class="btn blue-gradient float-left">
                <span><i class="fa fa-cloud-upload mr-2" aria-hidden="true"></i>Choose file</span>
                <input type="file" name="userfile">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text" placeholder="Upload your image">
            </div>
        </div><br>
        <!-- Create button -->
        <button class="btn btn-primary btn-rounded  my-4 " type="submit">Create Post</button>
    </form>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>