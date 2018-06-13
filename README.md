# Zbiranje privolitev po GDPR
*Praktikum II, projekt*

Po novi Splošni uredbi o varstvu podatkov morajo upravljavci osebnih podatkov (tisti, ki zbirajo in obdelujejo podatke) posameznika seznaniti o tem katere podatke zbirajo, kako dolgo, na kakšni podlagi (za podlago glejte 1. odstavek člena 6 v http://eur-lex.europa.eu/legal-content/SL/TXT/HTML/?uri=CELEX:32016R0679&from=SL) in zbirati dokaze, da so posamezniki privolitev dali.

Pripravite portal, ki bo omogočal enostavno zbiranje privolitev. Omogočati mora, da uporabnik vpiše besedilo (pogoje) obdelave podatkov. Uporabnika naj portal vzpodbuja k temu, da bo vpisal vse podatke, ki jih zahteva Uredba (torej seznam podatkov, roke hrambe, zakonito podlago za obdelavo in vse pravice posameznika). 

Uporabnik lahko določi katere podatke bo zbiral v privolitvi (obvezno vsaj naslov elektronske pošte,  poljubno število vnosnih polj za vpis besedila, poljubno število kljukic – checkbox). Spremembe nastavitev morajo biti verzionirane, da bo mogoče kasneje ugotoviti kaj je videl uporabnik, ko je dal privolitev. Portal naj ob zbiranju privolitve zabeleži IP naslov uporabnika ter čas privolitve. 

Portal mora omogočati analizo privolitev (kdaj in koliko je bilo danih) ter iskanje privolitev. Če torej nekdo trdi, da privolitve ni dal, mora biti mogoče po njegovem elektronskem naslovu poiskati kdaj je dal privolitev in iz katerega IP naslova ter kakšni podatki so mu bili takrat prikazani. 

Če posameznik označi, da je otrok, potem ga preusmerite na portal za zbiranje izrecne privolitve po GDPR (glejte naslednji projekt).

Vsak uporabnik, ki daje privolitev, si lahko pogoje privolitve shrani kot PDF datoteko. Vsak uporabnik 
pa lahko vse dokaze o privolitvi izvozi kot PDF datoteko.

Bonus: Zavarovanje dokazov o privolitvi v verigi blokov


## E-R diagram
![e-r_diagram](https://user-images.githubusercontent.com/39340999/41291519-3752d570-6e50-11e8-8542-7def768cebc5.png)



## Navodila za namestitev
Za delovanje potrebujemo: Wampserver (32-bitni ali 64-bitni), Eclipse Oxygen.

![wamp](https://user-images.githubusercontent.com/39340895/41030763-4fec2602-697f-11e8-9bbe-b4211ddbf92f.png)

* Potrebno si je namestiti Wampserver ter ko odpremo phpMyAmdmin je treba ustvariti new database z imenom "praktikum" 
* Nato pa v sql zapišemo sledeče:
```
CREATE TABLE Uporabnik(
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    password varchar(255)
  
);

CREATE TABLE Boolbox (
	id int(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
  	agreed tinyint(1) NOT NULL,
  	FK_bol_che int(11) NOT NULL,
  	FK_bol_pod int(11) NOT NULL

);

CREATE TABLE Privolitve(
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	naslov varchar(255) NOT NULL,
	FK_priv_upo int NOT NULL
  
);

CREATE TABLE Upravljalec(	
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	ime varchar(255) NOT NULL,
	priimek varchar(255) NOT NULL,
	naslov varchar(255) NOT NULL,
	FK_upr_priv int
  
);

CREATE TABLE Verzija(
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT ,
	verzija int NOT NULL,
	text text(65535) NOT NULL,
 	rok_hrambe varchar(255) NOT NULL,
	FK_ver_priv int NOT NULL,
	FK_ver_poob int
  
);

CREATE TABLE Podpisnik(
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	email varchar(255) NOT NULL,
	ip_add varchar(255) NOT NULL,
	cas DATETIME NOT NULL,
	FK_pod_ver int NOT NULL
);

CREATE TABLE Pooblascenec(	
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	ime varchar(255) NOT NULL,
	priimek varchar(255) NOT NULL,
	naslov varchar(255) NOT NULL
  
);

CREATE TABLE Checkbox(	
	id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
	checkbox varchar(255) NOT NULL,
	FK_che_ver int NOT NULL
  
);

INSERT INTO `uporabnik` (`id`, `username`, `email`, `password`) VALUES (NULL, 'admin', 'admin', 'admin');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'admin', '000.000.0.0', '2018-05-18 06:00:00', '1');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev 1', '1');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'matija', 'dolzan', 'feri','1');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'To je prva verzija privolitve 1.', '2018-06-21', '1', '1');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'laura', 'ekart', 'feri');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Checkbox 1', '1');
```

* Inštaliramo si: Eclipse IDE for Java EE Developers (to je Eclipse Oxygen for Java EE) - http://www.eclipse.org/downloads/eclipse-packages/
* Nato določimo workspace za mapo našega php projekta in sicer tukaj, če imamo 32-bitni wamp: C:\wamp\www\ ALI C:\wamp64\www\ v primeru, da imamo 64-bitni Wamp
* V Eclipse moramo vključiti tole: https://marketplace.eclipse.org/content/php-development-tools na tem linku najdemo gumb Install in le tega povlečemo v naš Eclipse
* Ustvarimo nov PHP Project. Ime našega php projekta je: Praktikum
* nato pa v to mapo noter prekopiramo kodo, ki je na githubu v mapi Praktikum
* ko smo to naredili, v Eclipsu na mapi: GoogleAPI in tcpdf stisnemo desni klik
![oznaceni knjiznici](https://user-images.githubusercontent.com/39340895/41307123-97febc40-6e78-11e8-9000-327c6c3c3109.png)

* nato pa stisnemo *Use as Library Folder* - to je zelo pomembno, drugače ne bo delovalo
![oznaceni knjiznici -oznaci kot](https://user-images.githubusercontent.com/39340895/41307269-01199b00-6e79-11e8-982a-3d4c23cb55d2.png)

* nato, ko imamo celotno kodo v mapi, stisnemo desni klik na datoteki index.php in stisnemo:
![index](https://user-images.githubusercontent.com/39340895/41349142-365e9216-6f0f-11e8-91c1-7e8974196fea.png)


### AVTORJI:
* Dolžan Matija 
* Ekart Laura
* Bencek Petra
* Brod Matic

