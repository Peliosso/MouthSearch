<?php
// Seu Token do Bot
$token = '8172423558:AAFO4SygPJzgi1fgwvz4wtzPE8sdQ_e02QU';

// Receber atualização enviada pelo Telegram (POST)
$update = file_get_contents('php://input');
$update = json_decode($update, true);

// Verifique se a requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pegar o ID do chat e o texto enviado
    $chat_id = $update['message']['chat']['id'] ?? null;
    $text = $update['message']['text'] ?? '';

    // Se o texto for "/start"
    if ($text === '/start') {
        $message = 'Bot funcionando!';

        // Enviar mensagem de volta usando a API do Telegram
        file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=" . urlencode($message));
    }
} else {
    // Resposta para GET ou erro
    echo "Invalid request method.";
}
?>
