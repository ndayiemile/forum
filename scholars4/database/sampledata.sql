use scholars;
-- users
insert into users(username,password) 
values ('pere','ndayemile'),
('mucyo','emile'),
('jack','ndayishimiye'),
('kevin','emile'),
('peace','emile');

-- posts
INSERT INTO posts(topic,text,user_id) 
VALUES ('computer science','Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam totam et eos corporis vel eum nam dolore reiciendis optio quaerat.
',1),
('Physics nature','Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam totam et eos corporis vel eum nam dolore reiciendis optio quaerat.
',1),
('math ideas','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error ipsum, aspernatur nobis sapiente quasi mollitia sit minima ad odio optio iusto maiores modi natus rerum inventore alias officiis ullam pariatur.
','4'),
('enterpreneurship','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deserunt cumque laudantium corrupti nisi. Fugiat.
','4'),
('literature','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deserunt cumque laudantium corrupti nisi. Fugiat.
','5'),
('agromechanisation','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus deserunt cumque laudantium corrupti nisi. Fugiat.
','1'),
('illiteracy','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione iure itaque iusto distinctio corporis minima tempora ipsam aspernatur voluptatum a explicabo, assumenda dolor odio sint.
','2'),
('Industrialisation','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione iure itaque iusto distinctio corporis minima tempora ipsam aspernatur voluptatum a explicabo, assumenda dolor odio sint.
','3'),
('Agromodernisation','Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione iure itaque iusto distinctio corporis minima tempora ipsam aspernatur voluptatum a explicabo, assumenda dolor odio sint.
','3'),
('Moral decays','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate, error impedit excepturi, incidunt veritatis dignissimos saepe earum explicabo odio eos ipsa officiis eum libero voluptates eveniet. Sapiente voluptate reprehenderit at explicabo, soluta facilis quisquam iure dolor suscipit quibusdam inventore delectus deleniti non blanditiis reiciendis ipsam alias, quae excepturi? Placeat laborum, ipsa provident, error quasi optio vel rerum rem amet neque eum nam maxime illum quod mollitia expedita odio blanditiis.
','1'),
('Time paradox','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur cupiditate, error impedit excepturi, incidunt veritatis dignissimos saepe earum explicabo odio eos ipsa officiis eum libero voluptates eveniet. Sapiente voluptate reprehenderit at explicabo, soluta facilis quisquam iure dolor suscipit quibusdam inventore delectus deleniti non blanditiis reiciendis ipsam alias, quae excepturi? Placeat laborum, ipsa provident, error quasi optio vel rerum rem amet neque eum nam maxime illum quod mollitia expedita odio blanditiis.
','5'),
('Free energy + green energy','Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni esse aliquid, consequatur iure quae omnis nam harum odit molestiae reprehenderit est laudantium dolores doloremque minima, cupiditate doloribus temporibus ab obcaecati aspernatur totam quas nobis. Quos, magni doloremque ipsum deleniti minima deserunt accusantium soluta commodi fugiat repudiandae recusandae animi culpa repellendus.
','4'),
('the space wonders','Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni esse aliquid, consequatur iure quae omnis nam harum odit molestiae reprehenderit est laudantium dolores doloremque minima, cupiditate doloribus temporibus ab obcaecati aspernatur totam quas nobis. Quos, magni doloremque ipsum deleniti minima deserunt accusantium soluta commodi fugiat repudiandae recusandae animi culpa repellendus.
','3'),
('who knows the future?','Lorem ipsum dolor sit amet consectetur adipisicing elit. Error ipsum, aspernatur nobis sapiente quasi mollitia sit minima ad odio optio iusto maiores modi natus rerum inventore alias officiis ullam pariatur.
','2');

-- likes
INSERT INTO likes(post_id,user_id) 
VALUES (4,1),
(1,3),
(2,3),
(3,3),
(4,3),
(5,5),
(6,5),
(7,5),
(8,5),
(9,5),
(10,5),
(11,5),
(12,5),
(13,5),
(14,4),
(1,4),
(2,4),
(3,4),
(4,4),
(5,4),
(6,3),
(7,3),
(8,2),
(9,2),
(10,1),
(11,3),
(12,2),
(13,2),
(14,2);

-- comments
INSERT INTO 
comments(post_id,text,user_id) 
VALUES 
(1,'Lorem ipsum dolor sit amet.',1),
(1,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, repellat.',1),
(1,'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam explicabo officia labore, sapiente mollitia vero?',2),
(1,'lore    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum nemo unde, aperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',3),
(1,'lore    Lorem ipsum dperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',4),
(1,'Lorem ipsum dolor sit amet.',5),
(1,'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsama labore, sapiente mollitia vero?',5),
(1,'lore    Lorem ipsum dolor sit amet consectetur, adipisicin unde, aperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',5),
(1,'    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor, harum dignissimos vitae animi ex ipsum ab labore veritatis eaque praesentium iste asperiores a, maiores commodi in! Laborum necessitatibus eligendi suscipit! Perspiciatis ex vel, voluptatem vitae, temporibus quidem tempore beatae nesciunt repellendus earum ab recusandae, maxime atque. Ipsa quasi quis quos.
',3),
(1,'    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor, harum dignissimos vitae animi ex ipsum ab labore veritatis eaque praesentium iste asperiores a, maiores commodi in! Laborum necessitatibus eligendi suscipit! Perspiciatis ex vel, voluptatem vitae, temporibus quidem tempore beatae nesciunt repellendus earum ab recusandae, maxime atque. Ipsa quasi quis quos.
',4),
(1,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, repellat.',3),


(11,'Lorem ipsum dolor sit amet.',1),
(12,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, repellat.',1),
(13,'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam explicabo officia labore, sapiente mollitia vero?',2),
(14,'lore    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum nemo unde, aperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',3),
(11,'lore    Lorem ipsum dperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',4),
(9,'Lorem ipsum dolor sit amet.',5),
(10,'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsama labore, sapiente mollitia vero?',5),
(2,'lore    Lorem ipsum dolor sit amet consectetur, adipisicin unde, aperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',5),
(2,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor, harum dignissimos vitae animi ex ipsum ab labore veritatis eaque praesentium iste asperiores a, maiores commodi in! Laborum necessitatibus eligendi suscipit! Perspiciatis ex vel, voluptatem vitae, temporibus quidem tempore beatae nesciunt repellendus earum ab recusandae, maxime atque. Ipsa quasi quis quos.
',3),
(2,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor, harum dignissimos vitae animi ex ipsum ab labore veritatis eaque praesentium iste asperiores a, maiores commodi in! Laborum necessitatibus eligendi suscipit! Perspiciatis ex vel, voluptatem vitae, temporibus quidem tempore beatae nesciunt repellendus earum ab recusandae, maxime atque. Ipsa quasi quis quos.
',4),
(2,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, repellat.',3),


(6,'Lorem ipsum dolor sit amet.',1),
(6,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, repellat.',1),
(7,'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsam explicabo officia labore, sapiente mollitia vero?',2),
(7,'lore    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum nemo unde, aperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',3),
(6,'lore    Lorem ipsum dperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',4),
(8,'Lorem ipsum dolor sit amet.',5),
(8,'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ipsama labore, sapiente mollitia vero?',5),
(8,'lore    Lorem ipsum dolor sit amet consectetur, adipisicin unde, aperiam nam voluptatum, numquam vero asperiores velit qui a recusandae explicabo laudantium dolorum veritatis?
',5),
(6,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor, harum dignissimos vitae animi ex ipsum ab labore veritatis eaque praesentium iste asperiores a, maiores commodi in! Laborum necessitatibus eligendi suscipit! Perspiciatis ex vel, voluptatem vitae, temporibus quidem tempore beatae nesciunt repellendus earum ab recusandae, maxime atque. Ipsa quasi quis quos.
',3),
(11,'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor, harum dignissimos vitae animi ex ipsum ab labore veritatis eaque praesentium iste asperiores a, maiores commodi in! Laborum necessitatibus eligendi suscipit! Perspiciatis ex vel, voluptatem vitae, temporibus quidem tempore beatae nesciunt repellendus earum ab recusandae, maxime atque. Ipsa quasi quis quos.
',4),
(13,'Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, repellat.',3);

-- views
INSERT INTO views(post_id,user_id) VALUES 
(1,1),
(1,2),
(1,3),
(1,4),
(1,5),

(2,1),
(2,2),
(2,3),
(3,1),
(3,2),
(3,3),
(2,4),
(5,1),
(5,2),
(4,3),
(4,4),
(4,5),
(2,5);