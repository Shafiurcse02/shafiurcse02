<?php

class Email {

    //put your code here
    //Receiver of the mail
    private $To;
    //Sender of the mail
    private $From;
    //Messsege mail
    private $Messege;
    private $subject;
    private $Subject;

    //Constructor
    function __construct($subject, $From, $Messege) {
        $this->To = "shafiurcse@gmail.com";
        $this->subject = $subject;
        $this->From = $From;
        $this->Messege = $Messege;
    }
    function sendMail() {
        $header = "From " . $this->From;
        if (!empty($this->To)&&!empty($this->subject) && !empty($this->Messege) && !empty($this->From)) {
          return @mail($this->To, $this->Subject, $this->Messege,$header);
        }
    }

}

?>
