<?php
/**
 * @example
 *   - Base Url
 *     https://stage.example.com/config/?s=advanced&v=20200721184800
 */
$ip = $_SERVER['REMOTE_ADDR'];
$site = $_GET['s'];
$version = $_GET['v'];

if (!(strlen($ip) && strlen($site) && strlen($version))) exit;

$configPath = implode(DIRECTORY_SEPARATOR, [__DIR__, $site, ip2long($ip)]);
$configDir = dirname($configPath);
$config = [
    'ip' => $ip,
    'time' => time(),
    'version' => $version,
];

!file_exists($configDir) && mkdir($configDir, 0755, true);

file_put_contents("{$configPath}.json", json_encode($config, JSON_PRETTY_PRINT));
