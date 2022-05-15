<?php
//! require once
require_once(dirname(__FILE__) . '/../utils/database.php');


//! CLASS POST
class Post
{
    private int $id;
    private string $post_at;
    private string $post;
    private int $id_user;


    /** //! construct
     * @param string $post_at
     * @param string $post
     * @param int $id_user
     */
    function __construct(
        string $post_at = '',
        string $post = '',
        int $id_user = 0
    ) {
        $this->setPost_at($post_at);
        $this->setPost($post);
        $this->setId_user($id_user);
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


    /** //! getPost_at()
     * @return string
     */
    public function getPost_at(): string
    {
        return $this->post_at;
    }
    /** //! setPost_at(string $post_at)
     * @param string $post_at
     * 
     * @return void
     */
    public function setPost_at(string $post_at): void
    {
        $this->post_at = $post_at;
    }


    /** //! getPost()
     * @return string
     */
    public function getPost(): string
    {
        return $this->post;
    }
    /** //! setPost(string $post)
     * @param string $post
     * 
     * @return void
     */
    public function setPost(string $post): void
    {
        $this->post = $post;
    }


    /** //! getId_user()
     * @return int
     */
    public function getId_user(): int
    {
        return $this->id_user;
    }
    /** //! setId_user(int $id_user)
     * @param int $id_user
     * 
     * @return void
     */
    public function setId_user(int $id_user): void
    {
        $this->id_user = $id_user;
    }


    /** //! add()
     * @return bool
     */
    public function add(): bool
    {
        try {
            $sql = 'INSERT INTO `posts` (`post_at`, `post`, `id_user`)
                    VALUES (:post_at, :post, :id_user);';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':post_at', $this->getPost_at(), PDO::PARAM_STR);
            $sth->bindValue(':post', $this->getPost(), PDO::PARAM_STR);
            $sth->bindValue(':id_user', $this->getId_user(), PDO::PARAM_INT);

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
    public static function getAll(int $offset = LIMIT, int $limit = 0, $search = null): array
    {
        try {
            $sql = 'SELECT
                    `posts`.`id` AS `id`,
                    `posts`.`post_at`,
                    `posts`.`post`,
                    `posts`.`id_user` AS `id_user`,
                    `users`.`pseudo`,
                    `avatars`.`avatar`
                    FROM `trotter`.`posts`
                    LEFT JOIN `users` ON `posts`.`id_user` = `users`.`id`
                    LEFT JOIN `avatars` ON `avatars`.`id` = `users`.`id_avatars`';
            if (!is_null($search)) {
                $sql .= ' WHERE `posts`.`post` LIKE :search';
            }
            $sql .= ' ORDER BY `post_at` DESC
                    LIMIT :offset, :limit;';

            $sql2 = 'SELECT `banned`.`id`,
                    `banned`.`id_users`
                    FROM `banned`';

            // $sql3 = 'SELECT `likes`.`id_posts`,
            //         `likes`.`id_users`
            //         FROM `likes`';

            $sth = Database::DbConnect()->prepare($sql);
            $sth2 = Database::DbConnect()->prepare($sql2);
            // $sth3 = Database::DbConnect()->prepare($sql3);

            $sth->bindValue(':offset', $offset, PDO::PARAM_INT);
            $sth->bindValue(':limit', $limit, PDO::PARAM_INT);

            if (!is_null($search)) {
                $sth->bindValue(':search', "%$search%", PDO::PARAM_STR);
            }

            if (!$sth) {
                throw new PDOException();
            } else {
                $sth->execute();
                $sth2->execute();
                // $sth3->execute();
                $posts = $sth->fetchAll();
                $banned = $sth2->fetchAll();
                // $likes = $sth3->fetchAll();
                $array = [$posts, $banned];
            }

            return $array;
        } catch (PDOException $e) {
            return [];
        }
    }


    /** //! getLastByIdUser()
     * @return array
     */
    public static function getLastByIdUser(int $id = 0): array
    {
        try {
            $sql = 'SELECT *
                    FROM `trotter`.`posts`
                    WHERE `id_user` = :id
                    ORDER BY `post_at`
                    LIMIT 0, 3;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);

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


    /** //! getOneById(int $id)
     * @param int $id
     * 
     * @return object
     */
    public static function getOneById(int $id): object
    {
        try {
            $sql = 'SELECT *
                    FROM `trotter`.`posts`
                    WHERE `posts`.`id` = :id;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            if (!$sth) {
                throw new PDOException('Le message n\'existe pas');
            } else {
                $user = $sth->fetch();
            }

            if (!$user) {
                throw new PDOException('Le message n\'existe pas');
            } else {
                return $user;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }


    /** //! delete(int $id)
     * @param int $id
     * 
     * @return bool
     */
    public static function delete(int $id): bool
    {
        try {
            $sql = 'DELETE FROM `trotter`.`posts`
                    WHERE `id` = :id;';

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


    /** //! update()
     * @return bool
     */
    public function update(): bool
    {
        try {
            $sql = 'UPDATE `posts`
                    SET `post` = :post
                    WHERE `id` = :id;';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $this->getId(), PDO::PARAM_INT);
            $sth->bindValue(':post', $this->getPost(), PDO::PARAM_STR);

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


    /** //! count()
     * @return int
     */
    public static function count(): int
    {
        try {
            $sql = 'SELECT COUNT(*) FROM `trotter`.`posts`;';

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
