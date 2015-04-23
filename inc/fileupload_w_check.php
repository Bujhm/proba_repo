<?php
if (isset($_FILES['fileupload'])) {
    $path_to_image_directory = "img/members/";
    if (preg_match('/[.](jpg)|(gif)|(png)$/', $_FILES['fileupload']['name'])) {
        $filename = $_FILES['fileupload']['name'];
        $source = $_FILES['fileupload']['tmp_name'];
        $target = $path_to_image_directory . $filename;
        // some debug ...
        //echo "You selected: " . $filename.BR;
        if (move_uploaded_file($source, $target)){
                // print '<p> The file has been successfully uploaded </p>';
                // createThumbnail($filename);
                // echo "<img src=\"".$target."\">";
            }
        else {
            switch ($_FILES['fileupload']['error'])
             {  case 1:
                       $error_msg_file.='The file is bigger than this PHP installation allows';
                       break;
                case 2:
                       $error_msg_file.= 'The file is bigger than this form allows';
                       break;
                case 3:
                       $error_msg_file.= 'Only part of the file was uploaded';
                       break;
                case 4:
                       $error_msg_file.= 'No file was uploaded';
                       break;
             }
           }

    } else { $error_msg_file.='Not supported type of file'; }
}
?>