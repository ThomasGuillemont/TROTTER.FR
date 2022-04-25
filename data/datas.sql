CREATE DATABASE IF NOT EXISTS `trotter`;

-- Table: avatars
CREATE TABLE IF NOT EXISTS `trotter`.`avatars`(
        `id`     Int  Auto_increment  NOT NULL ,
        `avatar` Varchar (100) NOT NULL
	,CONSTRAINT avatars_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

-- Table: roles
CREATE TABLE IF NOT EXISTS `trotter`.`roles`(
        id   Int  Auto_increment  NOT NULL ,
        role Varchar (25) NOT NULL
	,CONSTRAINT roles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;

-- Table: users
CREATE TABLE IF NOT EXISTS `trotter`.`users`(
        id            Int  Auto_increment  NOT NULL ,
        ip            Varchar (40) NOT NULL ,
        registered_at Datetime NOT NULL ,
        validated_at  Datetime ,
        email         Varchar (255) NOT NULL ,
        pseudo        Varchar (30) NOT NULL ,
        password      Varchar (255) NOT NULL ,
        id_avatars    Int NOT NULL ,
        id_roles      Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_avatars_FK FOREIGN KEY (id_avatars) REFERENCES avatars(id)
	,CONSTRAINT users_roles0_FK FOREIGN KEY (id_roles) REFERENCES roles(id)
)ENGINE=InnoDB;

-- Table: posts
CREATE TABLE IF NOT EXISTS `trotter`.`posts`(
        id       Int  Auto_increment  NOT NULL ,
        post_at  Datetime NOT NULL ,
        post     Varchar (255) NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT posts_PK PRIMARY KEY (id)

	,CONSTRAINT posts_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;

-- Table: friends
CREATE TABLE IF NOT EXISTS `trotter`.`friends`(
        id              Int  Auto_increment  NOT NULL ,
        invitation_at   Datetime NOT NULL ,
        accepted_at     Datetime ,
        id_users        Int NOT NULL ,
        id_users_accept Int NOT NULL
	,CONSTRAINT friends_PK PRIMARY KEY (id)

	,CONSTRAINT friends_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
	,CONSTRAINT friends_users0_FK FOREIGN KEY (id_users_accept) REFERENCES users(id)
)ENGINE=InnoDB;

-- Table: likes
CREATE TABLE IF NOT EXISTS `trotter`.`likes`(
        id       Int  Auto_increment  NOT NULL ,
        like_at  Date NOT NULL ,
        id_posts Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT likes_PK PRIMARY KEY (id)

	,CONSTRAINT likes_posts_FK FOREIGN KEY (id_posts) REFERENCES posts(id)
	,CONSTRAINT likes_users0_FK FOREIGN KEY (id_users) REFERENCES users(id)
)ENGINE=InnoDB;

-- Table: private_messages
CREATE TABLE IF NOT EXISTS `trotter`.`private_messages`(
        id               Int  Auto_increment  NOT NULL ,
        message          Varchar (255) NOT NULL ,
        publicated_at    Datetime NOT NULL ,
        id_users         Int NOT NULL ,
        id_users_receive Int NOT NULL
	,CONSTRAINT private_messages_PK PRIMARY KEY (id)

	,CONSTRAINT private_messages_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
	,CONSTRAINT private_messages_users0_FK FOREIGN KEY (id_users_receive) REFERENCES users(id)
)ENGINE=InnoDB;

-- Table: reported
CREATE TABLE IF NOT EXISTS `trotter`.`reported`(
        id                  Int  Auto_increment  NOT NULL ,
        reported_at         Date NOT NULL ,
        message             Varchar (255) NOT NULL ,
        id_posts            Int NOT NULL ,
        id_users            Int NOT NULL ,
        id_private_messages Int NOT NULL
	,CONSTRAINT reported_PK PRIMARY KEY (id)

	,CONSTRAINT reported_posts_FK FOREIGN KEY (id_posts) REFERENCES posts(id)
	,CONSTRAINT reported_users0_FK FOREIGN KEY (id_users) REFERENCES users(id)
	,CONSTRAINT reported_private_messages1_FK FOREIGN KEY (id_private_messages) REFERENCES private_messages(id)
)ENGINE=InnoDB;

-- Table: banned
CREATE TABLE IF NOT EXISTS `trotter`.`banned`(
        id        Int  Auto_increment  NOT NULL ,
        message   Varchar (255) NOT NULL ,
        banned_at Datetime NOT NULL ,
        id_users  Int NOT NULL
	,CONSTRAINT banned_PK PRIMARY KEY (id)

	,CONSTRAINT banned_users_FK FOREIGN KEY (id_users) REFERENCES users(id)
	,CONSTRAINT banned_users_AK UNIQUE (id_users)
)ENGINE=InnoDB;