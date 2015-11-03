<?php namespace Shonetow;

/**
 * Class Padez
 * @author Nenad Novković - Shonetow <shonetow@gmail.com> @shonetow
 * @copyright (c) 2014, Shonetow
 *
 *
 * NAPOMENA: Skripta nije prilagođena imenima koja ne koriste naša slova (čćžšđ),
 * ali to ne znači da neće u potpunosti raditi.
 *
 */

class Padez
{
    /**
     * Podešavanja
     *
     * Ovde se mogu promeniti vrednosti koje određuju pol
     */
    protected $zensko = 1;
    protected $musko = 2;

    /**
     * Izuzeci imena za koje je nemoguće napisati
     * algoritam za vokativ, jer zavise od naglaska
     *
     * @var array
     */
    protected $female_exceptions = array(
        'Ceca',
        'Maja',
        'Zlata',
        'Dana',
        'Mira',
        'Sara',
        'Neda',
        'Nada',
        'Maca',
        'Mica',
        'Lepa',
        'Janja',
        'Brana',
        'Stana',
        'Maša',
        'Goca',
        'Ljilja',
        'Persa',
        'Bilja',
        'Anđa'
    );
    protected $male_exceptions = array( 'Saša', 'Paša', 'Jakša' );

    /**
     * KRAJ PODEŠAVANJA
     */

    /**
     * Samoglasnici i slova sa duplim karakterima
     * @var array
     */
    protected $vowels = array( 'a', 'e', 'i', 'o', 'u' );
    protected $double_letters = array( 'lj', 'nj', 'dž' );
    protected $double_letters_shift = array( '1', '2', '3' );

    /**
     * Palatalizacija sa zadnjonepčanim
     * @var array
     */
    protected $pal = array( 'k', 'g', 'h' );
    protected $pal2 = array( 'č', 'ž', 'š' );

    /**
     * Prednjonepčani nastavci
     * @var array
     */
    protected $prednjonepcani = array( 'j', 'lj', 'nj', 'đ', 'ć', 'dž', 'č', 'ž', 'š' );

    /**
     * Ime i pol
     * @var string
     */
    protected $ime;
    protected $pol;

    /**
     * Ukoliko skripta oceni da ime nije standardnog oblika zabeležiće to kao grešku
     * i prikazaće ime bez promene
     * @var
     */
    protected $num_err = 0;

    /**
     * Podešavanje Internal Encodinga na UTF-8
     * Setovanje imena
     * Setovanje pola
     *
     * @param $ime
     * @param $gender
     */
    public function __construct($ime, $gender)
    {
        mb_internal_encoding('UTF-8');

        $this->setName($ime);

        $this->setGender($gender);

        return $this;
    }

    /**
     * Definisanje imena
     *
     * @param string $ime
     *
     * @return array
     */
    public function setName($ime)
    {
        // Za svaki slučaj se imenu ukidaju razmaci sa početka i kraja
        $ime = trim($ime);

        // Definisanje imena. Ime se piše sa prvim velikim slovom
        $this->ime = mb_convert_case($ime, MB_CASE_TITLE, 'utf-8');

        // Provera grešaka
        // Ako je manje od 3 slova
        if (strlen($ime) < 3) {
            $this->num_err ++;
        }
        // Ako ime ima brojeve
        if (preg_match('#[0-9]#', $ime)) {
            $this->num_err ++;
        }

        return $this;
    }

    /**
     * @param $gender
     */
    public function setGender($gender)
    {
        $this->pol = $gender;
    }

    /**
     * Uzimanje zadnjih slova imena
     *
     * @param $num
     *
     * @return string
     */
    public function endingChars($num)
    {

        $negative_number = - 1 * $num;

        $letters = mb_substr($this->ime, $negative_number);

        if ($num > 1) {
            // Provera duplih karaktera i ponovno definisanje

            foreach ($this->double_letters as $letter) {
                // Ako je dupli karakter kao zadnja dva slova
                if ($letter === $letters && $num == 2) {
                    $letters = mb_substr($this->ime, - 3);
                }
                // Ako se dupli karakter nalazi u poslednja tri slova
                if (strpos($letter, $letters) != false && $num == 3) {
                    $letters = mb_substr($this->ime, - 4);
                }
            }
        }

        return $letters;

    }

    /**
     * Proverava da li je pol ženski
     *
     * @return bool
     */
    private function isFemale()
    {
        if ($this->pol == $this->zensko) {
            return true;
        }

        return false;
    }

    /**
     * Proverava da li je zadnje slovo samoglasnik
     *
     * @return bool
     */
    private function endsWithVowel()
    {
        if (in_array($this->endingChars(1), $this->vowels)) {
            return true;
        }

        return false;
    }

    /**
     * Proverava da li žensko ime spada u izuzetke
     *
     * @return bool
     */
    protected function femaleExceptions()
    {
        return in_array($this->ime, $this->female_exceptions);
    }

    /**
     * Proverava da li muško ime spada u izuzetke
     *
     * @return bool
     */
    protected function maleExceptions()
    {
        return in_array($this->ime, $this->male_exceptions);
    }

    /****************************************
     * 1 NOMINATIV - Ko, šta
     * **************************************
     *
     * @param string $ime
     *
     * @return string
     */
    public static function nominativ($ime)
    {
        $padez = new Padez($ime, 0);

        return $padez->showName();
    }

    /****************************************
     * 2 GENITIV - Od koga, od čega
     * **************************************
     *
     * @param string $ime
     * @param int $pol
     *
     * @return string
     */
    public static function genitiv($ime, $pol)
    {
        $padez = new Padez($ime, $pol);
        if ($padez->num_err > 0) {
            return $padez->showName();
        }
        if ($padez->isFemale()) {
            if ($padez->endsWithVowel()) {
                return $padez->showName('e', 1);
            } else {
                return $padez->showName();
            }
        } else {
            if ($padez->endsWith(array( 'tar', 'leksandar' ))) {
                return $padez->showName('ra', 2);
            } else if ($padez->endsWith('je')) {
                return $padez->showName('a', 1);
            } else if ($padez->endsWith(array( 'a', 'co' ))) {
                return $padez->showName('e', 1);
            } else if ($padez->endsWith('e')) {
                return $padez->showName('ta');
            } else if ($padez->endsWithVowel()) {
                return $padez->showName('a', 1);
            } else {
                return $padez->showName('a');
            }
        }
    }

    /****************************************
     * 3 DATIV - Kome, čemu
     * **************************************
     *
     * @param string $ime
     * @param int $pol
     *
     * @return string
     */
    public static function dativ($ime, $pol)
    {
        $padez = new Padez($ime, $pol);
        if ($padez->num_err > 0) {
            return $padez->showName();
        }
        if ($padez->isFemale()) {
            if ($padez->endsWithVowel()) {
                return $padez->showName('i', 1);
            } else {
                return $padez->showName();
            }
        } else {
            if ($padez->endsWith(array( 'tar', 'leksandar' ))) {
                return $padez->showName('ru', 2);
            } else if ($padez->endsWith(array( 'a', 'co' ))) {
                return $padez->showName('i', 1);
            } else if ($padez->endsWith(array('je', 'o'))) {
                return $padez->showName('u', 1);
            } else if ($padez->endsWith('e')) {
                return $padez->showName('tu');
            } else if ($padez->endsWithVowel()) {
                return $padez->showName('u', 1);
            } else {
                return $padez->showName('u');
            }
        }
    }

    /****************************************
     * 4 AKUZATIV - Koga, šta
     * **************************************
     *
     * @param string $ime
     * @param int $pol
     *
     * @return mixed
     */
    public static function akuzativ($ime, $pol)
    {
        $padez = new Padez($ime, $pol);
        if ($padez->num_err > 0) {
            return $padez->showName();
        }
        if ($padez->isFemale()) {
            if ($padez->endsWithVowel()) {
                return $padez->showName('u', 1);
            } else {
                return $padez->showName();
            }
        } else {
            if ($padez->endsWith(array( 'tar', 'leksandar' ))) {
                return $padez->showName('ra', 2);
            } else if ($padez->endsWith(array( 'a', 'co' ))) {
                return $padez->showName('u', 1);
            } else if ($padez->endsWith(array( 'je', 'o' ))) {
                return $padez->showName('a', 1);
            } else if ($padez->endsWith('e')) {
                return $padez->showName('ta');
            } else if ($padez->endsWithVowel()) {
                return $padez->showName('a', 1);
            } else {
                return $padez->showName('a');
            }
        }
    }

    /****************************************
     * 5 VOKATIV - Hej (za dozivanje)
     * **************************************
     *
     * @param string $ime
     * @param int $pol
     *
     * @return mixed
     */
    public static function vokativ($ime, $pol)
    {
        $padez = new Padez($ime, $pol);
        if ($padez->num_err > 0) {
            return $padez->showName();
        }
        if ($padez->isFemale()) {
            if ($padez->femaleExceptions()) {
                return $padez->showName('o', 1);
            } else if ($padez->endsWith('ca')) {
                return $padez->showName('e', 1);
            } else {
                return $padez->showName();
            }
        } else {
            if ($padez->endsWith('e') || $padez->maleExceptions()) {
                return $padez->showName();
            } else if ($padez->endsWith(array( 'ša', 'aca', 'ka', 'ma', 'ba' ))) { // Neša, Braca, Đoka, Ljuba
                return $padez->showName('o', 1);
            } else if ($padez->endsWith('ej')) {
                return $padez->showName();
            } else if ($padez->endsWith(array('š', 'j'))) {
                return $padez->showName('e');
            } else if ($padez->endsWithPrednjonepcani()) {
                return $padez->showName('u');
            } else if ($padez->endsWith('ca')) {
                return $padez->showName('e', 1);
            } else if ($padez->endsWith(array( 'tar', 'leksandar' ))) {
                return $padez->showName('re', 2);
            } else if ($padez->endsWithVowel()) {
                return $padez->showName();
            } else if ($padez->checkPalatization()) { // Palatalizacija
                return $padez->palatization();
            } else {
                return $padez->showName('e');
            }
        }
    }

    /****************************************
     * 6 INSTRUMENTAL - S kim, čim
     * **************************************
     *
     * @param string $ime
     * @param int $pol
     *
     * @return mixed
     */
    public static function instrumental($ime, $pol)
    {
        $padez = new Padez($ime, $pol);
        if ($padez->num_err > 0) {
            return $padez->showName();
        }
        if ($padez->isFemale()) {
            if ($padez->endsWithVowel()) {
                return $padez->showName('om', 1);
            } else {
                return $padez->showName();
            }
        } else {
            if ($padez->endsWith(array( 'tar', 'leksandar' ))) {
                return $padez->showName('rom', 2);
            } else if ($padez->endsWithPrednjonepcani()) { // Prednjonepčani - Uroš - Urošem
                return $padez->showName('em');
            } else if ($padez->endsWith('je')) {
                return $padez->showName('m');
            } else if ($padez->endsWith('e')) {
                return $padez->showName('tom');
            } else if ($padez->endsWithVowel()) {
                return $padez->showName('om', 1);
            } else {
                return $padez->showName('om');
            }
        }
    }

    /****************************************
     * 7 LOKATIV - O kome, o čemu
     * **************************************
     *
     * @param string $ime
     * @param int $pol
     *
     * @return mixed
     */
    public static function lokativ($ime, $pol)
    {
        $padez = new Padez($ime, $pol);
        if ($padez->num_err > 0) {
            return $padez->showName();
        }
        if ($padez->isFemale()) {
            if ($padez->endsWithVowel()) {
                return $padez->showName('i', 1);
            } else {
                return $padez->showName();
            }
        } else {
            if ($padez->endsWith(array( 'tar', 'leksandar' ))) {
                return $padez->showName('ru', 2);
            } else if ($padez->endsWith(array( 'a', 'co' ))) {
                return $padez->showName('i', 1);
            } else if ($padez->endsWith(array( 'je', 'o' ))) {
                return $padez->showName('u', 1);
            } else if ($padez->endsWith('e')) {
                return $padez->showName('tu');
            } else if ($padez->endsWithVowel()) {
                return $padez->showName('u', 1);
            } else {
                return $padez->showName('u');
            }
        }
    }

    /**
     * Prikazivanje imena
     *
     * @param string $sequel
     * @param null $trim
     *
     * @return string
     */
    protected function showName($sequel = '', $trim = null)
    {
        $trim = ($trim > 0) ? - 1 * $trim : $trim; // Force negative
        return mb_substr($this->ime, 0, $trim) . $sequel;
    }

    /**
     * Proverava da li se završava sa prednjonepčanim slovima
     *
     * @return bool
     */
    protected function endsWithPrednjonepcani()
    {
        return in_array($this->endingChars(1), $this->prednjonepcani);
    }

    /**
     * Proverava da li se završava sa slovima za palatalizaciju
     *
     * @return bool
     */
    protected function checkPalatization()
    {
        return (in_array($this->endingChars(1), $this->pal));
    }

    /**
     * Palatalizacija
     *
     * @return string
     */
    private function palatization()
    {
        return mb_substr($this->ime, 0, - 1) . str_replace($this->pal, $this->pal2, $this->endingChars(1)) . 'e';
    }

    /**
     * Proverava da li se ime ili imena završavaju sa navedenim slovima
     *
     * @param $letters
     *
     * @return bool
     */
    private function endsWith($letters)
    {
        if (is_array($letters)) {
            foreach ($letters as $letter) {
                if ($this->contains($letter)) {
                    return true;
                }
            }
        } else {
            return $this->contains($letters);
        }

        return false;
    }

    /**
     * Proverava da li se jedno ime završava sa navedenim slovima
     *
     * @param $letters
     *
     * @return bool
     */
    private function contains($letters)
    {
        return (($offset = strlen($this->ime) - strlen($letters)) >= 0
                && stripos($this->ime, $letters, $offset) !== false);
    }
}