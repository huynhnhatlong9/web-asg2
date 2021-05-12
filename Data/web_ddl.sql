CREATE DATABASE WEB_ASG02;
USE WEB_ASG02;

-- CREAT TABLE TO SAVE INFORMATION CUSTOMER
DROP TABLE IF EXISTS CUSTOMERS;
CREATE TABLE CURTOMERS
(
    CUS_ID    INT,
    FULL_NAME VARCHAR(50)  NOT NULL,
    USERNAME VARCHAR(50)  NOT NULL UNIQUE,
    PASS     VARCHAR(500) NOT NULL,
    REG_TIME DATETIME     NOT NULL,
    PRIMARY KEY (CUS_ID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- COURSE WILL PROVIDE
DROP TABLE IF EXISTS COURSE;
CREATE TABLE COURSE
(
    COURSE_NAME VARCHAR(200),
    PRIMARY KEY (COURSE_NAME)

)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
-- SUBJECT FOR COURSE
DROP TABLE IF EXISTS SUBJECTS;
CREATE TABLE SUBJECTS
(
    SUB_ID     INT,
    SUB_NAME   VARCHAR(300)  NOT NULL UNIQUE,
    IMAGE     VARCHAR(100),
    INTRO     VARCHAR(1000) NOT NULL,
    START_TIME DATE          NOT NULL,
    TIMELINE  INT           NOT NULL,
    CNAME     VARCHAR(200) NOT NULL,
    PRIMARY KEY (SUB_ID)
);

-- LESSON FOR SUBJECT
DROP TABLE IF EXISTS LESSON;
CREATE TABLE LESSON
(
    ID      INT,
    VIDEO   VARCHAR(500) NOT NULL,
    CONTENT VARCHAR(200) NOT NULL,
    PRIMARY KEY (ID)
);
-- EACH LESSON HAVE A TEST
DROP  TABLE IF EXISTS TESTS;
CREATE TABLE TESTS
(
    ID       INT PRIMARY KEY ,
    WORK_TIME INT NOT NULL
);
-- --------------------------------------------------------
-- WEAK ENTRIES
-- RESULT FOR A TEST
DROP TABLE  IF EXISTS RESULT;
CREATE TABLE RESULT(
    START_TIME DATETIME,
    END_TIME DATETIME NOT NULL,
    CID INT,
    TEST_ID INT,
    PRIMARY KEY (START_TIME,CID,TEST_ID)
);
-- ---------------------------------------------------------------------
-- RELATION
-- 1. INCLUDE RELATON
ALTER TABLE SUBJECTS
ADD FOREIGN KEY (CNAME) REFERENCES COURSE(COURSE_NAME);
-- 2. REG BETWEEN SUBJECT AND CURTOMER
DROP TABLE IF EXISTS REG_SUBJECT;
CREATE TABLE REG_SUBJECT(
    CURTOMER_ID INT,
    SUBJECT_ID INT,
    REG_TIME DATETIME NOT NULL,
    PRIMARY KEY (CURTOMER_ID,SUBJECT_ID),
    FOREIGN KEY (CURTOMER_ID) REFERENCES  CURTOMERS(CUS_ID),
    FOREIGN KEY (SUBJECT_ID) REFERENCES SUBJECTS(SUB_ID)
);
-- 3. SUBJECT HAVE LESSON
ALTER TABLE LESSON ADD COLUMN  SUBJECT_ID INT NOT NULL;
ALTER TABLE LESSON ADD FOREIGN KEY (SUBJECT_ID) REFERENCES SUBJECTS(SUB_ID);
-- 4. LEARN RELATION AND TIME Multivalued Attribute
DROP TABLE IF EXISTS LEARN;
CREATE TABLE LEARN(
    CUSTOMER INT,
    LESSON INT,
    PRIMARY KEY (CUSTOMER,LESSON),
    FOREIGN KEY (CUSTOMER) REFERENCES CURTOMERS(CUS_ID),
    FOREIGN KEY (LESSON) REFERENCES LESSON(ID)
);
DROP TABLE IF EXISTS LEARN_TIME;
CREATE TABLE LEARN_TIME (
    CUSTOMER INT,
    LESSON INT,
    START_TIME DATETIME,
    END_TIME DATETIME,
    PRIMARY KEY (CUSTOMER,LESSON,START_TIME,END_TIME),
    FOREIGN KEY (CUSTOMER,LESSON) REFERENCES LEARN(CUSTOMER, LESSON)
);
-- HAVE RELATION TEST AND LESSON
ALTER TABLE TESTS ADD COLUMN LESSON_ID INT NOT NULL UNIQUE ;
ALTER TABLE TESTS ADD FOREIGN KEY (LESSON_ID)  REFERENCES LESSON(ID);
-- ------------------------------------------------------------------------
-- Multivalued Attribute
-- 1. QUESTION FOR TEST
DROP TABLE IF EXISTS TEST_QUESTION;
CREATE TABLE TEST_QUESTION(
    TEST_ID INT,
    NO INT,
    CONTENT VARCHAR(500),
    ANSWER VARCHAR(10),
    PRIMARY KEY (TEST_ID, NO, CONTENT,ANSWER),
    FOREIGN KEY (TEST_ID) REFERENCES TESTS(ID)
);
-- 2. ANSWER FOR RESULT
DROP TABLE IF EXISTS RESULT_ANS;
CREATE TABLE RESULT_ANS(
    START_TIME DATETIME,
    CUR_ID INT,
    TEST_ID INT,
    NO INT,
    ANS VARCHAR(10),
    PRIMARY KEY (START_TIME,CUR_ID,TEST_ID,NO,ANS),
    FOREIGN KEY (START_TIME,CUR_ID,TEST_ID) REFERENCES RESULT(START_TIME, CID, TEST_ID)
);



