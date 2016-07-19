Imena po padežima
=================

Menjanje imena po padežima bez korišćenja baze podataka. Cela skripta je bazirana na srpskom pravopisu, tako da za region nisam siguran.

Demo: http://shonetow.net/padezi

## Imajte na umu
* Neophodno je imati informaciju o polu korisnika
* Skripta trenutno podržava samo latinično pismo, ali je u planu podrška za ćirilicu

## Priprema
U skripti možete promeniti vrednosti koje određuju pol. Podrazumevane vrednosti su 1 za ženski pol i 2 za muški.

## Upotreba
```php
use Shonetow\Padez;

$ime = 'Predrag';
$pol = 2;

$padez = new Shonetow\Padezi\Padez();

echo $padez->nominativ($ime); // Predrag
echo $padez->genitiv($ime, $pol); // Predraga
echo $padez->dativ($ime, $pol); // Predragu
echo $padez->akuzativ($ime, $pol); // Predraga
echo $padez->vokativ($ime, $pol); // Predraže
echo $padez->instrumental($ime, $pol); // Predragom
echo $padez->lokativ($ime, $pol); // Predragu
```

## Izuzeci kod imena
Neka imena je nemoguće obraditi logički, jer zavise od naglaska. Ovo se uglavnom prepoznaje kod vokativa. U tom slučaju ta imena možete dodati u svojstva `$female_exceptions` i `$male_exceptions`.
Neka imena se već nalaze tamo, a možete mi poslati Pull request.