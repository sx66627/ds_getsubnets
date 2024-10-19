<?php

// Чтение списка IP-адресов из файла
$ipList = file('https://raw.githubusercontent.com/GhostRooter0953/discord-voice-ips/refs/heads/master/voice_domains/discord-voice-ip-list', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$ipList2 = file('https://raw.githubusercontent.com/GhostRooter0953/discord-voice-ips/refs/heads/master/main_domains/discord-main-ip-list', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
$ipList3 = file('other.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);


// Массив для хранения уникальных подсетей
$subnets = [];

function getSubnetCIDR($ip) {
    $output = [];
    $return_var = 0;

    // Выполняем команду whois для IP
    exec("whois $ip | grep -i 'CIDR'", $output, $return_var);

    if ($return_var !== 0 || empty($output)) {
        return false;
    }

    // Парсим CIDR из whois-вывода
    foreach ($output as $line) {
        if (preg_match('/CIDR:\s*([\d\.\/]+)/i', $line, $matches)) {
            return $matches[1];
        }
    }

    return false;
}

// Проходим по каждому IP-адресу и вычисляем подсети
foreach ($ipList as $ip) {
    $cidr = getSubnetCIDR($ip);
    if ($cidr && !in_array($cidr, $subnets)) {
        array_push($subnets, $cidr);
    }
}

foreach ($ipList2 as $ip) {
    $cidr = getSubnetCIDR($ip);
    if ($cidr && !in_array($cidr, $subnets)) {
        array_push($subnets, $cidr);
    }
}

foreach ($ipList3 as $ip) {
    $cidr = getSubnetCIDR($ip);
    if ($cidr && !in_array($cidr, $subnets)) {
        array_push($subnets, $cidr);
    }
}

// Вывод уникальных подсетей
foreach ($subnets as $subnet) {
    echo $subnet . "\n";
}

?>