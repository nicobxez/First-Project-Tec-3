<?php
/**
 *
 */
 class SuccessMessage extends Message
 {
   public function getMessage (string $message): string
   {
     $message = strip_tags($message);
     return "<div class='alert alert-success msg' role='alert'>$message</div>";
   }
 }

 ?>
