<?php
//! require once
require_once(dirname(__FILE__) . '/../utils/database.php');


//! CLASS REPORTED
class Reported
{
    private int $id;
    private string $reported_at;
    private string $message;
    private int $id_posts;
    private int $id_users;


    /** //! construct
     * @param string $post_at
     * @param string $post
     * @param int $id_user
     */
    function __construct(
        string $reported_at = '',
        string $message = '',
        int $id_posts = 0,
        int $id_users = 0
    ) {
        $this->setReported_at($reported_at);
        $this->setMessage($message);
        $this->setId_posts($id_posts);
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


    /** //! getReported_at()
     * @return string
     */
    public function getReported_at(): string
    {
        return $this->reported_at;
    }
    /** //! setReported_at(string $reported_at)
     * @param string $reported_at
     * 
     * @return void
     */
    public function setReported_at(string $reported_at): void
    {
        $this->reported_at = $reported_at;
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


    /** //! getId_posts()
     * @return int
     */
    public function getId_posts(): int
    {
        return $this->id_posts;
    }
    /** //! setId_posts(int $id_posts)
     * @param int $id_posts
     * 
     * @return void
     */
    public function setId_posts(int $id_posts): void
    {
        $this->id_posts = $id_posts;
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
            $sql = 'INSERT INTO `reported` (`reported_at`, `message`, `id_posts`, `id_users`)
                    VALUES (:reported_at, :message, :id_posts, :id_users);';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':reported_at', $this->getReported_at(), PDO::PARAM_STR);
            $sth->bindValue(':message', $this->getMessage(), PDO::PARAM_STR);
            $sth->bindValue(':id_posts', $this->getId_posts(), PDO::PARAM_INT);
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


    /** //! getAll()
     * @return array
     */
    public static function getAll(int $offset = LIMIT, int $limit = 0,  $search = null): array
    {
        try {
            $sql = 'SELECT
                    `reported`.`id` AS `id`,
                    `reported`.`reported_at`,
                    `reported`.`message`,
                    `reported`.`id_users` AS `id_user`,
                    `posts`.`id` AS `id_post`,
                    `posts`.`post` AS `post`,
                    `posts`.`post_at` AS `post_at`
                    FROM `trotter`.`reported`
                    LEFT JOIN `posts` ON `posts`.`id` = `reported`.`id_posts`';
            if (!is_null($search)) {
                $sql .= ' WHERE `reported`.`message` LIKE :search';
            }
            $sql .= ' ORDER BY `reported_at` DESC
                    LIMIT :offset, :limit;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->bindValue(':limit', $limit, PDO::PARAM_INT);

            if (!is_null($search)) {
                $sth->bindValue(':search', "%$search%", PDO::PARAM_STR);
            }

            if (!$sth) {
                throw new PDOException();
            } else {
                $sth->execute();
                $posts = $sth->fetchAll();
            }

            return $posts;
        } catch (PDOException $e) {
            return [];
        }
    }


    /** //! delete(int $id)
     * @param int $id
     * 
     * @return bool
     */
    public static function deleteByIdPost(int $id): bool
    {
        try {
            $sql = 'DELETE FROM `trotter`.`reported`
                    WHERE `id_posts` = :id;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);

            if (!$sth) {
                throw new PDOException();
            } else {
                $sth->execute();

                $count = $sth->rowCount();
                return ($count <= 0) ? false : true;
            }
        } catch (PDOException $e) {
            return false;
        }
    }


    /** //! count()
     * @return int
     */
    public static function count(): int
    {
        try {
            $sql = 'SELECT COUNT(*) FROM `trotter`.`reported`;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->execute();

            if (!$sth) {
                throw new PDOException();
            } else {
                $count = $sth->fetchColumn();
            }
            return $count;
        } catch (PDOException $e) {
            return 0;
        }
    }
}
