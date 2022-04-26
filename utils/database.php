<?php
//! require once
require_once(dirname(__FILE__) . '/../config/config.php');

//! DATABASE
class Database
{
    /** //! connect
     * @return object
     */
    public static function DbConnect(): object
    {
        try {
            $pdo = new PDO(DSN, ACCOUNT, PASS, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);
        } catch (PDOException $e) {
            return $e;
        }
        return $pdo;
    }
}
