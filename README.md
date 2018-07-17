Imena po padežima
=================

Menjanje imena po padežima bez korišćenja baze podataka. Cela skripta je bazirana na srpskom pravopisu, tako da za region nisam siguran.

Demo: http://shonetow.net/padezi

## Imajte na umu
* Neophodno je imati informaciju o polu korisnika

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

### Vokativ
S obizrom da je vokativ jedan od najčešćih padeža koji bi koristili, može se i ovako primeniti:

```php
$vokativ_name = \Shonetow\Padezi\Vokativ::female('ceca');

echo $vokativ_name; // Ceco
```

## Ćirilično i latinično pismo
Ukoliko je ime uneto u ćiriličnom pismu, biće automatski ispisano u istom.
```php
use Shonetow\Padez;

$ime = 'Предраг';
$pol = 2;

$padez = new Shonetow\Padezi\Padez();

echo $padez->vokativ($ime, $pol); // Предраже
```
Takođe je moguće podesiti pismo tako da input i output budu u različitom pismu.
```php
use Shonetow\Padez;

$ime = 'Predrag'; // Latinični input
$pol = 2;

$padez = new Shonetow\Padezi\Padez();

// 1 za latinicu, 2 za cirilicu
// takodje je moguće proslediti string "cirilica" ili "cyrillic", odnosno "latinica" ili "latin"
$padez->pismo(2); 

echo $padez->vokativ($ime, $pol); // Предраже // Ćirilični output
```

## Izuzeci kod imena
Neka imena je nemoguće obraditi logički, jer zavise od naglaska. Ovo se uglavnom prepoznaje kod vokativa. U tom slučaju ta imena možete dodati u svojstva `$female_exceptions` i `$male_exceptions`.
Neka imena se već nalaze tamo, a možete mi poslati Pull request.
