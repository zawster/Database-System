CREATE Database university;

USE university;

CREATE TABLE student(roll_no varchar(10) Primary Key,
					st_name varchar(30),
					f_name  varchar(30),
					gender  varchar(10),
					contact varchar(16),
					address varchar(250)
					); 
CREATE TABLE Cources(code varchar(5) Primary Key,
					cource_name varchar(30),
					credits INT(10)
					);

CREATE TABLE registered(roll_no varchar(10),
						code varchar(5),
						Primary Key(roll_no,code)
						);