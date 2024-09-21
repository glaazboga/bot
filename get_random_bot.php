<?php  

$domain = $_GET['domain'];
$domain = str_replace('.', '_', $domain);

$domain = "site_{$domain}";

$random_bot_name = file_get_contents("https://alreferal.ru/get_random_bot_hash.php?hash_id=733e6ebe7d0bed8fa1be8745b8247a5936c04c0e9dda29fdcd4d0174713e123e");

$url_redirect =  "https://t.me/{$random_bot_name}/?start={$domain}";
header("Location: {$url_redirect}");
die();
?>