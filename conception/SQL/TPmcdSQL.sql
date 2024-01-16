#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: a8yk4_usersRoles
#------------------------------------------------------------

CREATE TABLE a8yk4_usersRoles(
        id   Int  Auto_increment  NOT NULL ,
        name Varchar (20) NOT NULL
	,CONSTRAINT usersRoles_PK PRIMARY KEY (id)
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
        id_usersRoles Int NOT NULL
	,CONSTRAINT users_PK PRIMARY KEY (id)

	,CONSTRAINT users_usersRoles_FK FOREIGN KEY (id_usersRoles) REFERENCES a8yk4_usersRoles(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_topics
#------------------------------------------------------------

CREATE TABLE a8yk4_topics(
        id              Int  Auto_increment  NOT NULL ,
        title           Varchar (60) NOT NULL ,
        content         Text NOT NULL ,
        publicationDate Datetime NOT NULL ,
        id_users  Int NOT NULL
	,CONSTRAINT topics_PK PRIMARY KEY (id)

	,CONSTRAINT topics_users_FK FOREIGN KEY (id_users) REFERENCES a8yk4_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_sections
#------------------------------------------------------------

CREATE TABLE a8yk4_sections(
        id              Int  Auto_increment  NOT NULL ,
        name            Varchar (50) NOT NULL ,
        id_topics Int NOT NULL
	,CONSTRAINT sections_PK PRIMARY KEY (id)

	,CONSTRAINT sections_topics_FK FOREIGN KEY (id_topics) REFERENCES a8yk4_topics(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_categories
#------------------------------------------------------------

CREATE TABLE a8yk4_categories(
        id              Int  Auto_increment  NOT NULL ,
        name            Varchar (30) NOT NULL ,
        id_topics Int NOT NULL
	,CONSTRAINT categories_PK PRIMARY KEY (id)

	,CONSTRAINT categories_topics_FK FOREIGN KEY (id_topics) REFERENCES a8yk4_topics(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_status
#------------------------------------------------------------

CREATE TABLE a8yk4_status(
        id              Int  Auto_increment  NOT NULL ,
        content         Text NOT NULL ,
        publicationDate Datetime NOT NULL ,
        id_users  Int NOT NULL
	,CONSTRAINT status_PK PRIMARY KEY (id)

	,CONSTRAINT status_users_FK FOREIGN KEY (id_users) REFERENCES a8yk4_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_comments
#------------------------------------------------------------

CREATE TABLE a8yk4_comments(
        id              Int  Auto_increment  NOT NULL ,
        content         Text NOT NULL ,
        publicationDate Datetime NOT NULL ,
        id_status Int NOT NULL ,
        id_users  Int NOT NULL
	,CONSTRAINT comments_PK PRIMARY KEY (id)

	,CONSTRAINT comments_status_FK FOREIGN KEY (id_status) REFERENCES a8yk4_status(id)
	,CONSTRAINT comments_users0_FK FOREIGN KEY (id_users) REFERENCES a8yk4_users(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_topicAnswers
#------------------------------------------------------------

CREATE TABLE a8yk4_topicAnswers(
        id              Int  Auto_increment  NOT NULL ,
        publicationDate Datetime NOT NULL ,
        content         Text NOT NULL ,
        id_users  Int NOT NULL ,
        id_topics Int NOT NULL
	,CONSTRAINT topicAnswers_PK PRIMARY KEY (id)

	,CONSTRAINT topicAnswers_users_FK FOREIGN KEY (id_users) REFERENCES a8yk4_users(id)
	,CONSTRAINT topicAnswers_topics0_FK FOREIGN KEY (id_topics) REFERENCES a8yk4_topics(id)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: a8yk4_likes
#------------------------------------------------------------

CREATE TABLE a8yk4_likes(
        id_topics             Int NOT NULL ,
        id_users Int NOT NULL
	,CONSTRAINT likes_PK PRIMARY KEY (id_topics,id_users)

	,CONSTRAINT likes_topics_FK FOREIGN KEY (id_topics) REFERENCES a8yk4_topics(id)
	,CONSTRAINT likes_users0_FK FOREIGN KEY (id_users) REFERENCES a8yk4_users(id)
)ENGINE=InnoDB;

