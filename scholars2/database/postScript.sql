select 
(select url from user_profile_pictures where user_id = users.user_id order by picture_id desc limit 1) as profilePicture,
username,
topic,
text,
(select count(*) from views where post_id = posts.post_id) as views,
(select count(*) from likes where post_id = posts.post_id) as likes,
(select count(*) from comments where post_id = posts.post_id) as comments,
postdate
from posts
left join users 
on posts.user_id = users.user_id
order by posts.post_id desc