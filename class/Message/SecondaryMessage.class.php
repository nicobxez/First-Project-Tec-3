<?php
/**
 *
 */
 class SecondaryMessage extends Message
 {
   public function getMessage (string $message): string
   {
     $message = strip_tags($message);
     return "<div class='alert alert-secondary msg' role='alert'>$message</div>";
   }
 }

 ?>
