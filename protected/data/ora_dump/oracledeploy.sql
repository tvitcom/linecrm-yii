-- This file is part of LineCRM - http://linecrm.org/
--
-- LineCRM is free software: you can redistribute it and/or modify
-- it under the terms of the Attribution-ShareAlike 3.0 Unported 
-- (CC BY-SA 3.0) as published by Creative Commons nonprofit organization.
--
-- LineCRM is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
-- Creative Commons legal text for more details.
--
-- You should have received a copy of the Attribution-ShareAlike 3.0 Unported legal text
-- along with LineCRM code. If not, see <http://creativecommons.org/licenses/by-sa/3.0/legalcode/>.

/**
* The administration and management interface for the cache setup and configuration.
*
* This file is part of LineCRM source code.
*
* @package    main
* @category   CRM
* @copyright  2012 bpr
* @license    http://creativecommons.org/licenses/by-sa/3.0/legalcode/ Attribution-ShareAlike 3.0 Unported (CC BY-SA 3.0)
*/
-- Последовательность создания структур данных в oracle:-----------
-- 0) настроим Oracle-11xe для нашей LineCRM:
-- usermod -a -G dba br
-- . /u01/app/oracle/product/11.2.0/xe/bin/oracle_env.sh
-- conn system
-- sqlplus>
-- 1) создадим пользователя:
CREATE USER LINECRM IDENTIFIED BY "PASS_TO_LINECRM"
/
ALTER USER LINECRM DEFAULT TABLESPACE USERS TEMPORARY TABLESPACE TEMP
/
ALTER USER LINECRM QUOTA 3500M ON USERS;
/
CREATE ROLE CRM_USER;
/
GRANT CREATE SESSION TO CRM_USER;
/
CREATE ROLE CRM_DEV;
/
GRANT 
CREATE SESSION,
CREATE TABLE,
CREATE SEQUENCE,
CREATE TRIGGER,
CREATE TYPE,
CREATE VIEW,
QUERY REWRITE,
CREATE CLUSTER,
CREATE PROCEDURE TO CRM_DEV
/ 
GRANT CRM_DEV TO LINECRM
/
-- --connect from linecrm:------
-- Меняем формат даты-времени:
ALTER SESSION SET NLS_DATE_FORMAT = 'YYYY-MM-DD HH24:MI:SS'
/
CREATE TABLE CASH (ID NUMBER(19),
	KEYHIST NUMBER(19),
	COIN NUMBER(7,2),
CONSTRAINT CASH_PK_ID PRIMARY KEY ("ID"));
/
CREATE SEQUENCE CASH_SEQ_ID;
/
CREATE TRIGGER "CASH_TRG_ID"
	BEFORE INSERT ON CASH
	FOR EACH ROW
BEGIN
	SELECT CASH_SEQ_ID.NEXTVAL INTO :NEW.ID FROM DUAL;
END;
/
ALTER TRIGGER  "CASH_TRG_ID" ENABLE; 
/
CREATE TABLE HIST (ID NUMBER(19),
	KEYCONT NUMBER(19),
	DATECONN DATE,
	TALK VARCHAR2(1000),
	WORK VARCHAR2(1000),   
	STATUS NUMBER(11),
	READY NUMBER(1),
	SCHEDULE DATE,
CONSTRAINT HIST_PK_ID PRIMARY KEY ("ID"));
/
CREATE SEQUENCE HIST_SEQ_ID;
/
CREATE TRIGGER "HIST_TRG_ID"
	BEFORE INSERT ON "HIST"
	FOR EACH ROW
BEGIN 
SELECT "HIST_SEQ_ID".NEXTVAL INTO :NEW.ID FROM DUAL;
END;
/
ALTER TRIGGER  "HIST_TRG_ID" ENABLE;
/
CREATE TABLE IMPR (ID NUMBER(19),
	TODO VARCHAR2(2000),
	WHEN DATE,
	FIX NUMBER(1),
	FIXDATE DATE,
	REV VARCHAR2(10),
	DEVELOPERID NUMBER(19),
CONSTRAINT IMPR_PK_ID PRIMARY KEY ("ID"));
/
CREATE SEQUENCE IMPR_SEQ_ID;
/
CREATE TRIGGER "IMPR_TRG_ID"
	BEFORE INSERT ON "IMPR"
	FOR EACH ROW
BEGIN
	SELECT "IMPR_SEQ_ID".NEXTVAL INTO :NEW.ID FROM DUAL;
END;
/
ALTER TRIGGER  "IMPR_TRG_ID" ENABLE;
/
CREATE TABLE "CONT" (
	ID NUMBER(19),
	FIO VARCHAR2(76),
	WHOIS VARCHAR2(92),
	ORGANIS VARCHAR2(94),
	EMAILS VARCHAR2(57),
	TELH VARCHAR2(16),
	FAX VARCHAR2(16),
	MOB2 VARCHAR2(16),
	MOB1 VARCHAR2(16),
	ADDR VARCHAR2(185),
	ADDRH VARCHAR2(100),
	ADDRW VARCHAR2(90),
	WEB VARCHAR2(44),
	BIRTH VARCHAR2(10),
	NOTE VARCHAR2(4000),
	FOTO VARCHAR2(255),
CAT VARCHAR2(255),CONSTRAINT "CONT_PK_ID" PRIMARY KEY ("ID"));
/
CREATE SEQUENCE "CONT_SEQ_ID";
/
CREATE TRIGGER "CONT_TRG_ID"
	BEFORE INSERT ON "CONT"
	FOR EACH ROW
BEGIN
	SELECT "CONT_SEQ_ID".NEXTVAL INTO :NEW.ID FROM DUAL;
END;
/
ALTER TRIGGER  "CONT_TRG_ID" ENABLE;
/
ALTER TABLE CONT ADD CONSTRAINT CONT_PK_WHOIS CHECK (LENGTH(WHOIS) >= 3);
/
CREATE TABLE "PRICE" (
	ID NUMBER(19),
	NAME VARCHAR2(30),
	DESCRIPT VARCHAR2(99),
	STATE VARCHAR2(12),
	DELIVERY VARCHAR2(10),
	WARRANTY VARCHAR2(9),
	COST NUMBER(7,2),
	TERMS VARCHAR2(48),
CONSTRAINT "PRICE_PK_ID" PRIMARY KEY ("ID"));
/
CREATE SEQUENCE "PRICE_SEQ_ID";
/
CREATE TRIGGER "PRICE_TRG_ID"
	BEFORE INSERT ON "PRICE"
	FOR EACH ROW
BEGIN
	SELECT "PRICE_SEQ_ID".NEXTVAL INTO :NEW.ID FROM DUAL;
END;
/
ALTER TRIGGER  "PRICE_TRG_ID" ENABLE;
/
CREATE TABLE "USERS" (
	ID NUMBER(19),
	NAME VARCHAR2(30),
	BIRTH DATE,
	PROVINCE VARCHAR2(14),
	ACTIVITY VARCHAR2(14),
	WEB VARCHAR2(128),
	PASS VARCHAR2(40),
	TEL VARCHAR2(14),
	EMAIL VARCHAR2(25),
	ALLOW NUMBER(1),
	NOTE VARCHAR2(255),
	TINCOMING TIMESTAMP,
	DEVELOPER NUMBER(1),
CONSTRAINT "USERS_PK_ID" PRIMARY KEY ("ID"));
/
CREATE SEQUENCE "USERS_SEQ_ID";
/
CREATE TRIGGER "USERS_TRG_ID"
	BEFORE INSERT ON "USERS"
	FOR EACH ROW
BEGIN
	SELECT "USERS_SEQ_ID".NEXTVAL INTO :NEW.ID FROM DUAL;
END;
/
ALTER TRIGGER  "USERS_TRG_ID" ENABLE;
/* --способ DATA PUMP (после создания пользователя и его привелегий:
sudo mkdir /home/user/ora_dump && sudo chmod -R 0777 /home/user/ora_dump
sqlplus system/as sysdba
create directory dump_linecrm as '/home/user/ora_dump';
GRANT READ, WRITE ON DIRECTORY DPUMP_LINECRM TO LINECRM;
если экспортировать решитесь то expdp DIRECTORY=dump_linecrm dumpfile=linecrm_dp20130828.dmp
impdp TABLE_EXISTS_ACTION=REPLACE DIRECTORY=dump_linecrm dumpfile=linecrm_structure.dmp
*/-- ---------------ГОТОВО!------------------------
