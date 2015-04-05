<?php
class Helpers {
   public static function bytesToHuman($size) {
      if ($size >= 1 << 30) {
         return number_format($size / (1 << 30), 2) . ' GB';
      }
      if ($size >= 1 << 20) {
         return number_format($size / (1 << 20), 2) . ' MB';
      }
      if ($size >= 1 << 10) {
         return number_format($size / (1 << 10), 2) . ' KB';
      }

      return number_format($size) . ' bytes';
   }
}
