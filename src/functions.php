<?php

namespace Hyqo\UUID;

function uid($length = 8): string
{
    $length = max(4, min(128, $length));

    $hex = md5(uniqid('', true));
    $pack = pack('H*', $hex);
    $base64 = base64_encode($pack);

    $uid = preg_replace("/[^A-Za-z0-9]/", "", $base64);

    while (strlen($uid) < $length) {
        $uid .= uid(22);
    }

    return substr($uid, 0, $length);
}

function uuid4(): string
{
    $data = random_bytes(16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
