<?php

require __DIR__ . '/../vendor/autoload.php';

class VokativTest extends PHPUnit_Framework_TestCase
{
    public function testFemale()
    {
        $vokativ_name = \Shonetow\Padezi\Vokativ::female('ceca');

        $this->assertEquals('Ceco', $vokativ_name);
    }

    public function testMale()
    {
        $vokativ_name = \Shonetow\Padezi\Vokativ::male('predrag');

        $this->assertEquals('Predraže', $vokativ_name);
    }
}
