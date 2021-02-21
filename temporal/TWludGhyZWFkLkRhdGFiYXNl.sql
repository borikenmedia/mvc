Create Database If Not Exists gity_mtd_db;

USE mtd_mvc_db;

Create Table If Not Exists mtd_mvc_Logs(
	req_id Int Not Null Auto_Increment Primary Key,
	req_addr varchar(28) Not Null,
	req_uri text Not Null,
	req_http text Not Null,
	req_date varchar(25) Not Null,
	req_ssid varchar(11) Not Null)ENGINE=MyISAM Default Charset=Latin1;

Create Table If Not Exists mtd_mvc_Cache(
	req_id Int Not Null Auto_Increment Primary Key,
	req_addr varchar(28) Not Null,
	req_uri text Not Null,
	req_http text Not Null,
	req_event mediumblob Not Null,
	req_date varchar(25) Not Null,
	req_ssid varchar(11) Not Null)ENGINE=MyISAM Default Charset=Latin1;

Create Table If Not Exists mtd_mvc_Pages(
	req_id Int Not Null Auto_Increment Primary Key,
	req_username varchar(25) Not Null,
	req_contact varchar(65) Not Null,
	req_pagename varchar(12) Not Null,
	req_pagetitle varchar(255) Not Null,
	req_pagecontent text Not Null,
	req_pagetags text Not Null,
	req_date varchar(25) Not Null,
	req_ssid varchar(11) Not Null)ENGINE=MyISAM Default Charset=Latin1;

Create Table If Not Exists mtd_mvc_Posts(
	req_id Int Not Null Auto_Increment Primary Key,
	req_username varchar(25) Not Null,
	req_contact varchar(65) Not Null,
	req_postcategory varchar(12) Not Null,
	req_posttitle text Not Null,
	req_postcontent text Not Null,
	req_posttags text Not Null,
	req_date varchar(25) Not Null,
	req_ssid varchar(11) Not Null)ENGINE=MyISAM Default Charset=Latin1;

Create Table If Not Exists mtd_mvc_Contact(
	req_id Int Not Null Auto_Increment Primary Key,
	req_username varchar(25) Not Null,
	req_contact varchar(65) Not Null,
	req_subject varchar(12) Not Null,
	req_message text Not Null,
	req_date varchar(25) Not Null,
	req_ssid varchar(11) Not Null)ENGINE=MyISAM Default Charset=Latin1;
