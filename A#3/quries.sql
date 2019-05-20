create database pharma;
CREATE TABLE suppliers( s_id varchar(20) not null, s_name varchar(50) not null, contact varchar(12) not null, city varchar(30) not null, primary key (s_id));

create table orderss( o_id int not null, customer_name varchar(50) not null, or_dates date not null,primary key (o_id));

create table product ( p_id varchar(10)  not null, pr_name varchar(30) not null, units int(10) not null, unit_price int(10) not null, type varchar(40) not null, s_id varchar(20) not null, key (s_id), foreign key (s_id) references suppliers (s_id) on delete cascade, primary key (p_id));


create table order_detail( p_id varchar(10) not null, o_id int(11) not null, units_purchased int not null, key (p_id), key (o_id), foreign key (p_id) references product (p_id) on delete cascade, foreign key (o_id) references orderss (o_id) on delete cascade);

insert into suppliers values ('320','Munir Brothers','0321-1234567','karachi');

insert into suppliers values ('312','Alliance Pharmaceuticals','0313-7654321','Peshawar');

insert into suppliers values ('478','Abbot Pharmaceuticals','0313-9876543','Lahore');

insert into suppliers values ('657','Sanofi Aventis','0333-5632476','Islamabad');

insert into suppliers values ('987','Ferozsons Laboratories','0301-1934257','Peshawar');


# Inserting into product orderss

insert into orderss values (22,'Waleed Ali','2014-11-25');


insert into orderss values (23,'Azhar Akbar','2014-12-02');
insert into orderss values (24,'shahzeb khan','2014-12-05');

insert into orderss values (25,'javed iqbal','2014-01-15');

insert into orderss values (26,'Tariq khan','2015-06-25');


delete from orderss where o_id = 25;

insert into orderss values (25,'javed iqbal','2015-01-15');

# Inserting into product table

insert into product values ('1005','Ponstan',100,15,'Tablets','312');

insert into product values ('1421','Brufen',25,35,'syrup','657');


insert into product values ('3215','Avil',122,26,'syrup','478');

insert into product values ('1215','Flagyl',42,30,'Tablets','987');


insert into product values ('7513','Avil',140,20,'Injection','478');


insert into product values ('1216','Flagyl',10,35,'syrup','987');


insert into product values ('1007','Disprin',98,15,'Tablets','320');


 select * from product;

#
#   Inserting into order_detail
#

 insert into order_detail values ('1007',22,5);


 insert into order_detail values ('1216',22,1);

 insert into order_detail values ('1005',22,4);


 insert into order_detail values ('1421',23,1);


insert into order_detail values ('1005',23,1);


 insert into order_detail values ('3215',23,2);


 insert into order_detail values ('7513',23,3);


 insert into order_detail values ('1421',24,2);


insert into order_detail values ('1215',24,1);

 insert into order_detail values ('1421',26,3);


 insert into order_detail values ('1215',26,1);


  insert into order_detail values ('1005',25,5);


 select * from order_detail;

 select od.p_id, p.pr_name, o.o_id,customer_name from product p, orderss o, order_detail od where o.customer_name="Javed Iqbal";

 select pr_name, s_name from product , suppliers where suppliers.city="Peshawar";

 select pr_name, s_name,count(prd.p_id) from product prd,suppliers sup where sup.s_name="Sanofi Aventis" AND prd.s_id=sup.s_id;

 Delete From product where pr_name LIKE 'Avil';

 select pr_name, s_name from product , suppliers where city="Peshawar";

 Select p.pr_name, s.s_name,count(p.p_id) from product p,suppliers s where s_name Like "Sanofi Aventis" AND s.s_id=p.s_id;