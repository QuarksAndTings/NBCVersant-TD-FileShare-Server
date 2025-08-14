<?php

$SMB_SERVER  = 'cnbcvizqumulo.bwt3.com';   // host or IP
$SMB_SHARE   = 'vizrt';                // share name (VIZ)
$SMB_SUBPATH = 'Engineering\\MilesTest Test';           // subfolder inside the share (use backslashes)

$SMB_USER = 'bwt3\\gfx-op'; //USER
$SMB_PASS = 'SylvanAve!'; //PW

function smb_unc_root($server, $share) {
    return '\\\\' . $server . '\\' . $share;
}
function smb_unc_path($server, $share, $subpath = '') {
    $unc = smb_unc_root($server, $share);
    return $subpath !== '' ? $unc . '\\' . $subpath : $unc;
}
