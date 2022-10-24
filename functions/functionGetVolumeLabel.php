    <?php
    function GetVolumeLabel($drive) {
    // Try to grab the volume name
    if (preg_match('#Volume Serial Number is (.*)\n#i', shell_exec('dir '.$drive.':'), $m)) {
    $volname = ' ('.$m[1].')';
    } else {
    $volname = '';
    }
    return $volname;
    }
    $serial = str_replace("(","",str_replace(")","",GetVolumeLabel("c")));
    echo $serial;
    ?>