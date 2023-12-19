-- Schema scholars_forum_db
-- -----------------------------------------------------
DROP DATABASE IF EXISTS scholars;
CREATE DATABASE scholars;
USE scholars;
-- -----------------------------------------------------
-- Table `scholars`.`users` -----------
-- -----------------------------------------------------
CREATE TABLE users(
  user_id INT NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  registerdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (user_id));

-- -----------------------------------------------------
-- Table `scholars`.`posts`
-- -----------------------------------------------------
CREATE TABLE posts (
  post_id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  topic VARCHAR(50) NOT NULL,
  text VARCHAR(1000) NOT NULL,
  postdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (post_id),
  CONSTRAINT `user_id`
  FOREIGN KEY (`user_id`)
  REFERENCES `scholars`.`users` (`user_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table `scholars`.`comments`
-- -----------------------------------------------------
CREATE TABLE comments (
  comment_id INT NOT NULL AUTO_INCREMENT,
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  text VARCHAR(500) NOT NULL,
  commentdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (comment_id,post_id),
  CONSTRAINT `comments_to_posts`
  FOREIGN KEY (`post_id`)
  REFERENCES `scholars`.`posts` (`post_id`)
  ON DELETE CASCADE
   ON UPDATE NO ACTION,
CONSTRAINT `comments_to_users`
  FOREIGN KEY (`user_id`)
  REFERENCES `scholars`.`users` (`user_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION);
-- -----------------------------------------------------
-- Table `scholars`.`comment_replies`
-- -----------------------------------------------------
CREATE TABLE comment_replies(
reply_id INT NOT NULL AUTO_INCREMENT,
comment_id INT NOT NULL,
user_id INT NOT NULL,
text VARCHAR(300) NOT NULL,
PRIMARY KEY(reply_id),
CONSTRAINT `comment_replies_to_comments`
  FOREIGN KEY (`comment_id`)
  REFERENCES `scholars`.`comments` (`comment_id`)
  ON DELETE CASCADE
  ON UPDATE RESTRICT,
  CONSTRAINT `comment_replies_to_users`
  FOREIGN KEY (`user_id`)
  REFERENCES `scholars`.`users` (`user_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION);
-- Table `scholars`.`likes`
-- -----------------------------------------------------
CREATE TABLE likes(
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  likedate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (post_id,user_id),
    CONSTRAINT `likes_to_posts`
  FOREIGN KEY (`post_id`)
  REFERENCES `scholars`.`posts` (`post_id`)
  ON DELETE CASCADE
   ON UPDATE NO ACTION,
CONSTRAINT `likes_to_users`
  FOREIGN KEY (`user_id`)
  REFERENCES `scholars`.`users` (`user_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION
);
-- -----------------------------------------------------
-- Table `scholars`.`views`
-- -----------------------------------------------------
CREATE TABLE views (
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  viewdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (post_id,user_id),
 CONSTRAINT `views_to_posts`
  FOREIGN KEY (`post_id`)
  REFERENCES `scholars`.`posts` (`post_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION,
CONSTRAINT `views_to_users`
  FOREIGN KEY (`user_id`)
  REFERENCES `scholars`.`users` (`user_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION);
    -- -----------------------------------------------------
-- Table `scholars`.`views`
-- -----------------------------------------------------
CREATE TABLE user_profile_pictures(
picture_id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
url varchar(100) NOT NULL DEFAULT "uploads/profilePictures/avatar.jpg",
updatedate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (picture_id,user_id),
CONSTRAINT `user_profile_to_users`
  FOREIGN KEY (`user_id`)
  REFERENCES `scholars`.`users` (`user_id`)
  ON DELETE CASCADE
  ON UPDATE NO ACTION
);
 -- -----------------------------------------------------
-- Table `scholars`.`user_suggestions`
-- -----------------------------------------------------
create table users_suggestions(
suggestion_id int not null auto_increment,
user_id int not null,
suggetion varchar(200),
action_done varchar(15),
suggestion_date timestamp not null default current_timestamp,
primary key(suggestion_id),
constraint `users_suggestions_to users`
foreign key(user_id) 
references users(user_id)
ON DELETE CASCADE
  ON UPDATE NO ACTION
);
-- -----------------------------------------------------
-- Table `scholars`.`deleted users`
-- -----------------------------------------------------

create table delete_accounts_data(
account_id int not null,
username varchar(50) not null,
creation_date timestamp not null,
posts int not null,
comments_total_in int not null,
comments_total_out int not null,
comments_replies int not null,
suggestion_message int not null,
deletedate timestamp not null default current_timestamp
);
-- ----------------------------------------------------
-- ----------------sample data------------------------------------
-- ----------------------------------------------------