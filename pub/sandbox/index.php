<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="uploadedFileInput">
            wybierz plik do wgrania na serwer
        </label><br>
        <input type="file" name="uploadedFile" id="uploadedFileInput"><br>
        <input type="submit" value="Wyślij plik" name="submit"><br>
     </form>
    
     <?php 
     if (isset($_POST['submit'])){
        $targetDir = "img/";
        $sourceFileName = $_FILES['uploadedFile'] ['name'];
        $tempURL = $_FILES['uploadedFile'] ['tmp_name'];
        $sourceFileExtension = pathinfo($sourceFileName, PATHINFO_EXTENSION);
        $sourceFileExtension = strtolower($sourceFileExtension);
        $imgInfo = getimagesize($tempURL);
        if(!is_array($imgInfo)) {
            die("BŁĄD: Przekazany plik nie jest obrazem");
        }
        $targetURL = $targetDir . $sourceFileName;
        if(file_exists($targetURL)){
            die("BŁĄD:Podany plik już istnieje!");
        }
        move_uploaded_file($tempURL, $targetURL);
     }
     
     ?>
</body>
</html>