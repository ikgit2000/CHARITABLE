<?php
// Email class interacting with PHPMailer to send email
namespace helpers;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email{

    protected $receiver;
    protected $sender;
    protected $password;
    protected $mail;
    protected $template;

    /**
     * @param $email
     */
    public function __construct($email)
    {
        $this->receiver = $email;
        $this->sender = '2ndyrgroupprojectis16@gmail.com';
        $this->password = 'bqanyybtjdlnjriq';

        $this->mail = new PHPMailer();
        $this->mail->isSMTP();                                     //Send using SMTP
        $this->mail->Host       = 'smtp.gmail.com';                //Set the SMTP server to send through
        $this->mail->SMTPAuth   = true;                            //Enable SMTP authentication
        $this->mail->Username   = $this->sender;                   //SMTP username
        $this->mail->Password   = $this->password;                 //SMTP password
        $this->mail->SMTPSecure = 'tls';                           //Enable implicit TLS encryption
        $this->mail->Port       = 587;                             //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    }

    // send OTP verification email

    /**
     * @param $receiverName
     * @param $OTPCode
     * @return void
     */
    public function sendVerificationEmail($receiverName, $OTPCode){
        $this->template = URLROOT . "/templates/email.php";

        try{
            $this->mail->setFrom($this->sender, 'charitAble');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "charitAble Account Verification";

            if(file_exists($this->template)){
                $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello ". $receiverName . ",</h1>" .file_get_contents($this->template).
                    "<br><h4 style='text-align: center;'>The verification code is : <b>" . $OTPCode ."<b></h4>";
            }
            else{
                $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello ". $receiverName . ",</h1>
                    <h2 style='color: #0A2558;'>Welcome To charitAble</h2>
                    <h4>Before using our service there is one more little thing to do. Please use the below OTP to verify your account.</h4>
                    <h3 style='color: #0A2558;'>Thank You!</h3>
                    <h4 style='text-align: center;'>The verification code is : <b>" .$OTPCode. "<b></h4>";
            }
            $this->mail->send();
        }
        catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }

    public function sendResetEmail($receiverName, $url){
//        $this->template = URLROOT . "/templates/email.php";

        try{
            $this->mail->setFrom($this->sender, 'charitAble');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "charitAble Password Reset Email";

            if(file_exists($this->template)){
                $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello ". $receiverName . ",</h1>" .file_get_contents($this->template).
                    "<br><h4 style='text-align: center;'>The verification code is : <b>" . $url ."<b></h4>";
            }
            else{
                $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello ". $receiverName . ",</h1>
                    <h2 style='color: #0A2558;'>Welcome To CharitAble</h2>
                    <h4>Before using our service there is one more little thing to do. Please use the below OTP to verify your account.</h4>
                    <h3 style='color: #0A2558;'>Thank You!</h3>
                    <a href=".$url.">><h4 style='text-align: center;'>The password change URL is : <b>" .$url. "<b></h4></a>";
            }
            $this->mail->send();
        }
        catch(Exception $e){
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
    public function sendHighPriorityEmail($receiverName){
        try {
            $this->mail->setFrom($this->sender, 'CharitAble');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "High Priority Request ";
            $receiverName = "<?php echo $receiverName?>";

            $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello " . $receiverName . ",</h1>
                    <h2 style='color: #0A2558;'>Welcome To CharitAble</h2>
                    <h3 style='text-align: center;color: crimson'>Hey Its an Emergency</h3>
                    <h4><?php echo $receiverName ?> have a emegency request that need to be  accepted. You can view more details at ongoing request tab in charitable.</h4>
                    <h3 style='color: #0A2558;'>Thank You!</h3>";
            $this->mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }

    }
    public function sendReqAcceptanceEmail()
    {
        try {
            $this->mail->setFrom($this->sender, 'CharitAble');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "Donation Request Accepted";
            $receiverName = "User";

            $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello " . $receiverName . ",</h1>
                    <h2 style='color: #0A2558;'>Welcome To CharitAble</h2>
                    <h4>Your donation request has been accepted. You can view more details at ongoing request tab.</h4>
                    <h3 style='color: #0A2558;'>Thank You!</h3>";
            $this->mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }
    }
    public function requestAcceptanceMail(){
        try {
            $this->mail->setFrom($this->sender, 'CharitAble');
            $this->mail->addAddress($this->receiver);
            $this->mail->addReplyTo($this->sender);

            $this->mail->isHTML(true);
            $this->mail->Subject = "Donation Request Accepted";
            $receiverName = "User";

            $this->mail->Body = "<h1 style='text-align: center; margin-top: 40px;'>Hello " . $receiverName . ",</h1>
                    <h2 style='color: #0A2558;'>Welcome To CharitAble</h2>
                    <h4>Your donation request has been accepted. You can view more details at ongoing request tab.</h4>
                    <h3 style='color: #0A2558;'>Thank You!</h3>";
            $this->mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$this->mail->ErrorInfo}";
        }


    }
    public function highPriorityMail($receiverName, $data){



    }
}

//TODO : Reset Password