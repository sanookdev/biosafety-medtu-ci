<!-- File upload form -->
<form action="<?php echo site_url('upload/save_file'); ?>" method="post" enctype="multipart/form-data">
    <label for="file">Select a file:</label><br>
    <input type="file" name="file" id="file"><br><br>
    <input type="submit" value="Upload">
</form>