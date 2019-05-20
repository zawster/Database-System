

					# Question # 1

DELIMETER $$
Create procedure odd_even (OUT res VARCHAR(20),IN num integer)
    ->     begin  
    ->     if num%2=0 then
    ->     set res='Number is even';
    ->     else
    ->     set res='Number is odd';
    ->     end if;
    ->     end $$


DELIMETER ;
set @t=0;

call odd_even(@t,10);
select @t as t;








	
