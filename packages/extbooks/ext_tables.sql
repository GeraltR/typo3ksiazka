CREATE TABLE tx_extbooks_domain_model_autor (
	imie varchar(255) NOT NULL DEFAULT '',
	nazwisko varchar(255) NOT NULL DEFAULT '',
	zdjecie int(11) unsigned NOT NULL DEFAULT '0'
);

CREATE TABLE tx_extbooks_domain_model_ksiazka (
	tytul varchar(255) NOT NULL DEFAULT '',
	opis varchar(255) NOT NULL DEFAULT '',
	okladka int(11) unsigned NOT NULL DEFAULT '0',
	autor int(11) unsigned DEFAULT '0'
);
