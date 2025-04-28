<?php
// Seu Token do Bot
$token = '8172423558:AAFO4SygPJzgi1fgwvz4wtzPE8sdQ_e02QU';

// Receber atualização enviada pelo Telegram (POST)
$update = json_decode(file_get_contents("php://input"), true);

// Verificar se há mensagem no update
if (isset($update['message'])) {
    $chat_id = $update['message']['chat']['id'];
    $text = $update['message']['text'];

    // Se o texto for "/start", responde com "Bot funcionando!"
    if ($text == "/start") {
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode("Bot funcionando!"));
    }
}
?>
