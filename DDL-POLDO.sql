create table panini
(
	nome varchar(255) not null
		primary key,
	ingredienti text null,
	prezzo double null,
	DS int null,
	quantita int null,
	categoria int null,
	image varchar(20) null,
	avaiableCK int null,
	caldoFreddo int null,
	dispoBK int null,
	disponibilita int null
);

create table utenti
(
	username varchar(255) not null
		primary key,
	password varchar(255) not null,
	role int not null,
	somma_spesa float null,
	spesa_grande float null,
	online int null
);

create table utenti_panini
(
	username varchar(255) not null,
	id_p varchar(255) not null,
	quantity int not null,
	primary key (username, id_p),
	constraint utenti_panini_ibfk_1
		foreign key (username) references utenti (username),
	constraint utenti_panini_ibfk_2
		foreign key (id_p) references panini (nome)
);

create index id_p
	on utenti_panini (id_p);

create table visite
(
	viewsLogin int not null,
	viewsIndex int not null
);

