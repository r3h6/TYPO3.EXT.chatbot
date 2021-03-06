#
# Table structure for table 'tx_chatbot_domain_model_bot'
#
CREATE TABLE tx_chatbot_domain_model_bot (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

#
# Table structure for table 'tx_chatbot_domain_model_graphmaster'
#
CREATE TABLE tx_chatbot_domain_model_graphmaster (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	word varchar(255) DEFAULT '' NOT NULL,
	parent_node int(11) unsigned DEFAULT '0',
	bot int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

#
# Table structure for table 'tx_chatbot_domain_model_aimlif'
#
CREATE TABLE tx_chatbot_domain_model_aimlif (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	activation_count int(11) DEFAULT '0' NOT NULL,
	pattern varchar(255) DEFAULT '' NOT NULL,
	that varchar(255) DEFAULT '' NOT NULL,
	topic varchar(255) DEFAULT '' NOT NULL,
	template text,
	file_name varchar(255) DEFAULT '' NOT NULL,
	bot int(11) unsigned DEFAULT '0',
	graphmaster_node int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);
