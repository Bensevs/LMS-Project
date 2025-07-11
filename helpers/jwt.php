<?php
function createJWT($userId) {
    $header = base64_encode(json_encode(['alg' => 'HS256', 'typ' => 'JWT']));
    $payload = base64_encode(json_encode(['user_id' => $userId, 'exp' => time() + 3600]));
    $signature = hash_hmac('sha256', "$header.$payload", 'secretkey', true);
    $jwt = "$header.$payload." . base64_encode($signature);
    return $jwt;
}

function verifyJWT($jwt) {
    $parts = explode('.', $jwt);
    if (count($parts) !== 3) return false;

    $signature = base64_encode(hash_hmac('sha256', "$parts[0].$parts[1]", 'secretkey', true));
    return hash_equals($signature, $parts[2]);
}
?>
