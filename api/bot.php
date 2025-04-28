<?php
// Seu Token do Bot
$token = '8172423558:AAFO4SygPJzgi1fgwvz4wtzPE8sdQ_e02QU';

// Receber atualização enviada pelo Telegram (POST)
$update = json_decode(file_get_contents("php://input"), TRUE);

// Verifique se o Telegram enviou uma mensagem
if (isset($update["message"])) {
    $chat_id = $update["message"]["chat"]["id"];
    $text = $update["message"]["text"];

    // Se o texto for "/start", responde "Bot funcionando!"
    if ($text == "/start") {
        $message = "Bot funcionando!";
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message));
    }
}
?>
