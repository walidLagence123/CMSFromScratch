#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: profile
#------------------------------------------------------------

CREATE TABLE profile(
        id_profile Int  Auto_increment  NOT NULL ,
        name       Varchar (255) NOT NULL
	,CONSTRAINT profile_AK UNIQUE (name)
	,CONSTRAINT profile_PK PRIMARY KEY (id_profile)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: manager
#------------------------------------------------------------

CREATE TABLE manager(
        id_manager         Int  Auto_increment  NOT NULL ,
        lastname           Varchar (255) NOT NULL ,
        firstname          Varchar (255) NOT NULL ,
        passwd             Varchar (255) NOT NULL ,
        reset_passwd_token Varchar (255) NOT NULL ,
        last_passwd_gen    Datetime NOT NULL ,
        active             Bool NOT NULL ,
        date_add           Datetime NOT NULL ,
        date_update        Datetime NOT NULL ,
        last_connexion     Datetime NOT NULL ,
        photo              Varchar (255) ,
        email              Varchar (255) NOT NULL ,
        id_profile         Int NOT NULL
	,CONSTRAINT manager_AK UNIQUE (email)
	,CONSTRAINT manager_PK PRIMARY KEY (id_manager)

	,CONSTRAINT manager_profile_FK FOREIGN KEY (id_profile) REFERENCES profile(id_profile)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: access
#------------------------------------------------------------

CREATE TABLE access(
        id_access Int  Auto_increment  NOT NULL ,
        slug      Varchar (255) NOT NULL
	,CONSTRAINT access_AK UNIQUE (slug)
	,CONSTRAINT access_PK PRIMARY KEY (id_access)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: member
#------------------------------------------------------------

CREATE TABLE member(
        id_member      Int  Auto_increment  NOT NULL ,
        lastname       Varchar (255) NOT NULL ,
        firstname      Varchar (255) NOT NULL ,
        active         Bool NOT NULL ,
        date_add       Datetime NOT NULL ,
        date_update    Datetime NOT NULL ,
        address        Varchar (255) NOT NULL ,
        city           Varchar (255) NOT NULL ,
        country        Char (255) NOT NULL ,
        zip_code       Varchar (255) NOT NULL ,
        description    Text NOT NULL ,
        last_connexion Datetime NOT NULL ,
        passwd         Varchar (255) NOT NULL ,
        photo          Varchar (255) ,
        email          Varchar (255) NOT NULL
	,CONSTRAINT member_AK UNIQUE (email)
	,CONSTRAINT member_PK PRIMARY KEY (id_member)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: activity
#------------------------------------------------------------

CREATE TABLE activity(
        id_activity Int  Auto_increment  NOT NULL ,
        active      Bool NOT NULL ,
        name        Varchar (255) NOT NULL
	,CONSTRAINT activity_AK UNIQUE (name)
	,CONSTRAINT activity_PK PRIMARY KEY (id_activity)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: level
#------------------------------------------------------------

CREATE TABLE level(
        id_level Int  Auto_increment  NOT NULL ,
        active   Bool NOT NULL ,
        name     Varchar (255) NOT NULL
	,CONSTRAINT level_AK UNIQUE (name)
	,CONSTRAINT level_PK PRIMARY KEY (id_level)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: article
#------------------------------------------------------------

CREATE TABLE article(
        id_article      Int  Auto_increment  NOT NULL ,
        title           Varchar (255) NOT NULL ,
        description     Text NOT NULL ,
        meta_seo        Varchar (255) NOT NULL ,
        enable_comments Bool NOT NULL ,
        date_add        Datetime NOT NULL ,
        date_update     Datetime NOT NULL ,
        cover_image     Varchar (255) NOT NULL ,
        id_manager      Int NOT NULL
	,CONSTRAINT article_PK PRIMARY KEY (id_article)

	,CONSTRAINT article_manager_FK FOREIGN KEY (id_manager) REFERENCES manager(id_manager)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: category
#------------------------------------------------------------

CREATE TABLE category(
        id_category Int  Auto_increment  NOT NULL ,
        active      Bool NOT NULL ,
        name        Varchar (255) NOT NULL ,
        is_root     Bool NOT NULL ,
        description Text NOT NULL ,
        cover_image Varchar (255) NOT NULL ,
        id_parent   TinyINT NOT NULL ,
        date_add    Datetime NOT NULL ,
        date_update Datetime NOT NULL ,
        meta_seo    Varchar (255) NOT NULL
	,CONSTRAINT category_PK PRIMARY KEY (id_category)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: comment
#------------------------------------------------------------

CREATE TABLE comment(
        id_comment  Int  Auto_increment  NOT NULL ,
        active      Bool NOT NULL ,
        comment     Text NOT NULL ,
        date_add    Datetime NOT NULL ,
        date_update Datetime NOT NULL ,
        id_article  Int NOT NULL ,
        id_member   Int NOT NULL
	,CONSTRAINT comment_PK PRIMARY KEY (id_comment)

	,CONSTRAINT comment_article_FK FOREIGN KEY (id_article) REFERENCES article(id_article)
	,CONSTRAINT comment_member0_FK FOREIGN KEY (id_member) REFERENCES member(id_member)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: article_category
#------------------------------------------------------------

CREATE TABLE article_category(
        id_category Int NOT NULL ,
        id_article  Int NOT NULL
	,CONSTRAINT article_category_PK PRIMARY KEY (id_category,id_article)

	,CONSTRAINT article_category_category_FK FOREIGN KEY (id_category) REFERENCES category(id_category)
	,CONSTRAINT article_category_article0_FK FOREIGN KEY (id_article) REFERENCES article(id_article)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: profile_access
#------------------------------------------------------------

CREATE TABLE profile_access(
        id_access  Int NOT NULL ,
        id_profile Int NOT NULL
	,CONSTRAINT profile_access_PK PRIMARY KEY (id_access,id_profile)

	,CONSTRAINT profile_access_access_FK FOREIGN KEY (id_access) REFERENCES access(id_access)
	,CONSTRAINT profile_access_profile0_FK FOREIGN KEY (id_profile) REFERENCES profile(id_profile)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: member_activity
#------------------------------------------------------------

CREATE TABLE member_activity(
        id_activity Int NOT NULL ,
        id_level    Int NOT NULL ,
        id_member   Int NOT NULL
	,CONSTRAINT member_activity_PK PRIMARY KEY (id_activity,id_level,id_member)

	,CONSTRAINT member_activity_activity_FK FOREIGN KEY (id_activity) REFERENCES activity(id_activity)
	,CONSTRAINT member_activity_level0_FK FOREIGN KEY (id_level) REFERENCES level(id_level)
	,CONSTRAINT member_activity_member1_FK FOREIGN KEY (id_member) REFERENCES member(id_member)
)ENGINE=InnoDB;


