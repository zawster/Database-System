#
#      Creating tables
#
Create Table Customer( cusno VARCHAR(10) Primary Key Not Null,
	custname VARCHAR(100), address VARCHAR(100), Internal VARCHAR(1),
	contact VARCHAR(100),phone INT(8), city VARCHAR(40), state VARCHAR(5),
	zip INT(8)
);

Create Table Employee( empno VARCHAR(5) Primary Key Not Null,
		empname VARCHAR(50), department VARCHAR(50),
		email VARCHAR(30), phone VARCHAR(10) UNIQUE
); 

CREATE TABLE Facility( facno VARCHAR(10) Not null Primary Key,
		facname VARCHAR(100) 
);

Create Table Location(
	locno VARCHAR(10) Primary Key Not NULL,
	facno VARCHAR(10) ,
	locname VARCHAR(30),
	FOREIGN KEY (facno) REFERENCES Facility(facno) ON UPDATE CASCADE ON DELETE CASCADE
);

Create Table Resourcetbl ( 
	resno VARCHAR(10) Not Null  Primary Key,
	resName  VARCHAR(50), rate INT(10) 
); 

Create Table EventRequest(
	eventno VARCHAR(10) Primary Key Not NULL,
	dateheld date CHECK (dateheld LIKE '..-...-....'),
	datereq date CHECK (datereq LIKE '..-...-....'),
	facno VARCHAR(10),
	cusno VARCHAR(10),
	dateauth date CHECK (dateauth LIKE '..-...-....'),
	status VARCHAR(20),
	estcost VARCHAR(20),
	estaudience INT(20),
	budno VARCHAR(10),
	FOREIGN KEY (facno) REFERENCES Facility(facno) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (cusno) REFERENCES Customer(cusno) ON UPDATE CASCADE ON DELETE CASCADE
);

Create Table EventPlan (
	planno VARCHAR(10) Primary Key Not NUll,
	eventno VARCHAR(10),
	workdate date CHECK (workdate LIKE '..-...-....'),
	notes VARCHAR(100),
	activity VARCHAR(50),
	empno VARCHAR(10),
	FOREIGN KEY (eventno) REFERENCES EventRequest(eventno) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (empno) REFERENCES Employee(empno) ON UPDATE CASCADE ON DELETE CASCADE
);

Create TABLE EventPlanLine(
	planno VARCHAR(10),
	lineno INT(10),
	TimeStart date,
	TimeEnd date,
	NumberFld INT,
	locno VARCHAR(10),
	resno VARCHAR(10),
	FOREIGN KEY (locno) REFERENCES Location(locno) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (resno) REFERENCES Resourcetbl(resno) ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (planno) REFERENCES EventPlan(planno) ON UPDATE CASCADE ON DELETE CASCADE
);

#
#			Part  A
#
Select DISTINCT(city),state,zip From Customer;
Select empname,department,phone From Employee WHERE phone LIKE '3%';
Select * From Resourcetbl WHERE rate BETWEEN(10 and 20) ORDER BY rate;
Select eventno,dateauth,status From EventRequest Where dateauth Like '2013-07-%' and status='Approved' OR status='Denied';
Select locno,locname From Location,Facility Where Facility.facname='Basketball arena' and Location.facno=Facility.facno;
Select EventPlan.planno,COUNT(EventPlanLine.planno), SUM(EventPlanLine.NumberFld) From EventPlan,EventPlanLine where EventPlan.planno=EventPlanLine.planno Group by planno;

#
#			Part  B
#
Select EventRequest.eventno,dateheld,Count(Notes) From EventPlan,EventRequest Where EventRequest.eventno=EventPlan.eventno  AND workdate Like '2013-12-%' Group by eventno having COUNT(Notes)>1 ;
Select planno,EventRequest.eventno,workdate,activity From EventPlan,EventRequest,Facility Where workdate Like '2013-12-%' 
		AND EventRequest.eventno=EventPlan.eventno 
		AND EventRequest.facno=Facility.facno 
		AND Facility.facname Like 'Basketball arena';
Select evntr.eventno,EventPlan.workdate,status,estcost FROM EventRequest evntr , Facility fac, EventPlan, Employee 
		Where fac.facno=evntr.facno AND facname LIKE 'Basket Ball' AND dateheld between '2013-10-1'  AND '2013-12-31' 
		AND evntr.eventno=EventPlan.eventno AND EventPlan.empno = Employee.empno
		AND empname LIKE 'Marry%';

Select epl.planno,lineno,resname,numberfld,locname,timestart,timeend From EventPlanLine epl,Resourcetbl,Location,EventPlan,Facility 
	Where Location.locno=epl.locno AND Location.facno=Facility.facno 
	AND epl.resno=Resourcetbl.resno AND epl.planno=EventPlan.planno 
	AND facname='Basketball arena' AND activity='Operation' 
	AND workdate BETWEEN '2013-10-1' AND '2013-12-31';


#
#			Part  C
#
Insert into Facility Values('F104','Swimming Pool');
Insert Into Location Values('L107','F104','Door');
Insert Into Location Values('L108','F104','Locker Room');
Update Location SET locname = 'Gate' WHERE locname='Door';
Delete From Location Where locno='L108';