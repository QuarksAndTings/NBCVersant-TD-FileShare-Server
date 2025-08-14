<?php
require_once __DIR__ . '/config.php';

function smb_connect($server, $share, $user, $pass) {
    $unc = smb_unc_root($server, $share);
    // Map a connection to the UNC with credentials (no drive letter)
    $cmd = 'cmd.exe /C net use "' . $unc . '" /user:"' . $user . '" "' . $pass . '" /persistent:no';
    // Suppress output; you'll still get a non-empty string if there's an error
    $out = shell_exec($cmd . ' 2>&1');
    return $out; // empty or success text if already connected
}

function smb_disconnect($server, $share) {
    $unc = smb_unc_root($server, $share);
    shell_exec('cmd.exe /C net use "' . $unc . '" /delete /y 2>&1');
}

function smb_ensure_and_get_folder() {
    global $SMB_SERVER, $SMB_SHARE, $SMB_USER, $SMB_PASS, $SMB_SUBPATH;
    // Attempt to connect; ignore "The network connection could not be found" vs "is already connected" noise
    smb_connect($SMB_SERVER, $SMB_SHARE, $SMB_USER, $SMB_PASS);
    // Return full UNC to the PDFs folder
    return smb_unc_path($SMB_SERVER, $SMB_SHARE, $SMB_SUBPATH);
}
