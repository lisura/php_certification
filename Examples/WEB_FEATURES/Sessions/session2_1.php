<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Teste de Upload</title>
    </head>
    <body>
<?="session_id: " . session_id() .PHP_EOL;?>
<pre><?php print_r($_FILES);?></pre>

    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>"  enctype="multipart/form-data">
       <input type="hidden" name="<?=ini_get("session.upload_progress.name")?>" value="up1" />
       <p><input type="file" name="file1" /></p>
       <p><input type="file" name="file2" /></p>
       <input type="submit" />
    </form>
    </body>
</html>
