CREATE TABLE SOLDIER
    ( SOLDIER_NO VARCHAR2(10) PRIMARY KEY
    , name VARCHAR2(20)
	, JOIN_date DATE
    , SVC_LENGTH  VARCHAR2(25)
	, AGE VARCHAR2(20)
    , email      VARCHAR2(25) 
    , CELL_nO   VARCHAR2(10)  
    
    ) ;

CREATE TABLE IPFT_INFO
    (
	BIANNUAL  VARCHAR2(10)
	,BIANNUAL_DATE DATE
    
	,constraint BI_DATE_PK PRIMARY
    KEY(BIANNUAL_DATE)
	
    );
	
CREATE TABLE ITEM_INFO(
ITEM_ID  VARCHAR2(10),
ITEM_NAME VARCHAR2(10),
constraint ITEM_ID_fk FOREIGN KEY(ITEM_ID) references FAILED_PER_ITEM(ITEM_ID)
);
	
	
	
	CREATE TABLE FAILED_PER_ITEM
    (
	SOLDIER_NO  VARCHAR2(10)
	,ITEM_ID VARCHAR2(10)
    , BIANNUAL_DATE DATE
	,constraint SOLDIER_NO_fk FOREIGN
    KEY(SOLDIER_NO) references SOLDIER(SOLDIER_NO)
	,constraint BI_DATE_fk FOREIGN
    KEY(BIANNUAL_DATE) references IPFT_INFO(BIANNUAL_DATE)
	
    ) ;

	
	
	
CREATE TABLE OFFICER
(BA_NO VARCHAR2(20),
NAME VARCHAR2(20),
D DATE,
RANK VARCHAR2(20),
constraint BA_NO_PK PRIMARY KEY(BA_NO) ) ;
	
	
CREATE TABLE OIC
(BIANNUAL_DATE DATE,
BA_NO VARCHAR2(20),
constraint OIC_DATE_fk FOREIGN KEY(BIANNUAL_DATE) references IPFT_INFO(BIANNUAL_DATE),
constraint BA_NO_fk FOREIGN KEY(BA_NO) references OFFICER(BA_NO)
);
	
	
CREATE table TOTAL_RESULT(
SOLDIER_NO VARCHAR2(20),
BIANNUAL_DATE DATE,
RESULT VARCHAR2(20)
);	
	

alter table item_info
add constraint item_id_fk
foreign key(item_id) references failed_per_item(item_id)

alter table TOTAL_RESULT
add constraint DATE_FK
foreign key(BIANNUAL_DATE) references IPFT_INFO(BIANNUAL_DATE)
	
	
CREATE table BENCHMARK (
    SEX	        VARCHAR2(10),
    UPPER_AGE 	VARCHAR2(10),
    LOWER_AGE 	VARCHAR2(10),
    A1.6KM 	VARCHAR2(10),
    BEAM	VARCHAR2(10),
    PUSH_UP	VARCHAR2(10),
    A3.2KM	VARCHAR2(10),
    HORIZONTAL_ROPE	VARCHAR2(10),
    A6FT_WALL 	VARCHAR2(10),
    SWIMMING	VARCHAR2(10),
    REACH_UP	VARCHAR2(10),
    SIT_UP	VARCHAR2(10)
)

alter table "BENCHMARK" add constraint  "BENCHMARK_PK" primary key ("SEX","UPPER_AGE","LOWER_AGE");

INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('MALE',25,20,5,6,50,17,'CROSS','CROSS','50M',50,'N\A');
INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('MALE',30,25,6,5,40,18,'CROSS','CROSS','50M',40,'N\A');
INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('MALE',35,30,7,4,30,19,'CROSS','CROSS','50M',35,'N\A');
INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('MALE',40,35,10,3,20,22,'N/A','N/A','50M',20,'N\A');
INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('FEMALE',25,20,6,8,30,20,'CROSS','CROSS','50M',50,'20');
INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('FEMALE',25,20,10,8,30,20,'N/A','N/A','50M',30,20);
INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('FEMALE',30,25,12,6,25,22,'N/A','N/A','50M',20,15);
INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('FEMALE',35,30,14,4,23,24,'N/A','N/A','50M',15,10);
INSERT INTO BENCHMARK(SEX,UPPER_AGE,LOWER_AGE,A16KM,BEAM,PUSH_UP,A32KM,HORIZONTAL_ROPE,6FT_WALL,SWIMMING,REACH_UP,SIT_UP)VALUES('FEMALE',40,35,16,2,,20,'N/A','N/A','N/A','N/A','N/A');