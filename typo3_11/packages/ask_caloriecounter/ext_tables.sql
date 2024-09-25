CREATE TABLE tx_askcaloriecounter_domain_model_account (
	user int(11) NOT NULL DEFAULT '0',
	garminuser varchar(255) NOT NULL DEFAULT '',
	intakes int(11) unsigned NOT NULL DEFAULT '0',
	consumptions int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_askcaloriecounter_domain_model_foodtype (
	title varchar(255) NOT NULL DEFAULT ''
);

CREATE TABLE tx_askcaloriecounter_domain_model_foodpreset (
	title varchar(255) NOT NULL DEFAULT '',
	cal int(11) NOT NULL DEFAULT '0',
	sugar varchar(255) NOT NULL DEFAULT '',
	protein varchar(255) NOT NULL DEFAULT '',
	type int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_askcaloriecounter_domain_model_foodintake (
	account int(11) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) NOT NULL DEFAULT '',
	cal int(11) NOT NULL DEFAULT '0',
	sugar int(11) NOT NULL DEFAULT '0',
	protein varchar(255) NOT NULL DEFAULT '',
	type int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_askcaloriecounter_domain_model_calorieconsumption (
	account int(11) unsigned DEFAULT '0' NOT NULL,
	calories varchar(255) NOT NULL DEFAULT '',
	type int(11) unsigned DEFAULT '0'
);

CREATE TABLE tx_askcaloriecounter_domain_model_calorieconsumptiontype (
	title varchar(255) NOT NULL DEFAULT ''
);
