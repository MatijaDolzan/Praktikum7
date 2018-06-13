# Zbiranje privolitev po GDPR
*Praktikum II, projekt*

Po novi Splošni uredbi o varstvu podatkov morajo upravljavci osebnih podatkov (tisti, ki zbirajo in obdelujejo podatke) posameznika seznaniti o tem katere podatke zbirajo, kako dolgo, na kakšni podlagi (za podlago glejte 1. odstavek člena 6 v `http://eur-lex.europa.eu/legal-content/SL/TXT/HTML/?uri=CELEX:32016R0679&from=SL)` in zbirati dokaze, da so posamezniki privolitev dali.

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

