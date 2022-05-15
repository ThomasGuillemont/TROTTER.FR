<?php
//! require once
require_once(dirname(__FILE__) . '/../utils/database.php');


//! CLASS LIKE
class Like
{
    private int $id;
    private string $like_at;
    private int $id_posts;
    private int $id_users;


    /** //! construct
     * @param string $like_at
     * @param int $id_posts
     * @param int $id_users
     */
    function __construct(
        string $like_at = '',
        int $id_posts = 0,
        int $id_users = 0
    ) {
        $this->setLike_at($like_at);
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


    /** //! getLike_at()
     * @return string
     */
    public function getLike_at(): string
    {
        return $this->like_at;
    }
    /** //! setLike_at(string $like_at)
     * @param string $like_at
     * 
     * @return void
     */
    public function setLike_at(string $like_at): void
    {
        $this->like_at = $like_at;
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
            $sql = 'INSERT INTO `likes` (`like_at`, `id_posts`, `id_users`)
                    VALUES (:like_at, :id_posts, :id_users);';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':like_at', $this->getLike_at(), PDO::PARAM_STR);
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


    /** //! delete(int $id_post, $id_user)
     * @param int $id_post
     * @param int $id_user
     * 
     * @return bool
     */

    public static function delete(int $id_post, int $id_user): bool
    {
        try {
            $sql = 'DELETE FROM `likes`
                    WHERE `id_posts` = :id_post
                    AND `id_users` = :id_user;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':id_post', $id_post, PDO::PARAM_INT);
            $sth->bindValue(':id_user', $id_user, PDO::PARAM_INT);

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
}
