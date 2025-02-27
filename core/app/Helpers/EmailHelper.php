<?php
namespace App\Helpers;
use App\{
  Models\EmailTemplate,
  Models\Setting
};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PHPMailer\PHPMailer\{
  PHPMailer,
  SMTP,
  Exception
};

// require 'vendor/autoload.php';

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require '../vendor/phpmailer/phpmailer/src/Exception.php';
// require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
// require '../vendor/phpmailer/phpmailer/src/SMTP.php';

class EmailHelper{
  public $mail;
  public $setting;
  public function __construct(){
    $this->setting = Setting::first();
    $this->mail = new PHPMailer(true);
    if($this->setting->smtp_check == 1){
      $this->mail->isSMTP();
      $this->mail->Host       = $this->setting->email_host;
      $this->mail->SMTPAuth   = true;
      $this->mail->Username   = $this->setting->email_user;
      $this->mail->Password   = $this->setting->email_pass;
      if ($this->setting->email_encryption == 'ssl') {
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
      } else {
        $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
      }
      $this->mail->Port           = $this->setting->email_port;
      $this->mail->CharSet        = 'UTF-8';
    }
  }
  public function sendTemplateMail(array $emailData){
    $template = EmailTemplate::whereType($emailData['type'])->first();
    try{
      $email_body = preg_replace("/{user_name}/", $emailData['user_name'] ,$template->body);
      $email_body = preg_replace("/{order_cost}/", $emailData['order_cost'] ,$email_body);
      $email_body = preg_replace("/{transaction_number}/", $emailData['transaction_number'] ,$email_body);
      $email_body = preg_replace("/{site_title}/", $this->setting->title ,$email_body);
      $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
      $this->mail->addAddress($emailData['to']);
      $this->mail->isHTML(true);
      $this->mail->Subject = $template->subject;
      $this->mail->Body = $email_body;
      $this->mail->send();
    }
    catch (Exception $e){
    // dd($e->getMessage());
    }
    return true;
  }
  public function sendCustomMail(array $emailData){
    try{
      $this->mail->setFrom($this->setting->email_from, $this->setting->email_from_name);
      $this->mail->addAddress($emailData['to']);
      $this->mail->isHTML(true);
      $this->mail->Subject = $emailData['subject'];
      $this->mail->Body = $emailData['body'];
      $this->mail->send();
      // echo "Mensaje enviado con éxito...";
    }catch (Exception $e){
      // dd($e->getMessage());
      echo "Ocurrio un error al enviar el correo. Error: {$this->mail->ErrorInfo}";
    }
    // exit();
    return true;
  }
  public static function getEmail(){
    $user = Auth::user();
    if(isset($user)){
      $email = $user->email;
    }else{
      $email = Session::get('billing_address')['bill_email'];
    }
    return $email;
  }
}