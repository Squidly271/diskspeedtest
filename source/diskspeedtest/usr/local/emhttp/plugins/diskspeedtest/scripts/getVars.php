#!/usr/bin/php
<?PHP
$unRaidVars = parse_ini_file("/var/local/emhttp/disks.ini",true);
file_put_contents("/tmp/diskspeedvars.txt",print_r($unRaidVars,1));
?>
