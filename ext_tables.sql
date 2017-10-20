#
# Table structure for table 'tx_chatbot_domain_model_bot'
#
CREATE TABLE tx_chatbot_domain_model_bot (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	substitutions int(11) unsigned DEFAULT '0' NOT NULL,
	maps int(11) unsigned DEFAULT '0' NOT NULL,
	sets int(11) unsigned DEFAULT '0' NOT NULL,
	aiml int(11) unsigned DEFAULT '0' NOT NULL,

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
	parent int(11) unsigned DEFAULT '0',
	bot int(11) unsigned DEFAULT '0',
	template int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	# cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	# deleted smallint(5) unsigned DEFAULT '0' NOT NULL,
	# hidden smallint(5) unsigned DEFAULT '0' NOT NULL,
	# starttime int(11) unsigned DEFAULT '0' NOT NULL,
	# endtime int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),
);

#
# Table structure for table 'tx_chatbot_domain_model_template'
#
CREATE TABLE tx_chatbot_domain_model_template (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	template text,
	pattern varchar(255) DEFAULT '' NOT NULL,
	file varchar(255) DEFAULT '' NOT NULL,
	bot int(11) unsigned DEFAULT '0',

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

#
# Table structure for table 'tx_chatbot_domain_model_set'
#
CREATE TABLE tx_chatbot_domain_model_set (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	bot int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

#
# Table structure for table 'tx_chatbot_domain_model_map'
#
CREATE TABLE tx_chatbot_domain_model_map (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	bot int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

#
# Table structure for table 'tx_chatbot_domain_model_substitution'
#
CREATE TABLE tx_chatbot_domain_model_substitution (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	bot int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

#
# Table structure for table 'tx_chatbot_domain_model_aiml'
#
CREATE TABLE tx_chatbot_domain_model_aiml (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	bot int(11) unsigned DEFAULT '0' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,

	PRIMARY KEY (uid),
	KEY parent (pid),

);

#
# Table structure for table 'tx_chatbot_domain_model_substitution'
#
CREATE TABLE tx_chatbot_domain_model_substitution (

	bot int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_chatbot_domain_model_map'
#
CREATE TABLE tx_chatbot_domain_model_map (

	bot int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_chatbot_domain_model_set'
#
CREATE TABLE tx_chatbot_domain_model_set (

	bot int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_chatbot_domain_model_aiml'
#
CREATE TABLE tx_chatbot_domain_model_aiml (

	bot int(11) unsigned DEFAULT '0' NOT NULL,

);
