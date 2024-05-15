<?php
#login do sipini
function get_bearer_sipni(){
    $login = base64_encode('marciahev@gmail.com:marciacosta1');

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://servicos-cloud.saude.gov.br/pni-bff/v1/autenticacao/tokenAcesso');
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_ENCODING, "gzip");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'accept: application/json',
    'DNT: 1',
    'referer: https://si-pni.saude.gov.br/',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'X-Authorization: Basic '.$login.'',
    ));
    $re = curl_exec($ch);
    $parsed = json_decode($re, True);

    return $parsed['refreshToken'];
}