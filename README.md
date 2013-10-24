Kohana Valid: NIP, REGON, PESEL
============

#### Rozszerzenie klasy Valid o funkcje NIP, REGON, PESEL w Kohana Framework 3.x
##### Funkcje można adaptować w każdym innym systemie.

Valid::pesel('00000000000');  
Zwraca TRUE lub FALSE

Klasę należy umieścić w katalogu /application/classes/valid.php
Dzięki kaskadowości zachowamy pozostałe funkcje Kohana_Valid
