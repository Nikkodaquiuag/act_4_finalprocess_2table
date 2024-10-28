CREATE_TABLE library (
library_id INT AUTO_INCREMENT PRIMARY KEY
library_name varchar (50)
locations varchar (50)
specialization varchar (50)
date_added timestamp default current_timestamp
);

CREATE TABLE book (
book_id int auto_increment primary key,
title  varchar (50)
author varchar (50)
date added  timestamp default current_timestamp
);
