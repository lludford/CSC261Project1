drop table if exists Student;
drop table if exists Employee;
drop table if exists User;
drop table if exists Reservation;
drop table if exists Room;


create TABLE User
(
UserID varchar(30) Not Null Default 0,
Password varchar(30) Not Null Default '000000',
PRIMARY KEY (UserID));


create TABLE Student
(
StudentID varchar(30) Not Null Default 0,
Name varchar(30) Default Null,
Email varchar(30) Default Null,
Year int(4) Default Null,
Major varchar(30) Default Null,
PRIMARY KEY(StudentID),
FOREIGN KEY(StudentID) REFERENCES User(UserID) On Delete Cascade);


create TABLE Employee
(
EmployeeID varchar(30) Not Null Default 0 , 
Name varchar(30) Default Null,
Department varchar(30) Default Null,
Email varchar(30) Default Null,
PRIMARY KEY(EmployeeID),
FOREIGN KEY(EmployeeID) REFERENCES User(UserID) On Delete Cascade);


create TABLE Room
(
RoomID int Not Null Default 0,
Building varchar(20) Not Null Default '',
Number int Not Null Default 0,
Mincap int Default Null,
Maxcap int Default Null,
PRIMARY KEY(RoomID));

create TABLE Reservation
(
UserID varchar(30) Not Null Default 0,
RoomID int Not Null Default 0,
ReservationDate date Not Null Default '0000-00-00',
StartTime time Default '00:00:00',
EndTime time Default '00:00:00',
PRIMARY KEY (UserID, RoomID, ReservationDate),
Foreign KEY (UserID) References User(UserID) ON Delete Cascade,
Foreign KEY (RoomID) References Room(RoomID) ON Delete Cascade);
