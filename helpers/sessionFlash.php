<?php

//! SessionFlash
class SessionFlash
{
    /** //! set(string $message)
     * @param string $message
     * 
     * @return void
     */
    public static function set(string $message): void
    {
        $_SESSION["message"] = $message;
    }

    /** //! unset($key)
     * @param mixed $key
     * 
     * @return void
     */
    public static function unset($key): void
    {
        unset($_SESSION[$key]);
    }

    /** //! display($key)
     * @param mixed $key
     * 
     * @return string
     */
    public static function display($key): string
    {
        $display = $_SESSION[$key] ?? '';
        SessionFlash::unset($key);
        return $display;
    }
}
