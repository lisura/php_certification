<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste de Upload</title>
    </head>
    <body>

    <?php
      if(!empty($_FILES)){
        echo '<pre>' . print_r($_FILES,1) . '</pre>';
      }
    ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>"  enctype="multipart/form-data">
      <p>&lt; 2 mb</p>
       <p><input type="file" name="file1" /></p>
       <p><input type="file" name="file2" /></p>
       <input type="submit" />
    </form>
    </body>
</html>
