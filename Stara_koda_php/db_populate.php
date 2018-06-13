<?php 
$database_name = "praktikum";
$connection = mysqli_connect("localhost", "root", "", $database_name);
$sql= "

INSERT INTO `uporabnik` (`id`, `username`, `email`, `password`) VALUES (NULL, 'maticbrod', 'brodmatic.96@gmail.com', NULL );
INSERT INTO `uporabnik` (`id`, `username`, `email`, `password`) VALUES (NULL, 'eprehrana', 'eprehrana@gmail.com', NULL);
INSERT INTO `uporabnik` (`id`, `username`, `email`, `password`) VALUES (NULL, 'pibernikmarko', 'marko.pibernik@gmail.com', 'pibernikovmarko');

INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za naso spletno stran', '1');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za Mimovrste', '1');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za Deathstar', '1');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za Alliance', '2');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za Horde', '2');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za Rebel', '2');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za Mercator', '2');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za Spar', '3');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za Tus', '3');
INSERT INTO `privolitve` (`id`, `naslov`, `FK_priv_upo`) VALUES (NULL, 'Privolitev za McDonalds', '3');

INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Martin', 'Krpan', 'Ulica Pravljice 104, Ljubljana','1');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Rdeca', 'Kapica', 'FERI','2');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Nat', 'Pagle', 'Pandaria','3');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Nat', 'Pagle', 'Pandaria','4');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Nat', 'Pagle', 'Pandaria','5');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Nat', 'Pagle', 'Pandaria','6');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Nat', 'Pagle', 'Pandaria','7');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Nat', 'Pagle', 'Pandaria','8');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Nat', 'Pagle', 'Pandaria','9');
INSERT INTO `upravljalec` (`id`, `ime`, `priimek`, `naslov`,`FK_upr_priv`) VALUES (NULL, 'Nat', 'Pagle', 'Pandaria','10');

INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'John', 'Wick', 'Charles Street 62, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Roger', 'Kint', 'Fulton Street 41, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Antoine', 'Doint', 'Eldridge Street 33, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Tommy', 'DeVito', 'Henry Street (Manhattan) 75, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Harry', 'Line', 'Irving Place 32, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'John', 'Malkovich', 'Lafayette Street 19, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Darth', 'Vader', 'Death Star street 86, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Sam', 'Spade', 'Ludlow Street 27, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Aurora', 'Greenway', 'Ludlow Street 43, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Stanley', 'Kowalski', 'Ludlow Street 33, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Rose', 'Sayer', 'Ludlow Street 28, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Ace', 'Ventura', 'Ludlow Street 23, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Kevin', 'McCallister', 'Ludlow Street 3, New York');
INSERT INTO `pooblascenec`(`id`, `ime`, `priimek`, `naslov`) VALUES (NULL, 'Sandy', 'Olsson', 'Ludlow Street 30, New York');

INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Z oddajo privolitve dovoljujete, da nasa spletna stran, kot upravljavec osebnih podatkov, posredovane osebne podatke obdeluje v skladu z vsakokrat veljavnim zakonom, ki ureja varstvo osebnih podatkov, in dolocili Splosne uredbe o varstvu osebnih podatkov (GDPR). ', 'Dve leti.', '1', '0');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '2', 'Z oddajo privolitve dovoljujete, da nasa spletna stran, kot upravljavec osebnih podatkov, posredovane osebne podatke obdeluje v skladu z vsakokrat veljavnim zakonom, ki ureja varstvo osebnih podatkov, in dolocili Splosne uredbe o varstvu osebnih podatkov (GDPR). Nasa spletna stran bo vase posredovane podatke uporabljalo zgolj v namene, za katere ste dali privolitev.', 'Tri leta.', '1', '1');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '3', 'Z oddajo privolitve dovoljujete, da nasa spletna stran, kot upravljavec osebnih podatkov, posredovane osebne podatke obdeluje v skladu z vsakokrat veljavnim zakonom, ki ureja varstvo osebnih podatkov, in dolocili Splosne uredbe o varstvu osebnih podatkov (GDPR). Nasa spletna stran bo vase posredovane podatke uporabljalo zgolj v namene, za katere ste dali privolitev. Vase osebne podatke obdelujemo na podlagi vasega soglasja za cas do preklica vasega soglasja.', 'Dve leti.', '1', '2');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '4', 'Z oddajo privolitve dovoljujete, da nasa spletna stran, kot upravljavec osebnih podatkov, posredovane osebne podatke obdeluje v skladu z vsakokrat veljavnim zakonom, ki ureja varstvo osebnih podatkov, in dolocili Splosne uredbe o varstvu osebnih podatkov (GDPR). Nasa spletna stran bo vase posredovane podatke uporabljalo zgolj v namene, za katere ste dali privolitev. Vase osebne podatke obdelujemo na podlagi vasega soglasja za cas do preklica vasega soglasja. Vasih osebnih podatkov ne bomo posredovali tretjim osebam.', 'Pet let.', '1', '3'); 

INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Z oddajo privolitve dovoljujete, da Mimovrste, kot upravljalec osebnih podatkov,posredovane osebne podatke obdeluje v skladu z vsakokrat veljavnim zakonom, ki ureja varstvo osebnih podatkov.', 'Eno leto.', '2', '4');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '2', 'Z oddajo privolitve dovoljujete, da Mimovrste, kot upravljalec osebnih podatkov,posredovane osebne podatke obdeluje v skladu z vsakokrat veljavnim zakonom, ki ureja varstvo osebnih podatkov, in dolocili Splosne uredbe o varstvu osebnih podatkov (GDPR).', 'Sest mesecev.', '2', '5');

INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Z oddajo privolitve dovoljujete, da Deathstar uporablja posredovane podatke v skladu z veljavnim zakonom GDPR.', 'Eno leto.', '3', '6');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '2', 'Z oddajo privolitve dovoljujete, da Deathstar uporablja posredovane podatke v skladu z veljavnim zakonom GDPR.Vase osebne podatke obdelujemo na podlagi vasega soglasja za cas do preklica vasega soglasja. Vasih osebnih podatkov ne bomo posredovali tretjim osebam.', 'Tri leta.', '3', '7'); 

INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Verzija', 'Dve leti.', '4', '0');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Verzija', 'Dve leti.', '5', '8');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Verzija', 'Tri leta.', '6', '9');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Verzija', 'Pet let.', '7', '10');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Verzija', 'Osem let.', '8', '11');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Verzija', 'Stiri leta.', '9', '12');
INSERT INTO `verzija` (`id`, `verzija`, `text`, `rok_hrambe`, `FK_ver_priv`,`FK_ver_poob`) VALUES (NULL, '1', 'Verzija', 'Dve leti.', '10', '13');


INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Obvescanje o novostih', '1');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje imena in priimka', '1');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Obvescanje o novostih', '2');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje imena in priimka', '2');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Obvescanje o novostih', '3');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje imena in priimka', '3');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje domacega naslova', '3');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Obvescanje o novostih', '4');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje domacega naslova', '4');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje imena in priimka', '4');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje podatkov o nakupih', '4');

INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje podatkov o nakupih', '5');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbrirane osebnih podatkov', '5');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje podatkov o nakupih', '6');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje osebnih podatkov', '6');

INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje osebnih podatkov', '7');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje podatkov o delovnih mestih', '7');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje osebnih podatkov', '8');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje podatkov o delovnih mestih', '8');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Obvescanje o novostih', '8');

INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje emaila', '9');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje emaila', '10');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje emaila', '11');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje emaila', '12');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje emaila', '13');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje emaila', '14');
INSERT INTO `checkbox`(`id`, `checkbox`, `FK_che_ver`) VALUES (NULL, 'Zbiranje emaila', '15');


INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'random@gmail.com', '144.144.20.1', '2018-05-18 07:00:00', '1');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'tony@gmail.com', '162.123.2.3', '2018-05-18 06:00:00', '2');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'anthony@gmail.com', '234.231.1.0', '2018-05-18 06:00:00', '3');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'timotej@gmail.com', '070.060.6.4', '2018-05-08 06:00:00', '3');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'matic@gmail.com', '100.200.0.6', '2018-05-17 06:00:00', '4');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'matija@gmail.com', '200.100.1.1', '2018-05-16 06:00:00', '4');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'jernej@gmail.com', '060.040.3.2', '2018-05-07 06:00:00', '4');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'franci@gmail.com', '010.020.3.3', '2018-05-06 06:00:00', '4');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'laura@gmail.com', '160.041.4.7', '2018-05-15 06:00:00', '4');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'petra@gmail.com', '140.080.2.7', '2018-05-14 06:00:00', '5');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'marko@gmail.com', '255.255.1.1', '2018-05-13 06:00:00', '6');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'janez@gmail.com', '241.132.2.6', '2018-05-12 06:00:00', '6');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'joze@gmail.com', '222.111.1.2', '2018-05-11 06:00:00', '6');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'luka@gmail.com', '111.222.1.3', '2018-05-10 06:00:00', '7');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'daniel@gmail.com', '113.013.5.4', '2018-05-01 06:00:00', '8');
INSERT INTO `podpisnik` (`id`, `email`, `ip_add`, `cas`, `FK_pod_ver`) VALUES (NULL, 'matej@gmail.com', '092.121.1.3', '2018-05-02 06:00:00', '8');

INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '1', '1');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '2', '1');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '3', '2');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '5', '3');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '6', '3');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '7', '3');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '5', '4');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '6', '4');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '8', '5');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '9', '5');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '10', '5');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '11', '5');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '8', '6');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '10', '6');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '9', '7');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '10', '7');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '11', '7');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '11', '8');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '10', '9');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '11', '9');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '12', '10');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '13', '10');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '14', '11');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '15', '11');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '14', '12');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '15', '13');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '16', '14');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '17', '14');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '18', '15');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '19', '15');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '20', '15');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '19', '16');
INSERT INTO `boolbox` (`id`, `agreed`, `fk_bol_che`, `fk_bol_pod`) VALUES (NULL, '1', '20', '16');";
$result = mysqli_multi_query($connection, $sql);
mysqli_close($connection);

if($result){
    echo "Database data insertion succeeded.<br>";
}else{
    echo "Database data insertion failed!<br>";
}