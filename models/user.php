<?php
//! require once
require_once(dirname(__FILE__) . '/../utils/database.php');


//! CLASS USER
class User
{
    private int $id;
    private string $ip;
    private string $registered_at;
    private string $validated_at;
    private string $email;
    private string $pseudo;
    private string $password;
    private string $id_avatars;
    private string $id_roles;


    /** //! construct
     * @param int $id
     * @param string $ip
     * @param string $registered_at
     * @param string $email
     * @param string $pseudo
     * @param string $password
     * @param string $id_avatars
     * @param string $id_roles
     * @param string $validated_at
     */
    function __construct(
        string $ip = '',
        string $registered_at = '',
        string $email = '',
        string $pseudo = '',
        string $password = '',
        string $id_avatars = '',
        string $id_roles = '',
        string $validated_at = ''
    ) {
        $this->setIp($ip);
        $this->setRegistered_at($registered_at);
        $this->setEmail($email);
        $this->setPseudo($pseudo);
        $this->setPassword($password);
        $this->setId_avatars($id_avatars);
        $this->setId_roles($id_roles);
        $this->SetValidated_at($validated_at);
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


    /** //! getIp()
     * @return string
     */
    public function getIp(): string
    {
        return $this->ip;
    }
    /** //! setIp(string $ip)
     * @param string $ip
     * 
     * @return void
     */
    public function setIp(string $ip): void
    {
        $this->ip = $ip;
    }


    /** //! getRegistered_at()
     * @return string
     */
    public function getRegistered_at(): string
    {
        return $this->registered_at;
    }
    /** //! setRegistered_at(string $registered_at)
     * @param string $registered_at
     * 
     * @return void
     */
    public function setRegistered_at(string $registered_at): void
    {
        $this->registered_at = $registered_at;
    }


    /** //! getValidated_at()
     * @return string
     */
    public function getValidated_at(): string
    {
        return $this->validated_at;
    }
    /** //! setValidated_at(string $validated_at)
     * @param string $validated_at
     * 
     * @return void
     */
    public function setValidated_at(string $validated_at): void
    {
        $this->validated_at = $validated_at;
    }


    /** //! getEmail()
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }
    /** //! setEmail(string $email)
     * @param string $email
     * 
     * @return void
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }


    /** //! getPseudo()
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }
    /** //! setPseudo(string $pseudo)
     * @param string $pseudo
     * 
     * @return void
     */
    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }


    /** //! getPassword()
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
    /** //! setPassword(string $password)
     * @param string $password
     * 
     * @return void
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }


    /** //! getId_avatars()
     * @return string
     */
    public function getId_avatars(): string
    {
        return $this->id_avatars;
    }
    /** //! setId_avatars(string $id_avatars)
     * @param string $id_avatars
     * 
     * @return void
     */
    public function setId_avatars(string $id_avatars): void
    {
        $this->id_avatars = $id_avatars;
    }


    /** //! getId_roles()
     * @return string
     */
    public function getId_roles(): string
    {
        return $this->id_roles;
    }
    /** //! setId_roles(string $id_roles)
     * @param string $id_roles
     * 
     * @return void
     */
    public function setId_roles(string $id_roles): void
    {
        $this->id_roles = $id_roles;
    }


    /** //! add()
     * @return bool
     */
    public function add(): bool
    {
        try {
            $sql = 'INSERT INTO `users` (`ip`, `registered_at`, `email`, `pseudo`, `password`, `id_avatars`, `id_roles`)
                    VALUES (:ip, :registered_at, :email, :pseudo, :password, :id_avatars, :id_roles);';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':ip', $this->getIp(), PDO::PARAM_STR);
            $sth->bindValue(':registered_at', $this->getRegistered_at(), PDO::PARAM_STR);
            $sth->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $sth->bindValue(':pseudo', $this->getPseudo(), PDO::PARAM_STR);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            $sth->bindValue(':id_avatars', $this->getId_avatars(), PDO::PARAM_STR);
            $sth->bindValue(':id_roles', $this->getId_roles(), PDO::PARAM_STR);

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


    /** //! isEmailExist(string $email)
     * @param string $email
     * 
     * @return bool
     */
    public static function isEmailExist(string $email): bool
    {
        try {
            $sql = 'SELECT `email` FROM `users`
                    WHERE `email` = :email;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);

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


    /** //! isPseudoExist(string $pseudo)
     * @param string $pseudo
     * 
     * @return bool
     */
    public static function isPseudoExist(string $pseudo): bool
    {
        try {
            $sql = 'SELECT `email` FROM `users`
                    WHERE `pseudo` = :pseudo;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);

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


    /** //! delete(int $id)
     * @param int $id
     * 
     * @return bool
     */
    public static function delete(int $id): bool
    {
        try {
            $sql = 'DELETE FROM `trotter`.`users`
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


    /** //! deletePost(int $id)
     * @param int $id
     * 
     * @return bool
     */
    public static function deletePost(int $id): bool
    {
        try {
            $sql = 'DELETE FROM `trotter`.`posts`
                    WHERE `id_user` = :id;'; // request

            $sth = Database::DbConnect()->prepare($sql); // prepare
            $sth->bindValue(':id', $id, PDO::PARAM_INT); //bindValue

            if (!$sth) {
                throw new PDOException();
            } else {
                return $sth->execute();
            }
        } catch (PDOException $e) {
            return false;
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
            $sql = 'SELECT
                        `users`.`id`,
                        `users`.`registered_at`,
                        `users`.`email`,
                        `users`.`pseudo`,
                        `users`.`password`,
                        `users`.`id_roles`,
                        `avatars`.`avatar`
                    FROM `users`
                    LEFT JOIN `avatars`
                    ON `users`.`id_avatars` = `avatars`.`id`
                    WHERE `users`.`id` = :id;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            if (!$sth) {
                throw new PDOException('L\'utilisateur n\'existe pas');
            } else {
                $user = $sth->fetch();
            }

            if (!$user) {
                throw new PDOException('L\'utilisateur n\'existe pas');
            } else {
                return $user;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }


    /** //! getOneByEmail(string $email)
     * @param string $email
     * 
     * @return object
     */
    public static function getOneByEmail(string $email = ''): object
    {
        try {
            $sql = 'SELECT * FROM `users`
                    WHERE `email` = :email;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $sth->execute();

            if (!$sth) {
                throw new PDOException('L\'utilisateur n\'existe pas');
            } else {
                $user = $sth->fetch();
            }

            if (!$user) {
                throw new PDOException('L\'utilisateur n\'existe pas');
            } else {
                return $user;
            }
        } catch (PDOException $e) {
            return $e;
        }
    }


    /** //! getAll()
     * @return array
     */
    public static function getAll(int $offset = 0, int $limit = LIMIT,  $search = null): array
    {
        try {
            $sql = 'SELECT *
                    FROM `users`';
            if (!is_null($search)) {
                $sql .= ' WHERE `pseudo` LIKE :search
                        OR `email` LIKE :search';
            }
            $sql .= ' ORDER BY `registered_at` DESC
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
                $users = $sth->fetchAll();
            }
            return $users;
        } catch (PDOException $e) {
            return [];
        }
    }


    /** //! count()
     * @return int
     */
    public static function count(): int
    {
        try {
            $sql = 'SELECT COUNT(*) FROM `users`;';

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


    /** //! update()
     * @return bool
     */
    public function update(): bool
    {
        try {
            $sql = 'UPDATE `users`
                    SET `password` = :password
                    WHERE `id` = :id;';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $this->getId(), PDO::PARAM_INT);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);

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


    /** //! activate()
     * @return bool
     */
    public function activate(): bool
    {
        try {
            $sql = 'UPDATE `users`
                    SET `validated_at` = :validated_at
                    WHERE `id` = :id;';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':id', $this->getId(), PDO::PARAM_INT);
            $sth->bindValue(':validated_at', $this->getValidated_at(), PDO::PARAM_STR);

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
}
