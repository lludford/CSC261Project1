LOAD DATA LOCAL INFILE "Users.csv" 
INTO TABLE User
FIELDS TERMINATED BY ","; 


LOAD DATA LOCAL INFILE "Rooms.csv" 
INTO TABLE Room
FIELDS TERMINATED BY ","; 

LOAD DATA LOCAL INFILE "Employees.csv" 
INTO TABLE Employee
FIELDS TERMINATED BY ","; 

LOAD DATA LOCAL INFILE "Students.csv" 
INTO TABLE Student
FIELDS TERMINATED BY ","; 


LOAD DATA LOCAL INFILE "Reservations.csv" 
INTO TABLE Reservation
FIELDS TERMINATED BY ","; 