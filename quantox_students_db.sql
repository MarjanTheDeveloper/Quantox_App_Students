create database quantox_students;

use quantox_students;

create table students (student_id int primary key auto_increment, student_name varchar(50), student_lastname varchar(50)); 

CREATE TABLE grades (
    student_id int NOT NULL,
    school_board varchar(10),
    mathematics int,
    english int,
    programing int,
    art int,
    FOREIGN KEY (student_id) REFERENCES students(student_id)
);

---------------------------

insert into students (student_name, student_lastname) values ('Marjan', 'Milosavljevic');
insert into students (student_name, student_lastname) values ('Pera', 'Peric');
insert into students (student_name, student_lastname) values ('Laza', 'Lazic');
insert into students (student_name, student_lastname) values ('Nikola', 'Nikolic');

insert into grades (student_id, school_board, mathematics, english, programing, art) values (1,'CSM',10,10,10,10);

insert into grades (student_id, school_board, mathematics, english, programing, art) values (2,'CSMB',1,2,3,6);

insert into grades (student_id, school_board, mathematics, english, programing, art) values (3,'CSM',1,2,3,6);

insert into grades (student_id, school_board, mathematics, english, programing, art) values (4,'CSMB',7,8,9,10);
