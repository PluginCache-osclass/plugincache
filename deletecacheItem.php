<div style="margin-left:100px;">
<?php 
echo 'DELETED ITEM PAGE CACHE FILES: <br/>'; 
$file = "cache_files/item";
if (file_exists($file))
  {

function EmptyDir($dir) {
$handle=opendir($dir);

while (($file = readdir($handle))!==false) {
echo "$file <br>";
@unlink($dir.'/'.$file);
}
closedir($handle);
}
EmptyDir('cache_files/item');
} else { echo '<br/>No Cache Was Created Yet!'; }
?></div>