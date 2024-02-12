#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: a8yk4_usersRoles
#------------------------------------------------------------

CREATE TABLE a8yk4_usersRoles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT a8yk4_usersRoles_PK PRIMARY KEY (id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_users
#------------------------------------------------------------

CREATE TABLE a8yk4_users(
        id                  Int  Auto_increment  NOT NULL ,
        username            Varchar (25) NOT NULL ,
        email               Varchar (50) NOT NULL ,
        password            Varchar (255) NOT NULL ,
        location            Varchar (50) NOT NULL ,
        birthdate           Date NOT NULL ,
        avatar              Varchar (255) NOT NULL ,
        id_a8yk4_usersRoles Int NOT NULL
	,CONSTRAINT a8yk4_users_PK PRIMARY KEY (id)

	,CONSTRAINT a8yk4_users_a8yk4_usersRoles_FK FOREIGN KEY (id_a8yk4_usersRoles) REFERENCES a8yk4_usersRoles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_topics
#------------------------------------------------------------

CREATE TABLE a8yk4_topics(
        id              Int  Auto_increment  NOT NULL ,
        title           Varchar (60) NOT NULL ,
        content         Text NOT NULL ,
        publicationDate Datetime NOT NULL ,
        id_a8yk4_users  Int NOT NULL
	,CONSTRAINT a8yk4_topics_PK PRIMARY KEY (id)

	,CONSTRAINT a8yk4_topics_a8yk4_users_FK FOREIGN KEY (id_a8yk4_users) REFERENCES a8yk4_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_sections
#------------------------------------------------------------

CREATE TABLE a8yk4_sections(
        id              Int  Auto_increment  NOT NULL ,
        name            Varchar (50) NOT NULL ,
        id_a8yk4_topics Int NOT NULL
	,CONSTRAINT a8yk4_sections_PK PRIMARY KEY (id)

	,CONSTRAINT a8yk4_sections_a8yk4_topics_FK FOREIGN KEY (id_a8yk4_topics) REFERENCES a8yk4_topics(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_categories
#------------------------------------------------------------

CREATE TABLE a8yk4_categories(
        id              Int  Auto_increment  NOT NULL ,
        name            Varchar (30) NOT NULL ,
        id_a8yk4_topics Int NOT NULL
	,CONSTRAINT a8yk4_categories_PK PRIMARY KEY (id)

	,CONSTRAINT a8yk4_categories_a8yk4_topics_FK FOREIGN KEY (id_a8yk4_topics) REFERENCES a8yk4_topics(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_status
#------------------------------------------------------------

CREATE TABLE a8yk4_status(
        id              Int  Auto_increment  NOT NULL ,
        content         Text NOT NULL ,
        publicationDate Datetime NOT NULL ,
        id_a8yk4_users  Int NOT NULL
	,CONSTRAINT a8yk4_status_PK PRIMARY KEY (id)

	,CONSTRAINT a8yk4_status_a8yk4_users_FK FOREIGN KEY (id_a8yk4_users) REFERENCES a8yk4_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_comments
#------------------------------------------------------------

CREATE TABLE a8yk4_comments(
        id              Int  Auto_increment  NOT NULL ,
        content         Text NOT NULL ,
        publicationDate Datetime NOT NULL ,
        id_a8yk4_status Int NOT NULL ,
        id_a8yk4_users  Int NOT NULL
	,CONSTRAINT a8yk4_comments_PK PRIMARY KEY (id)

	,CONSTRAINT a8yk4_comments_a8yk4_status_FK FOREIGN KEY (id_a8yk4_status) REFERENCES a8yk4_status(id)
	,CONSTRAINT a8yk4_comments_a8yk4_users0_FK FOREIGN KEY (id_a8yk4_users) REFERENCES a8yk4_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_topicreplies
#------------------------------------------------------------

CREATE TABLE a8yk4_topicreplies(
        id              Int  Auto_increment  NOT NULL ,
        publicationDate Datetime NOT NULL ,
        content         Text NOT NULL ,
        id_a8yk4_users  Int NOT NULL ,
        id_a8yk4_topics Int NOT NULL
	,CONSTRAINT a8yk4_topicreplies_PK PRIMARY KEY (id)

	,CONSTRAINT a8yk4_topicreplies_a8yk4_users_FK FOREIGN KEY (id_a8yk4_users) REFERENCES a8yk4_users(id)
	,CONSTRAINT a8yk4_topicreplies_a8yk4_topics0_FK FOREIGN KEY (id_a8yk4_topics) REFERENCES a8yk4_topics(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_likes
#------------------------------------------------------------

CREATE TABLE a8yk4_likes(
        id             Int NOT NULL ,
        id_a8yk4_users Int NOT NULL
	,CONSTRAINT a8yk4_likes_PK PRIMARY KEY (id,id_a8yk4_users)

	,CONSTRAINT a8yk4_likes_a8yk4_topics_FK FOREIGN KEY (id) REFERENCES a8yk4_topics(id)
	,CONSTRAINT a8yk4_likes_a8yk4_users0_FK FOREIGN KEY (id_a8yk4_users) REFERENCES a8yk4_users(id)
)ENGINE=InnoDB;

