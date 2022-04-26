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
     * @param string $validated_at
     * @param string $email
     * @param string $pseudo
     * @param string $password
     * @param string $id_avatars
     * @param string $id_roles
     */
    function __construct(
        string $ip = '',
        string $registered_at = '',
        string $validated_at = '',
        string $email = '',
        string $pseudo = '',
        string $password = '',
        string $id_avatars = '',
        string $id_roles = ''
    ) {
        $this->setIp($ip);
        $this->setRegistered_at($registered_at);
        $this->SetValidated_at($validated_at);
        $this->setEmail($email);
        $this->setPseudo($pseudo);
        $this->setPassword($password);
        $this->setId_avatars($id_avatars);
        $this->setId_roles($id_roles);
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
    /** //! setValidated_at(string $Validated_at)
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
     * @return string
     */
    public function add(): string
    {
        try {
            $sql = 'INSERT INTO `trotter`.`users` (`ip`, `registered_at`, `validated_at`, `email`, `pseudo`, `password`, `id_avatars`, `id_roles`)
                    VALUES (:ip, :registered_at, :validated_at, :email, :pseudo, :password, :id_avatars, :id_roles);';

            $sth = $this->pdo->prepare($sql);
            $sth->bindValue(':ip', $this->getIp(), PDO::PARAM_STR);
            $sth->bindValue(':registered_at', $this->getRegistered_at(), PDO::PARAM_STR);
            $sth->bindValue(':validated_at', $this->getValidated_at(), PDO::PARAM_STR);
            $sth->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $sth->bindValue(':pseudo', $this->getPseudo(), PDO::PARAM_STR);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            $sth->bindValue(':id_avatars', $this->getId_avatars(), PDO::PARAM_STR);
            $sth->bindValue(':id_roles', $this->getId_roles(), PDO::PARAM_STR);

            if (!$sth) {
                throw new PDOException();
            } else {
                return $sth->execute();
            }
        } catch (PDOException $e) {
            return false;
        }
    }


    /** //! isExist(string $email)
     * @param string $email
     * 
     * @return bool
     */
    public static function isExist(string $email): bool
    {
        try {
            $sql = 'SELECT `email` FROM `trotter`.`users`
                    WHERE `email` = :email;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);

            $sth->execute(); // execute

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
                return $sth->execute();
            }
        } catch (PDOException $e) {
            return false;
        }
    }


    /** //! getOne(int $id)
     * @param int $id
     * 
     * @return object
     */
    public static function getOne(int $id): object
    {
        try {
            $sql = 'SELECT * FROM `trotter`.`users`
                    WHERE `id` = :id;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();

            if (!$sth) {
                throw new PDOException();
            } else {
                $user = $sth->fetch();
            }

            if (!$user) {
                throw new PDOException();
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
    public static function getAll(int $firstUser, int $perPage): array
    {
        try {
            $sql = 'SELECT * FROM `trotter`.`users`
                    ORDER BY `registered_at` ASC
                    LIMIT :firstUser, :perPage;';

            $sth = Database::DbConnect()->prepare($sql);
            $sth->bindValue(':firstUser', $firstUser, PDO::PARAM_INT);
            $sth->bindValue(':perPage', $perPage, PDO::PARAM_INT);

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
            $sql = 'SELECT COUNT(*) FROM `trotter`.`users`;';

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








    // /** //! update()
    //  * @return bool
    //  */
    // public function update(): bool
    // {
    //     try {
    //         $sql = 'UPDATE `trotter`.`users`
    //                 SET `lastname` = :lastname, `firstname` = :firstname, `phone` = :phone, `mail` = :mail, `birthdate` = :birthdate
    //                 WHERE `id` = :id;'; // request

    //         $sth = $this->pdo->prepare($sql); // prepare
    //         $sth->bindValue(':id', $this->getId(), PDO::PARAM_INT); //bindValue
    //         $sth->bindValue(':lastname', $this->getLastname(), PDO::PARAM_STR);
    //         $sth->bindValue(':firstname', $this->getFirstname(), PDO::PARAM_STR);
    //         $sth->bindValue(':phone', $this->getPhone(), PDO::PARAM_STR);
    //         $sth->bindValue(':mail', $this->getMail(), PDO::PARAM_STR);
    //         $sth->bindValue(':birthdate', $this->getBirthdate(), PDO::PARAM_STR);

    //         if (!$sth) {
    //             throw new PDOException();
    //         } else {
    //             return $sth->execute();
    //         }
    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }

    // /** //! deleteAppointments(int $id)
    //  * @param int $id
    //  * 
    //  * @return bool
    //  */
    // public static function deleteAppointments(int $id): bool
    // {
    //     try {
    //         $sql = 'DELETE FROM `hospitale2n`.`appointments`
    //                 WHERE `idPatients` = :id;'; // request

    //         $sth = Database::DbConnect()->prepare($sql); // prepare
    //         $sth->bindValue(':id', $id, PDO::PARAM_INT); //bindValue

    //         if (!$sth) {
    //             throw new PDOException();
    //         } else {
    //             return $sth->execute();
    //         }
    //     } catch (PDOException $e) {
    //         return false;
    //     }
    // }

    // /** //! search(string $search)
    //  * @param string $search
    //  * 
    //  * @return array
    //  */
    // public static function search(string $search): array
    // {
    //     try {
    //         $sql = 'SELECT * FROM `hospitale2n`.`patients`
    //                 WHERE `lastname` LIKE :search
    //                 OR `firstname` LIKE :search
    //                 ORDER BY `lastname` ASC;'; // request


    //         $sth = Database::DbConnect()->prepare($sql); // prepare
    //         $sth->bindValue(':search', $search . '%', PDO::PARAM_STR); //bindValue

    //         if (!$sth) {
    //             throw new PDOException();
    //         } else {
    //             $sth->execute(); // execute
    //         }

    //         if (!$sth) {
    //             throw new PDOException();
    //         } else {
    //             $patients = $sth->fetchAll(); // fetchAll
    //         }
    //         return $patients;
    //     } catch (PDOException $e) {
    //         return [];
    //     }
    // }
}
