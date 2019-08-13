<?php
/**
 *
 */
 class MessageFactory
 {
   public static function createMessage ($type)
   {
     switch ($type)
     {
       case 'successMessage':
         return new SuccessMessage();
         break;
       case 'infoMessage':
         return new InfoMessage();
         break;
       case 'secondaryMessage':
         return new SecondaryMessage();
         break;
       default:
         return false;
         break;
     }
   }
 }
 ?>
