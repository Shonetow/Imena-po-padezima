<?php

require __DIR__ . '/../vendor/autoload.php';

class PadezTest extends PHPUnit_Framework_TestCase
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
        $name = 'ceca';

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Ceca', $p);

        // Od koga
        $p = $this->padez->genitiv($name, 1);
        $this->assertEquals('Cece', $p);

        // Kome
        $p = $this->padez->dativ($name, 1);
        $this->assertEquals('Ceci', $p);

        // Koga
        $p = $this->padez->akuzativ($name, 1);
        $this->assertEquals('Cecu', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, 1);
        $this->assertEquals('Ceco', $p);

        // S kim
        $p = $this->padez->instrumental($name, 1);
        $this->assertEquals('Cecom', $p);

        // O kome
        $p = $this->padez->lokativ($name, 1);
        $this->assertEquals('Ceci', $p);
    }

    public function testAna()
    {
        $name   = 'ana';
        $gender = 1;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Ana', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Ane', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Ani', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Anu', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Ana', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Anom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Ani', $p);
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
        $name   = 'nenad';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Nenad', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Nenada', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Nenadu', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Nenada', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Nenade', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Nenadom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Nenadu', $p);
    }

    public function testAca()
    {
        $name   = 'aca';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Aca', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Ace', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Aci', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Acu', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Aco', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Acom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Aci', $p);
    }

    public function testPetar()
    {
        $name   = 'petar';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Petar', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Petra', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Petru', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Petra', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Petre', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Petrom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Petru', $p);
    }

    public function testAleksandar()
    {
        $name   = 'aleksandar';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Aleksandar', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Aleksandra', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Aleksandru', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Aleksandra', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Aleksandre', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Aleksandrom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Aleksandru', $p);
    }

    public function testPredrag()
    {
        $name   = 'predrag';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Predrag', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Predraga', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Predragu', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Predraga', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Predraže', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Predragom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Predragu', $p);
    }

    public function testBraco()
    {
        $name   = 'braco';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Braco', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Brace', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Braci', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Bracu', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Braco', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Bracom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Braci', $p);
    }

    public function testPera()
    {
        $name   = 'pera';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Pera', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Pere', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Peri', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Peru', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Pero', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Perom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Peri', $p);
    }

    public function testMomcilo()
    {
        $name   = 'Momčilo';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Momčilo', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Momčila', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Momčilu', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Momčila', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Momčilo', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Momčilom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Momčilu', $p);
    }

    public function testMilivoje()
    {
        $name   = 'milivoje';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Milivoje', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Milivoja', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Milivoju', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Milivoja', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Milivoje', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Milivojem', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Milivoju', $p);
    }

    public function testĐorđe()
    {
        $name   = 'đorđe';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Đorđe', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Đorđa', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Đorđu', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Đorđa', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Đorđe', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Đorđem', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Đorđu', $p);
    }

    public function testSasa()
    {
        $name   = 'saša';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Saša', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Saše', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Saši', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Sašu', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Saša', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Sašom', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Saši', $p);
    }

    public function testUros()
    {
        $name   = 'uroš';
        $gender = 2;

        // Ko
        $p = $this->padez->nominativ($name);
        $this->assertEquals('Uroš', $p);

        // Od koga
        $p = $this->padez->genitiv($name, $gender);
        $this->assertEquals('Uroša', $p);

        // Kome
        $p = $this->padez->dativ($name, $gender);
        $this->assertEquals('Urošu', $p);

        // Koga
        $p = $this->padez->akuzativ($name, $gender);
        $this->assertEquals('Uroša', $p);

        // Hej (za dozivanje)
        $p = $this->padez->vokativ($name, $gender);
        $this->assertEquals('Uroše', $p);

        // S kim
        $p = $this->padez->instrumental($name, $gender);
        $this->assertEquals('Urošem', $p);

        // O kome
        $p = $this->padez->lokativ($name, $gender);
        $this->assertEquals('Urošu', $p);
    }
}
