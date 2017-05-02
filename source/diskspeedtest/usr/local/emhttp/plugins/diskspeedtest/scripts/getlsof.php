#!/usr/bin/php
<?PHP
$disk = strtolower($argv[1]);
$disk = str_replace("(","",$disk);
$disk = str_replace(")","",$disk);
$disk = str_replace(" ","",$disk);
exec("lsof /mnt/{$disk} | grep '/mnt/$disk/' >> /tmp/lsof.txt 2>/dev/null");
?>
