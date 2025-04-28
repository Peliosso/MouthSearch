from flask import Flask, request
import logging
from telegram import Bot, Update
from telegram.ext import Dispatcher, CommandHandler

# Token do bot
TOKEN = '8172423558:AAFO4SygPJzgi1fgwvz4wtzPE8sdQ_e02QU'
bot = Bot(token=TOKEN)

# Configuração do Flask
app = Flask(__name__)

# Inicializa o logger
logging.basicConfig(format='%(asctime)s - %(name)s - %(levelname)s - %(message)s',
                    level=logging.INFO)
logger = logging.getLogger(__name__)

# Função de start
def start(update, context):
    """Envia uma mensagem quando o comando /start é enviado"""
    update.message.reply_text("Bot funcionando!")

# Webhook para receber atualizações do Telegram
@app.route(f'/webhook/{TOKEN}', methods=['POST'])
def webhook():
    """Recebe atualizações do Telegram"""
    update = Update.de_json(request.get_json(), bot)
    dispatcher.process_update(update)
    return 'ok'

# Cria o dispatcher e adiciona o handler
dispatcher = Dispatcher(bot, None, workers=0)
dispatcher.add_handler(CommandHandler('start', start))

if __name__ == '__main__':
    # Rodando o Flask
    app.run(debug=True)
