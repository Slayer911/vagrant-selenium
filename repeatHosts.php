<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    $hostFilePath = $_SERVER['SystemRoot'] . '\System32\drivers\etc\hosts';
} else {
    $hostFilePath = '/etc/hosts';
}
$hostData = file_get_contents($hostFilePath);
$hostData = preg_replace('/127\.0\.0\.1/', '10.0.2.2', $hostData);
$hostData = preg_replace('/10\.0\.2\.2\s*localhost/', null, $hostData);
file_put_contents('hosts', $hostData);
