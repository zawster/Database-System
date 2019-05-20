			#   Question # 2

CREATE Table Users(
	user_id INT Primary Key Auto_Increment,
	userName VARCHAR(50),
	password VARCHAR(30),
	email VARCHAR(50)
	);
CREATE Table Summary(
	id INT Primary Key default 1,
	total_users INT,
	yahoo INT,
	hotmail INT,
	gmail INT
);

#  Test Data
INSERT INTO  Users(username,password,email) Values('abc123','def321','abc123@yahoo.com');
INSERT INTO Summary Values(1,1,1,0,0);

#   Part  =   1

DELIMETER $$
Create procedure insert_data (IN username VARCHAR(50),IN paswd VARCHAR(30),IN email VARCHAR(50))
	BEGIN
		INSERT INTO  Users(username,password,email) Values(username,paswd,email);
	END $$

#  Part   #    2

Create TRIGGER my_trigger AFTER INSERT ON Users
	FOR EACH ROW BEGIN
		IF NEW.email LIKE '%@yahoo.com' THEN
			UPDATE Summary SET yahoo = yahoo + 1,total_users = total_users + 1;
		ELSEIF NEW.email LIKE '%@hotmail.com' THEN
			UPDATE Summary SET hotmail = hotmail + 1, total_users = total_users + 1;
		ELSE
			UPDATE Summary SET gmail = gmail + 1, total_users = total_users + 1;
		END IF;
	END$$

Create TRIGGER my_trigger1 AFTER  UPDATE ON Users
	FOR EACH ROW BEGIN
		IF NEW.email LIKE '%@yahoo.com'  AND old.email LIKE '%@gmail.com'  THEN
			UPDATE Summary SET yahoo = yahoo + 1,gmail = gmail - 1;
		ELSEIF NEW.email LIKE '%@yahoo.com'  AND old.email LIKE '%@hotmail.com'  THEN
			UPDATE Summary SET yahoo = yahoo + 1,hotmail = hotmail - 1;
		ELSEIF NEW.email LIKE '%@hotmail.com' AND old.email LIKE '%@gmail.com' THEN
			UPDATE Summary SET hotmail = hotmail + 1, gmail = gmail - 1;
		ELSEIF NEW.email LIKE '%@hotmail.com' AND old.email LIKE '%@yahoo.com' THEN
			UPDATE Summary SET hotmail = hotmail + 1, yahoo = yahoo - 1;
		ELSEIF NEW.email LIKE '%@gmail.com' AND old.email LIKE '%@yahoo.com' THEN
			UPDATE Summary SET gmail = gmail + 1, yahoo = yahoo - 1;
		ELSE
			UPDATE Summary SET gmail = gmail + 1, hotmail = hotmail - 1;
		END IF;
	END$$


Create TRIGGER my_trigger2 Before  DELETE ON Users
	FOR EACH ROW BEGIN
		IF old.email LIKE '%@yahoo.com' THEN
			UPDATE Summary SET yahoo = yahoo - 1,total_users = total_users - 1;
		ELSEIF old.email LIKE '%@hotmail.com' THEN
			UPDATE Summary SET hotmail = hotmail - 1, total_users = total_users - 1;
		ELSE
			UPDATE Summary SET gmail = gmail - 1, total_users = total_users - 1;
		END IF;
	END$$


	call insert_data('ybzc','teatime','xyz143@yahoo.com');
	call insert_data('yzx143','teatime','yzx143@gmail.com');
	call insert_data('zxc133','teatime','zxc133@hotmail.com');
	call insert_data('zzx1213','teatime','zzx1213@yahoo.com');
	call insert_data('yz1467','teatime','yz1467@hotmail.com');
	call insert_data('uu121','teatime','uu121@yahoo.com');
	call insert_data('swd11','teatime','swd11@hotmail.com');
	call insert_data('ytr111','teatime','ytr111@gmail.com');
	call insert_data('x121','teatime','x121@hotmail.com');
	call insert_data('xz231','teatime','xz231@gmail.com');

	SELECT * FROM Users;
	SELECT * FROM Summary;

	UPDATE Users SET email = 'xz231@hotmail.com' Where userName LIKE 'xz231';

	DELETE FROM Users Where userName LIKE 'xz231';

	SELECT * FROM Users;
	SELECT * FROM Summary;
