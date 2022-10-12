<?php

namespace App\config;

class Session
{
    public const FLASH_KEY = "flashMessages";
    public function __construct()
    {
        if (!session_id()) {
            session_start();
        }
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key => &$flashMessage) {
            $flashMessage['read'] = true;
            //  ($flashMessage);
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }
    public function setFlash($key, $msg)
    {
        $_SESSION[self::FLASH_KEY][$key] = [
            'message' => $msg,
            'read' => true
        ];
    }
    public function getFlash($key)
    {
        return  $_SESSION[self::FLASH_KEY][$key]['message'] ?? 0;
    }
    public function setItem($key, $item)
    {
        return $_SESSION[$key] = $item;
    }
    public function getItem($key)
    {
        if (in_array(
            $key,
            array_keys($_SESSION)
        )) {
            return  $_SESSION[$key];
        } else {
            return '';
        }
    }
    public function sessionGet($key)
    {
        return $_SESSION[$key];
    }
    public function sessionUnset($key)
    {
        if (in_array(
            $key,
            array_keys($_SESSION)
        )) {
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public function __destruct()
    {
        $flashMessages = $_SESSION[self::FLASH_KEY] ?? [];
        foreach ($flashMessages as $key =>  &$flashMessage) {
            if ($flashMessage['read']) {
                unset($flashMessages[$key]);
            }
        }
        $_SESSION[self::FLASH_KEY] = $flashMessages;
    }
}