<h1 class='h1-responsive font-weight-bold text-center my-5 wow animated bounceInUp'><?= $title;?></h1>
<b class='text-danger'><?php echo validation_errors(); ?></b>

    <?php echo form_open('post/update/'/* . $post_item['slug']*/); ?>
    <input type="hidden" name='slug' class="form-control" value='<?php echo $post_item['slug'];?>'>
        <!-- Title -->
        <div class="md-form">
            <input type="text" name='title' class="form-control" value='<?php echo $post_item['title'];?>'>
            <label>Title</label>
        </div>
        <!-- Body -->
        <div class="md-form">
            <textarea  name="body" id='editor' placeholder="Write something here..."><?php echo $post_item['body'];?></textarea>
        </div>
        <!--category-->
        <div class="md-form">
            Category:
            <select name='category' class="browser-default custom-select">
                <option value='<?= $post_item['category_id'];?>'>Don't update category</option>
                <?php foreach($categories as $category):?>
                    <option value='<?= $category['id'];?>'><?= $category['category'];?></option>
                <?php endforeach?>
            </select>
        </div>
        
        <!-- Create button -->
        <button class="btn btn-primary btn-rounded  my-4 " type="submit">Update Post</button>
    </form>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>