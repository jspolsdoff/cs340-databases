CREATE TABLE teachers (
	teacher_id int(11) NOT NULL AUTO_INCREMENT,
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	degree varchar(255) NOT NULL,
	PRIMARY KEY (teacher_id)
	) ENGINE=InnoDB;

CREATE TABLE students (
	student_id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	address varchar(255) NOT NULL,
	phone_num varchar(255) NOT NULL,
	PRIMARY KEY (student_id)
	) ENGINE=InnoDB;

CREATE TABLE courses (
	course_id int(11) NOT NULL AUTO_INCREMENT,
	name varchar(255) NOT NULL,
	department varchar(255) NOT NULL,
	teacher_id int(11),
	PRIMARY KEY (course_id),
	FOREIGN KEY (teacher_id) REFERENCES teachers(teacher_id)
	) ENGINE=InnoDB;

CREATE TABLE classrooms (
	classroom_id int(11) NOT NULL AUTO_INCREMENT,
	room_num varchar(255) NOT NULL,
	building varchar(255) NOT NULL,
	teacher_id int(11),
	PRIMARY KEY (classroom_id),
	FOREIGN KEY (teacher_id) REFERENCES teachers(teacher_id)
	) ENGINE=InnoDB;

CREATE TABLE students_courses (
	student_id int(11) REFERENCES students(student_id),
	course_id int(11) REFERENCES courses(course_id),
	PRIMARY KEY (student_id, course_id)
	) ENGINE=InnoDB;




