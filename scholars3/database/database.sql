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
  PRIMARY KEY (post_id));
-- -----------------------------------------------------
-- Table `scholars`.`comments`
-- -----------------------------------------------------
CREATE TABLE comments (
  comment_id INT NOT NULL AUTO_INCREMENT,
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  text VARCHAR(500) NOT NULL,
  commentdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (comment_id,post_id));
-- -----------------------------------------------------
-- Table `scholars`.`likes`
-- -----------------------------------------------------
CREATE TABLE likes (
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  likedate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (post_id,user_id),
    FOREIGN KEY (post_id)
    REFERENCES posts (post_id),
    FOREIGN KEY (user_id)
    REFERENCES users (user_id));

-- -----------------------------------------------------
-- Table `scholars`.`views`
-- -----------------------------------------------------
CREATE TABLE views (
  post_id INT NOT NULL,
  user_id INT NOT NULL,
  viewdate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (post_id,user_id),
  FOREIGN KEY (post_id)
    REFERENCES posts (post_id),
    FOREIGN KEY (user_id)
    REFERENCES users (user_id));
    -- -----------------------------------------------------
-- Table `scholars`.`views`
-- -----------------------------------------------------
CREATE TABLE user_profile_pictures(
picture_id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
url varchar(100) NOT NULL DEFAULT "uploads/profilePictures/avatar",
updatedate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
PRIMARY KEY (picture_id,user_id),
FOREIGN KEY (user_id) 
REFERENCES users(user_id)
);
-- ----------------------------------------------------
-- ----------------sample data------------------------------------
-- ----------------------------------------------------