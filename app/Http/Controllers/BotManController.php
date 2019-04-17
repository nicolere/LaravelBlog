<?php

namespace App\Http\Controllers;

use Botman\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\Cache\SymfonyCache;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Auth;

use Illuminate\Http\Request;

class BotManController extends Controller
{
    public function bot() {

        $config = [
            'web' => [
                'matchingData' => [
                    'driver' => 'web',
                ],
            ]
        ];

        DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

        $adapter = new FilesystemAdapter();

        // Create an instance
        $botman = BotManFactory::create($config, new SymfonyCache($adapter));


        $botman->hears('hello|Hello|bonjour|Bonjour', 'app\Http\Controllers\MyBotCommands@sayHello');

        //Appel la fonction de Conversation
        $botman->hears('conversation', 'app\Http\Controllers\MyBotCommands@Conversation');

        //Appel de la fonction d'aide
        $botman->hears('help', 'app\Http\Controllers\MyBotCommands@Help');

        //Appel de fonction lors d'une erreur de compréhension
        $botman->fallback('app\Http\Controllers\MyBotCommands@PasCompris');
        
        //start listening
        $botman->listen();
    }

}

//Classe des commandes du Bot
class MyBotCommands {

    public function sayHello($bot) {
        $bot->reply("Bonjour !");
    }

    public function PasCompris($bot){
        $bot->reply("Désolé, je n'ai pas compris cette commande, veuillez réessayer !");
    }

    public function Help($bot){

        $question = Question::create("Besoin d'aide ?")
            ->addButton(Button::create('Commandes disponibles')->value('https://github.com/nicolere/LaravelBlog/blob/master/README.md'))
            ->addButton(Button::create('Documentation')->value('http://botman.io/'));

        $bot->ask($question, function (Answer $answer){
            if ($answer->isInteractiveMessageReply()) {
                $this->valeur = $answer->getValue();

                $this->say('Copie/Colle ça : '.$this->valeur);
            }
        });
        
    }

    //Initialise une nouvelle conversation
    public function Conversation(BotMan $bot)
    {
        $bot->startConversation(new TestConv());
    }


}

class TestConv extends Conversation {

    protected $reponse;

        public function askColor() {

            $this->ask('Quel est ta couleur totem ?', function(Answer $answer) {
                //Save result
                $this->reponse = $answer->getText();
                $this->say("Trop bien ! Moi aussi j'aime le ". $this->reponse);
            });
        }

        /**
         * Start the conversation.
         *
         * @return mixed
         */
        public function run()
        {
            $this->askColor();
        }
}

