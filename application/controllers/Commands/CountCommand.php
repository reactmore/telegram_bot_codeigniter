<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Keyboard;
use Longman\TelegramBot\Entities\KeyboardButton;
use Longman\TelegramBot\Entities\ServerResponse;
use Longman\TelegramBot\Exception\TelegramException;
use Longman\TelegramBot\Request;

class CountCommand extends UserCommand
{
 
  protected $name = 'Count';

  protected $description = 'Count command';

  protected $usage = '/count';

  protected $version = '1.0.0';

  protected $private_only = true;

  public function execute(): ServerResponse
  {
    // If you use deep-linking, get the parameter like this:
    // $deep_linking_parameter = $this->getMessage()->getText(true);

    $message = $this->getMessage();

    $chat = $message->getChat();
    $user = $message->getFrom();
    $text = trim($message->getText(true));
    $chat_id = $chat->getId();
    $user_id = $user->getId();




    $data = [
      'chat_id' => $chat_id,
      'text' => "Lakukan Test Hitung Mundur",
    ];


    $result = Request::sendMessage($data);
    sleep(1);

    if ($result->isOk()) {
      $data = [
        'chat_id' => $message->getChat()->getId(),
        'message_id' => $result->getResult()->getMessageId(),
        'text' => '3',
        
      ];

      $result = Request::editMessageText($data);
    }

    sleep(1);

    if ($result->isOk()) {
      $data = [
        'chat_id' => $message->getChat()->getId(),
        'message_id' => $result->getResult()->getMessageId(),
        'text' => '2',
       
      ];

      $result = Request::editMessageText($data);
    }

    sleep(1);

    if ($result->isOk()) {
      $data = [
        'chat_id' => $message->getChat()->getId(),
        'message_id' => $result->getResult()->getMessageId(),
        'text' => '1',
        
      ];

      $result = Request::editMessageText($data);
    }

    sleep(1);

    if ($result->isOk()) {
      $data = [
        'chat_id' => $message->getChat()->getId(),
        'message_id' => $result->getResult()->getMessageId(),
        'text' => '🚀🚀🚀 Gooooo!',
       
      ];

      return Request::editMessageText($data);
    }


  }
}