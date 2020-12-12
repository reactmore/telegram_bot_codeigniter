<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hook_controller extends CI_Controller {

private $telebot = null; 
    
     public function __construct()
    {
        parent::__construct();
        //check user
        $this->telebot = require APPPATH . '/config/telebot.php';
      
    }
    
  public function index() {
    // Load composer
    require_once APPPATH . "third_party/telegram/vendor/autoload.php";
  
    try {
      // Create Telegram API object
      $telegram = new Longman\TelegramBot\Telegram($this->telebot['api_key'], $this->telebot['bot_username']);
      
      // Listadmin
      $telegram->enableAdmins($this->telebot['admins']);
      
      // Add commands paths containing your custom commands
      $telegram->addCommandsPaths($this->telebot['commands']['paths']);
      
      // Set custom Download and Upload paths
      $telegram->setDownloadPath($this->telebot['paths']['download']);
      $telegram->setUploadPath($this->telebot['paths']['upload']);
      
      // Load all command-specific configurations
      // foreach ($this->telebot['commands']['configs'] as $command_name => $command_config) {
      //     $telegram->setCommandConfig($command_name, $command_config);
      // }

      // Requests Limiter (tries to prevent reaching Telegram API limits)
      $telegram->enableLimiter($this->telebot['limiter']);
      
      // Enable MySQL if required
      $telegram->enableMySql($this->telebot['mysql']);

      // Handle telegram webhook request
      $telegram->handle();
    } catch (Longman\TelegramBot\Exception\TelegramException $e) {
      // Silence is golden!
      // log telegram errors
      // echo $e->getMessage();
    }
  }
}