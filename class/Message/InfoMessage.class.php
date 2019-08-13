<?php
/**
 *
 */
 class InfoMessage extends Message
 {
   public function getMessage (string $message): string
   {
     $message = strip_tags($message);
     return "<div class='alert alert-info msg' role='alert'>$message</div>";
   }
 }

 ?>
