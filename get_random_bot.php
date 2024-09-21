<?php  

// Получаем значение домена из GET параметра
$domain = $_GET['domain'] ?? '';
if (empty($domain)) {
    // Если домен не передан, можно задать действие по умолчанию или вернуть ошибку
    die('Domain parameter is required');
}

// Преобразуем домен, заменяя точки на подчеркивания
$domain = str_replace('.', '_', $domain);
$domain = "site_{$domain}";

// URL для получения имени бота
$bot_url = "https://alreferal.ru/get_random_bot_hash.php?hash_id=733e6ebe7d0bed8fa1be8745b8247a5936c04c0e9dda29fdcd4d0174713e123e";

// Используем cURL для получения имени бота
$ch = curl_init($bot_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$random_bot_name = curl_exec($ch);
curl_close($ch);

// Проверяем, что запрос к внешнему ресурсу вернул непустой результат
if ($random_bot_name && !empty($random_bot_name)) {
    // Формируем URL для редиректа
    $url_redirect = "https://t.me/{$random_bot_name}/?start={$domain}";
    
    // Выполняем редирект
    header("Location: {$url_redirect}");
    exit(); // Завершаем выполнение скрипта после редиректа
} else {
    // Если имя бота не удалось получить, выводим сообщение об ошибке
    die('Failed to retrieve bot name.');
}

?>
