<?php
//! require once
require_once(dirname(__FILE__) . '/../utils/database.php');


//! CLASS BANNED
class Banned
{
    private int $id;
    private string $message;
    private string $banned_at;
    private int $id_users;


    /** //! construct
     * @param string $message
     * @param string $banned_at
     * @param int $id_user
     */
    function __construct(
        string $message = '',
        string $banned_at = '',
        int $id_users = 0
    ) {
        $this->setMessage($message);
        $this->setBanned_at($banned_at);
        $this->setId_users($id_users);
        //! pdo
        $this->pdo = Database::dbConnect();
    }


    /** //! getId()
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
    /** //! setId(int $id)
     * @param int $id
     * 
     * @return void
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


    /** //! getMessage()
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
    /** //! setMessage(string $message)
     * @param string $message
     * 
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }


    /** //! getBanned_at()
     * @return string
     */
    public function getBanned_at(): string
    {
        return $this->banned_at;
    }
    /** //! setBanned_at(string $banned_at)
     * @param string $banned_at
     * 
     * @return void
     */
    public function setBanned_at(string $banned_at): void
    {
        $this->banned_at = $banned_at;
    }


    /** //! getId_users()
     * @return int
     */
    public function getId_users(): int
    {
        return $this->id_users;
    }
    /** //! setId_users(int $id_users)
     * @param int $id_users
     * 
     * @return void
     */
    public function setId_users(int $id_users): void
    {
        $this->id_users = $id_users;
    }


    /** //! add()
     * @return bool
     */
    public function add(): bool
    {
        try {
            $sql = 'INSERT INTO `banned` (`message`, `banned_at`, `id_users`)
                    VALUES (:message, :banned_at, :id_users);';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':message', $this->getMessage(), PDO::PARAM_STR);
            $sth->bindValue(':banned_at', $this->getBanned_at(), PDO::PARAM_STR);
            $sth->bindValue(':id_users', $this->getId_users(), PDO::PARAM_INT);

            $sth->execute();

            if (!$sth) {
                throw new PDOException();
            } else {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }


    /** //! isBanned(int $id)
     * @param int $id
     * 
     * @return bool
     */
    public static function isBanned(int $id): bool
    {
        try {
            $sql = 'SELECT `id_users` FROM `banned`
                    WHERE `id_users` = :id;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);

            $sth->execute();

            if (empty($sth->fetchAll())) {
                return false;
            } else {
                return true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}
