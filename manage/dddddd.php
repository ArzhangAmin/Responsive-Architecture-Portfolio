<?php
/*CopyRight By Iranweblearn.com */

/* define('DB_HOST', 'localhost');
define('DB_NAME', 'iranweblearn');
define('DB_USERNAME', 'iwluser');
define('DB_PASSWORD', '');

mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die('not Connected because: ' . mysql_error());
mysql_select_db(DB_NAME) or die('no Select Db BECAUSE: ' . mysql_error() );
mysql_query('SET NAMES UTF8'); */
include('config.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Multiple Upload</title>
<style>
    body{direction:rtl; text-align:right;}
    form{font:12px/35px tahoma; width:400px; padding:20px}
    input{border:0}
    button{font:12px/25px tahoma; border-radius:5px; border:0; color:#fff;background-color:#008DDE}
    button:hover{cursor:pointer; background-color:#0073AC}
</style>
</head>
<body>
  <form action="" method="post" enctype="multipart/form-data">
        <p><input type="file" name="file[]" id="fileField" multiple="multiple"></p>
        <p><button type="submit" name="submitPhotos">آپلود فایل ها</button></p>
  </form>
</body>
</html>
<?php
    if(isset($_POST['submitPhotos']))
    {   
        $errors=0;
        $uploads_dir = 'files/';
        foreach ($_FILES["file"]["name"] as $key => $value) {
            $image =$_FILES["file"]["name"][$key];
            $uploadedfile = $_FILES['file']['tmp_name'][$key];

            if ($image)
            {
                $filename = stripslashes($_FILES['file']['name'][$key]);
                $lastDotPos = strrpos($filename, '.');
                if ($lastDotPos )
                {
                    $extension = substr($filename, $lastDotPos+1); 
                }
                if($extension=="jpg" || $extension=="jpeg" || $extension=="JPG" )
                {
                    $uploadedfile = $_FILES['file']['tmp_name'][$key];
                    $src = imagecreatefromjpeg($uploadedfile);
                }
                else if($extension=="png")
                {
                    $uploadedfile = $_FILES['file']['tmp_name'][$key];
                    $src = imagecreatefrompng($uploadedfile);
                }
                else if($extension=="gif")
                {
                    $uploadedfile = $_FILES['file']['tmp_name'][$key];
                    $src = imagecreatefromgif($uploadedfile);
                }

                list($width,$height)=getimagesize($uploadedfile);

                $tmp=imagecreatetruecolor($width,$height);

                $newwidth = $width;
                $newheight = $height;
                imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

                $rand = md5(md5(time()).md5(microtime())).rand(10,25);
                $CreateName = $rand.".".$extension;
                $filename = "files/".$CreateName;
                $proImage = $CreateName;
                imagejpeg($tmp,$filename,100);

                imagedestroy($src);
                imagedestroy($tmp);
                /*$Insert = mysql_query("INSERT INTO `test` ( `filename` ) VALUES ( '$CreateName' ) "); */
			 mysql_query("INSERT INTO tbl_image(ImageAddress,ProjectID)VALUES('$$CreateName','1')");

            }
        }
        /*if($Insert)
        {
            echo "تصاویر با موفقیت آپلود شد.";
        }   */
    }
?>
