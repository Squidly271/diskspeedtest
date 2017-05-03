<?
switch ($_POST['action']) {
  case 'set_options':
    $options = $_POST['command'];
    file_put_contents("/tmp/options",$options);
    exec("chmod +x /tmp/options");
    echo $options;
    break;
  case 'getVars':
    exec("wget --quiet --output-document=/tmp/diskspeedvars.txt http://localhost/Tools/Vars");
    break;
  case 'get_status':
    if ( is_file("/tmp/diskspeed/finiFlag") ) {
      unlink("/tmp/diskspeed/finiFlag");
      echo "RELOAD";
      break;
    }
    if ( ! is_file("/tmp/diskspeed/PID") ) {
      echo "Not Running<script>$('#testButton').prop('disabled',false);</script>";
      $exitStatus = @file_get_contents("/tmp/diskspeed/exitstatus");
      if ( $exitStatus ) {
        echo "<font color='red'>&nbsp;&nbsp;&nbsp;<b>Last Error:</b> $exitStatus</font>";
      }
    } else {
      $status = exec("tail -n 1 /tmp/diskspeed/status");
      echo "<i class='fa fa-spinner fa-spin' aria-hidden='true'></i>&nbsp$status<input type='button' style='float:right;' value='Cancel' onclick='cancelTest();'><script>$('#testButton').prop('disabled',true);</script>";
    }
    break;
  case 'start':
    $descriptorspec = array(
      0 => array("pipe", "r"),  // stdin is a pipe that the child will read from
      1 => array("pipe", "w"),  // stdout is a pipe that the child will write to
      2 => array("pipe", "w") // stderr is a file to write to
    );
    proc_open("/usr/local/emhttp/plugins/diskspeedtest/scripts/start.sh",$descriptorspec,$pipes);
    break;
  case 'cancel_script':
    $PID = file_get_contents("/tmp/diskspeed/PID");
    exec("logger kill $PID");
    exec("kill $PID");
    @unlink("/tmp/diskspeed/PID");
    break;
}
?>