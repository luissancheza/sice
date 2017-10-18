<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_PHPMailer {
  function __construct() {
    require_once('PHPMailer/class.phpmailer.php');
    require_once('PHPMailer/class.smtp.php');
  }
}
?>