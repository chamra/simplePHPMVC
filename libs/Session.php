<?php
/**
 * Handler the session related logic
 */
class Session
{

    public function init()
    {
      if (session_status() == PHP_SESSION_NONE) {
        session_start();
      }
    }

    //set a session
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        //check if the session is set and return the session
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }

        return false;
    }

    //destroy the session
    public static function destroy()
    {
        session_destroy();
    }
}
