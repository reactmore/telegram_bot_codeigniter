<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . "third_party/telegram/vendor/autoload.php";

class Setunset_controller extends CI_Controller {
    
    private $telebot = null; 
    
     public function __construct()
    {
        parent::__construct();
        //check user
        $this->telebot = require APPPATH . '/config/telebot.php';
      
    }


  public function set() {
    // Load composer
    $hook_url = base_url() . 'hook-bot';
    try {
      // Create Telegram API object
      $telegram = new Longman\TelegramBot\Telegram($this->telebot['api_key'], $this->telebot['bot_username']);

      // Set webhook
      $result = $telegram->setWebhook($hook_url);
      if ($result->isOk()) {
        echo $result->getDescription();
      }
    } catch (Longman\TelegramBot\Exception\TelegramException $e) {
      // log telegram errors
      // echo $e->getMessage();
    }
  }
  
  public function unset() {
    
    
    try {
    // Create Telegram API object
    $telegram = new Longman\TelegramBot\Telegram($this->telebot['api_key'], $this->telebot['bot_username']);

    // Unset / delete the webhook
    $result = $telegram->deleteWebhook();

    echo $result->getDescription();
    } catch (Longman\TelegramBot\Exception\TelegramException $e) {
        echo $e->getMessage();
    }
  }
  
  
  
}