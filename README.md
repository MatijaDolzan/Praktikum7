# Zbiranje privolitev po GDPR
# Uporaba
Namen aplikacije je, da si uporabniki(podjetja) sestavljajo GDPR privolitve o zbiranju podatkov. Omogoča, da se vsa privolitev verzionizira. Ta privolitev lahko dobi povezavo, do katere ga pelje uradna stran podjetja. Privolilec lahko nato označi, š čim se v določeni privolitvi strinja in s čim ne. Svojo privolitev lahko nato natisne. Uporabnikom omogočamo iskanje privolilcev po njihovih elektronskih naslovih, zatem pa lahko še natiska takratno verzijo privolitve. Od dejanskega privolilca, hranimo le email, čas podpisa določene privolitve in IP naslov, iz katerega privolilec podpisal.

# Glavne funkcionalnosti
* Dodajanje privolitve
* Verzioniranje
* Spreminjanje verzij
* Izvažanja v PDF
* Iskanje privolilcev
* Dodajanje in spreminjanje pooblaščencev in upravljalcev privolitve

## E-R diagram
![e-r_diagram](https://user-images.githubusercontent.com/39340999/41291519-3752d570-6e50-11e8-8542-7def768cebc5.png)



## Navodila za namestitev
Za delovanje potrebujemo: Wampserver (32-bitni ali 64-bitni).

*![wamp](https://user-images.githubusercontent.com/39340895/41030763-4fec2602-697f-11e8-9bbe-b4211ddbf92f.png)

* Inštaliramo si Wampserver, link: `https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.1.3_x64.exe/download`
* Pri inštalaciji vzamemo vse privzete nastavitve 
* Wamp naj bi bil inštaliran v C:/wamp64, v njej najdemo mapo www, kamor skopiramo datoteke iz:`https://github.com/MatijaDolzan/Praktikum7/tree/master/Praktikum`
* Zaženemo wamp, počakamo da se prižgejo vsi servici (apache,php,mysql). V primeru da se eden ne zažene, poskusimo izprazniti morebitne zasedene porte 
* Testriramo, če je aplikacija zagnana, tako da gremo na: `localhost/Praktikum/index.php`
* V browserju zaženemo : `localhost/Praktikum/db_init.php`, da se baza inicializira
* Nato zaženemo še: `localhost/Praktikum/db_populate.php`, da se baza populira
* V primeru da katera koli stran vrne error, lahko z localhost/phpmyadmin (v katerega se prijavimo z imenom "root" in brez gesla), kopiramo najprej sql_skripta.txt in nato še populiranje_baze.txt
* Aplikacija je nato zagnana


### AVTORJI:
* Dolžan Matija/Monomaxos 
* Ekart Laura
* Bencek Petra
* Brod Matic

