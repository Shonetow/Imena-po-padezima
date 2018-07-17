<?php

require __DIR__ . '/../vendor/autoload.php';

class PadezCirilicaTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \Shonetow\Padezi\Padez
     */
    protected $padez;

    public function setUp()
    {
        $this->padez = new Shonetow\Padezi\Padez();
    }

    public function testCeca()
    {
        $name = 'цеца';

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Цеца', $p);

        // Od koga
        $p = $this->padez->genitiv($name, 1);
        $this->assertEquals('Цеце', $p);

        // Kome
        $p = $this->padez->dativ($name, 1);
        $this->assertEquals('Цеци', $p);

        // Koga
        $p = $this->padez->akuzativ($name, 1);
        $this->assertEquals('Цецу', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, 1);
        $this->assertEquals('Цецо', $p);

        // S kim
        $p = $this->padez->instrumental($name, 1);
        $this->assertEquals('Цецом', $p);

        // O kome
        $p = $this->padez->lokativ($name, 1);
        $this->assertEquals('Цеци', $p);
    }

    public function testAna()
    {
        $name   = 'ана';
        $gender = 1;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Ана', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Ане', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Ани', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Ану', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Ана', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Аном', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Ани', $p);
    }

    /**************************************************
     *
     *
     *
     * MEN
     *
     *
     */

    public function testNenad()
    {
        $name   = 'ненад';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Ненад', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Ненада', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Ненаду', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Ненада', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Ненаде', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Ненадом', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Ненаду', $p);
    }

    public function testAca()
    {
        $name   = 'аца';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Аца', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Аце', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Аци', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Ацу', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Ацо', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Ацом', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Аци', $p);
    }

    public function testPetar()
    {
        $name   = 'петар';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Петар', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Петра', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Петру', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Петра', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Петре', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Петром', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Петру', $p);
    }

    public function testAleksandar()
    {
        $name   = 'александар';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Александар', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Александра', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Александру', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Александра', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Александре', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Александром', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Александру', $p);
    }

    public function testPredrag()
    {
        $name   = 'предраг';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Предраг', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Предрага', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Предрагу', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Предрага', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Предраже', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Предрагом', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Предрагу', $p);
    }

    public function testBraco()
    {
        $name   = 'брацо';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Брацо', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Браце', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Браци', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Брацу', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Брацо', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Брацом', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Браци', $p);
    }

    public function testPera()
    {
        $name   = 'пера';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Пера', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Пере', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Пери', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Перу', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Перо', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Пером', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Пери', $p);
    }

    public function testMomcilo()
    {
        $name   = 'Момчило';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Момчило', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Момчила', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Момчилу', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Момчила', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Момчило', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Момчилом', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Момчилу', $p);
    }

    public function testMilivoje()
    {
        $name   = 'миливоје';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Миливоје', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Миливоја', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Миливоју', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Миливоја', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Миливоје', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Миливојем', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Миливоју', $p);
    }

    public function testĐorđe()
    {
        $name   = 'ђорђе';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Ђорђе', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Ђорђа', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Ђорђу', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Ђорђа', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Ђорђе', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Ђорђем', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Ђорђу', $p);
    }

    public function testSasa()
    {
        $name   = 'саша';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Саша', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Саше', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Саши', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Сашу', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Саша', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Сашом', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Саши', $p);
    }

    public function testUros()
    {
        $name   = 'урош';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Урош', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Уроша', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Урошу', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Уроша', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Уроше', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Урошем', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Урошу', $p);
    }
}
