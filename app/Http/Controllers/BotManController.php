<?php

namespace App\Http\Controllers;

use Botman\BotMan\BotMan;
use BotMan\BotMan\BotManFactory;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Drivers\DriverManager;

use BotMan\BotMan\Cache\SymfonyCache;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
// use Auth;

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
        $botman->hears('conversation|Conversation', 'app\Http\Controllers\MyBotCommands@Conversation');

        //Appel de la fonction Note
        $botman->hears('note|Note', 'app\Http\Controllers\MyBotCommands@Quote');

        //Appel de la fonction d'aide
        $botman->hears('help|Help', 'app\Http\Controllers\MyBotCommands@Help');

        //Appel de fonction lors d'une erreur de compréhension
        $botman->fallback('app\Http\Controllers\MyBotCommands@notUnderstand');
        
        //start listening
        $botman->listen();
    }

}

//Classe des commandes du Bot
class MyBotCommands {

    public function sayHello($bot) {
        if(Auth::check()){
            $bot->reply("Bonjour ".Auth::user()->name." !");
        }
        else {
            $bot->reply("Bonjour !");
        }
    }

    public function notUnderstand($bot){
        $bot->reply("Désolé, je n'ai pas compris cette commande, réessaye !");
    }

    //Fonction d'aide qui retourne une URL (résultat souhaité dans le ReadMe sur Git)
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

    //Fonction qui renvoie une image d'une note (ici 20)
    public function Quote($bot) {

        // Créer une attache (Image)
        $attachment = new Image('../../images/20.png');

        // Construction du message
        $messageImg = OutgoingMessage::create("C'est pas mal ça ?")
            ->withAttachment($attachment);

        $bot->reply($messageImg);

    }

    //Initialise une nouvelle conversation
    public function Conversation(BotMan $bot)
    {
        $bot->startConversation(new TestConv());
    }


}

//Conversation avec plusieurs questions -> résumé final en rendu ####
class TestConv extends Conversation {

    protected $firstanme;
    protected $email;
    protected $password;
    protected $request;

    public function askName() {

        $this->ask('Quel est ton nom ?', function(Answer $answer) {

            //Récupération de la réponse
            $this->firstname = $answer->getText();

            //Sauvegarde des infos de l'utilisateur
            $this->bot->userStorage()->save([
                'firstname' => $this->firstname,
            ]);

            $this->say("Salut ". $this->firstname.", moi c'est BlogBot ");
            $this->askEmail();
        });
    }

    public function askEmail() {
        $this->ask('Quel est ton email ?', function(Answer $answer) {

            $this->email = $answer->getText();

            //Vérification du mail (type mail)
            $validateur = Validator::make(['email' => $this->email], [
                'email' => 'email',
            ]);

            if($validateur->fails()){
                return $this->repeat("Un mail valide, svp");
            }

            //Sauvegarde des infos de l'utilisateur
            $this->bot->userStorage()->save([
                'email' => $this->email,
            ]);

            $this->say("Super !");
            $this->askPassword();
        });
    }

    public function askPassword(){

        $this->ask('Quel est ton mot de passe ?', function(Answer $answer) {
            $this->password = $answer->getText();

            $this->bot->userStorage()->save([
                'password' => $this->password,
                'password_hash' => Hash::make($this->password),
            ]);

            $this->askRequest();
        });

    }

    public function askRequest() {

        $question = Question::create("Que veux-tu faire ?")
            ->addButton(Button::create('Ajouter')->value("Ajout de l'utilisateur"))
            ->addButton(Button::create('Modifier')->value("Mise à jour de l'utilisateur"))
            ->addButton(Button::create('Supprimer')->value("Suppression de l'utilisateur"));

        $this->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $this->request = $answer->getValue();

                $this->bot->userStorage()->save([
                    'request' => $this->request,
                ]);
            }
            $this->resumeRequest();
        });

    }

    public function resumeRequest() {

        //Récupère le storage de l'utilisateur
        $user = $this->bot->userStorage()->find();

        $message = '-------------------------------------- <br>';
        $message .= 'Requête : ' . $user->get('request') . '<br>';
        $message .= 'Nom : ' . $user->get('firstname') . '<br>';
        $message .= 'Mail : ' . $user->get('email') . '<br>';
        $message .= 'Mot de passe : ' . $user->get('password') . '<br>';
        $message .= 'Mot de passe hasher : ' . $user->get('password_hash') . '<br>';
        $message .= '---------------------------------------';

        $this->say("Parfait. Résumons tout ! <br><br>" . $message);

    }

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->askName();
    }
}

