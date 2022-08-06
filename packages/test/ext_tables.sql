CREATE TABLE tx_test_domain_model_model1 (
	name varchar(255) NOT NULL DEFAULT '',
	model2 int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_test_domain_model_model2 (
	model1 int(11) unsigned DEFAULT '0' NOT NULL,
	name varchar(255) NOT NULL DEFAULT ''
);
