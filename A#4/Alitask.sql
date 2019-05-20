select first_name, last_name,salary from employees where (select Max(salary) from employees)=salary;
select employee_id, first_name,last_name,job_id,salary from employees where job_id like "%CLERK" and (select max(salary) from employees where job_id like "%CLERK")=salary;
select first_name, last_name from employees where job_id like "%MAN" and (select max(salary) from employees where job_id like "%CLERK")<salary;
select first_name, last_name from employees where job_id like "%MAN" and (select min(salary) from employees where job_id like "%CLERK")>salary;
select first_name,last_name, salary from employees where salary>(select salary from employees where last_name='Jones' or last_name="Scott");
select employee_id, salary from employees where department_id=100 and salary > (select avg(salary) from employees where department_id=100);
select employee_id, salary from employees where department_id=100 and salary = (select max(salary) from employees where department_id=100);
select first_name, last_name, job_id from employees where department_id=20 and job_id like "%MAN";
select first_name,last_name from employees where salary = (select max(salary) from employees where job_id like "%MAN") and job_id like "%MAN" ;
select first_name, last_name from employees where department_id = 20 and job_id = any (select job_id from employees where department_id = 30);
select first_name, last_name from employees where department_id = any(select department_id from departments where department_name = "Accounting");
select first_name, last_name from employees where salary > (select max(salary) from employees where department_id = 20 ) and salary > (select max(salary) from employees where department_id = 30) ;
Select first_name, last_name from employees where department_id = any (Select department_id from departments where location_id = any (Select location_id from locations where city LIKE "Sydney"));
Select first_name,last_name From employees where department_id LIKE 10 and job_id = any (Select job_id From employees where department_id = any (Select department_id from departments where department_name LIKE '%development%'));
select job_id, sum(salary) from employees group by job_id having sum(salary) > all (select max_salary from jobs where job_id like "%MAN" or job_id like "%MGR");
select department_id,max(salary) from employees group by department_id having max(salary) > 9000 ;
select first_name, last_name,department_id from employees where department_id = 10 and salary > any (select salary from employees where department_id != 10);
select first_name, last_name, job_id from employees where department_id = any (select department_id from departments where location_id = (select location_id from locations where city = "Munich"));
select first_name , last_name,job_title, department_name  from employees, jobs, departments where employees.job_id = jobs.job_id and employees.department_id = departments.department_id ;
select first_name, last_name from employees where salary = (select max(salary) from employees where salary < (select max(salary) from employees));
select departments.department_name,count(employee_id) from employees,departments where employees.department_id = departments.department_id group by employees.department_id having count(employee_id) > 2 order by count(employee_id);









