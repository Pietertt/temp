<?php
      class session {
            public static function is_private($page) : bool{
                  $private = ['dashboard', 'overview', 'comment', 'intranet'];

                  if(in_array($page, $private)){
                        return true;
                  } else {
                        return false;
                  }
            }
      }
?>