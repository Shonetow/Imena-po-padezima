<?php

require __DIR__ . '/../vendor/autoload.php';

class MihailovTest extends PHPUnit_Framework_TestCase
{
    public $padez;
    
    public $imena_z = [
        'milica', 'Milena', 'ana', 'Ivana', 'ljilja',
        'Ceca', 'Maja', 'Zlata', 'Dana', 'Mira',
        'Sara', 'Neda', 'Nada', 'Teodora', 'Mica',
        'Lepa', 'Janja', 'Iva', 'Stana', 'Maša',
        'Goca', 'Persa', 'Bilja', 'Anđa', 'Sanja'
    ];
    public $imena_m = [
        'marko', 'Miloš', 'nenad', 'Stefan', 'nikola',
        'Saša', 'Paša', 'Luka', 'vuk', 'Pavle',
        'Andrej', 'Vanja', 'Branimir', 'Dragomir', 'Svetomir',
        'Aljoša', 'Balša', 'Jakša', 'Lazar', 'Filip',
        'Teodor', 'Đorđe', 'Dušan', 'Jovan', 'Mihailo'
    ];
    
    public function setUp()
    {
        $this->padez = new Shonetow\Padezi\Padez();
    }
    
    /**
     * 1
     * NOMINATIV ( KO? ŠTA? )
     */
    public function testNominativ()
    {
        // Žene
        $expected = [
            'Milica', 'Milena', 'Ana', 'Ivana', 'Ljilja',
            'Ceca', 'Maja', 'Zlata', 'Dana', 'Mira',
            'Sara', 'Neda', 'Nada', 'Teodora', 'Mica',
            'Lepa', 'Janja', 'Iva', 'Stana', 'Maša',
            'Goca', 'Persa', 'Bilja', 'Anđa', 'Sanja'
        ];
        foreach (array_combine($this->imena_z, $expected) as $ime_z => $expected) {
            $this->assertEquals($expected, $this->padez->nominativ($ime_z));
        }
        // Muškarci
        $expected = [
            'Marko', 'Miloš', 'Nenad', 'Stefan', 'Nikola',
            'Saša', 'Paša', 'Luka', 'Vuk', 'Pavle',
            'Andrej', 'Vanja', 'Branimir', 'Dragomir', 'Svetomir',
            'Aljoša', 'Balša', 'Jakša', 'Lazar', 'Filip',
            'Teodor', 'Đorđe', 'Dušan', 'Jovan', 'Mihailo'
        ];
        foreach (array_combine($this->imena_m, $expected) as $ime_m => $expected) {
            $this->assertEquals($expected, $this->padez->nominativ($ime_m));
        }
    }
    
    /**
     * 2
     * GENITIV ( OD KOGA? )
     */
    public function testGenitiv()
    {
        // Žene
        $expected = [
            'Milice', 'Milene', 'Ane', 'Ivane', 'Ljilje',
            'Cece', 'Maje', 'Zlate', 'Dane', 'Mire',
            'Sare', 'Nede', 'Nade', 'Teodore', 'Mice',
            'Lepe', 'Janje', 'Ive', 'Stane', 'Maše',
            'Goce', 'Perse', 'Bilje', 'Anđe', 'Sanje'
        ];
        foreach (array_combine($this->imena_z, $expected) as $ime_z => $expected) {
            $this->assertEquals($expected, $this->padez->genitiv($ime_z, 1));
        }
        // Muškarci
        $expected = [
            'Marka', 'Miloša', 'Nenada', 'Stefana', 'Nikole',
            'Saše', 'Paše', 'Luke', 'Vuka', 'Pavleta',
            'Andreja', 'Vanje', 'Branimira', 'Dragomira', 'Svetomira',
            'Aljoše', 'Balše', 'Jakše', 'Lazara', 'Filipa',
            'Teodora', 'Đorđa', 'Dušana', 'Jovana', 'Mihaila'
        ];
        foreach (array_combine($this->imena_m, $expected) as $ime_m => $expected) {
            $this->assertEquals($expected, $this->padez->genitiv($ime_m, 2));
        }
    }
    
    /**
     * 3
     * DATIV ( KOME? )
     */
    public function testDativ()
    {
        // Žene
        $expected = [
            'Milici', 'Mileni', 'Ani', 'Ivani', 'Ljilji',
            'Ceci', 'Maji', 'Zlati', 'Dani', 'Miri',
            'Sari', 'Nedi', 'Nadi', 'Teodori', 'Mici',
            'Lepi', 'Janji', 'Ivi', 'Stani', 'Maši',
            'Goci', 'Persi', 'Bilji', 'Anđi', 'Sanji'
        ];
        foreach (array_combine($this->imena_z, $expected) as $ime_z => $expected) {
            $this->assertEquals($expected, $this->padez->dativ($ime_z, 1));
        }
        // Muškarci
        $expected = [
            'Marku', 'Milošu', 'Nenadu', 'Stefanu', 'Nikoli',
            'Saši', 'Paši', 'Luki', 'Vuku', 'Pavletu',
            'Andreju', 'Vanji', 'Branimiru', 'Dragomiru', 'Svetomiru',
            'Aljoši', 'Balši', 'Jakši', 'Lazaru', 'Filipu',
            'Teodoru', 'Đorđu', 'Dušanu', 'Jovanu', 'Mihailu'
        ];
        foreach (array_combine($this->imena_m, $expected) as $ime_m => $expected) {
            $this->assertEquals($expected, $this->padez->dativ($ime_m, 2));
        }
    }
    
    /**
     * 4
     * AKUZATIV ( KOGA? )
     */
    public function testAkuzativ()
    {
        // Žene
        $expected = [
            'Milicu', 'Milenu', 'Anu', 'Ivanu', 'Ljilju',
            'Cecu', 'Maju', 'Zlatu', 'Danu', 'Miru',
            'Saru', 'Nedu', 'Nadu', 'Teodoru', 'Micu',
            'Lepu', 'Janju', 'Ivu', 'Stanu', 'Mašu',
            'Gocu', 'Persu', 'Bilju', 'Anđu', 'Sanju'
        ];
        foreach (array_combine($this->imena_z, $expected) as $ime_z => $expected) {
            $this->assertEquals($expected, $this->padez->akuzativ($ime_z, 1));
        }
        // Muškarci
        $expected = [
            'Marka', 'Miloša', 'Nenada', 'Stefana', 'Nikolu',
            'Sašu', 'Pašu', 'Luku', 'Vuka', 'Pavleta',
            'Andreja', 'Vanju', 'Branimira', 'Dragomira', 'Svetomira',
            'Aljošu', 'Balšu', 'Jakšu', 'Lazara', 'Filipa',
            'Teodora', 'Đorđa', 'Dušana', 'Jovana', 'Mihaila'
        ];
        foreach (array_combine($this->imena_m, $expected) as $ime_m => $expected) {
            $this->assertEquals($expected, $this->padez->akuzativ($ime_m, 2));
        }
    }
    
    //////////////////////// Problemi sa Ivo, Nikola
    /**
     * 5
     * VOKATIV ( OJ? HEJ? )
     */
    public function testVokativ()
    {
        // Žene
        $expected = [
            'Milice', 'Milena', 'Ana', 'Ivana', 'Ljiljo',
            'Ceco', 'Majo', 'Zlato', 'Dano', 'Miro',
            'Saro', 'Nedo', 'Nado', 'Teodora', 'Mico',
            'Lepo', 'Janjo', 'Ivo', 'Stano', 'Mašo',
            'Goco', 'Perso', 'Biljo', 'Anđo', 'Sanjo'
        ];
        foreach (array_combine($this->imena_z, $expected) as $ime_z => $expected) {
            $this->assertEquals($expected, $this->padez->vokativ($ime_z, 1));
        }
        // Muškarci
        $expected = [
            'Marko', 'Miloše', 'Nenade', 'Stefane', 'Nikola',
            'Saša', 'Pašo', 'Luka', 'Vuče', 'Pavle',
            'Andreja', 'Vanja', 'Branimire', 'Dragomire', 'Svetomire',
            'Aljoša', 'Balša', 'Jakša', 'Lazare', 'Filipe',
            'Teodore', 'Đorđe', 'Dušane', 'Jovane', 'Mihailo'
        ];
        foreach (array_combine($this->imena_m, $expected) as $ime_m => $expected) {
            $this->assertEquals($expected, $this->padez->vokativ($ime_m, 2));
        }
    }
    
    //////////////////////// Problemi sa Milicom, Markom
    /**
     * 6
     * INSTRUMENTAL ( S KIME? )
     */
    public function testInstrumental()
    {
        // Žene
        $expected = [
            'Milicom', 'Milenom', 'Anom', 'Ivanom', 'Ljiljom',
            'Cecom', 'Majom', 'Zlatom', 'Danom', 'Mirom',
            'Sarom', 'Nedom', 'Nadom', 'Teodorom', 'Micom',
            'Lepom', 'Janjom', 'Ivom', 'Stanom', 'Mašom',
            'Gocom', 'Persom', 'Biljom', 'Anđom', 'Sanjom'
        ];
        foreach (array_combine($this->imena_z, $expected) as $ime_z => $expected) {
            $this->assertEquals($expected, $this->padez->vokativ($ime_z, 1));
        }
        // Muškarci
        $expected = [
            'Markom', 'Milošem', 'Nenadom', 'Stefanom', 'Nikolom',
            'Sašom', 'Pašom', 'Lukom', 'Vukom', 'Pavlom',
            'Andrejom', 'Vanjom', 'Branimirom', 'Dragomirom', 'Svetomirom',
            'Aljošom', 'Balšom', 'Jakšom', 'Lazarom', 'Filipom',
            'Teodorom', 'Đorđem', 'Dušanom', 'Jovanom', 'Mihailom'
        ];
        foreach (array_combine($this->imena_m, $expected) as $ime_m => $expected) {
            $this->assertEquals($expected, $this->padez->vokativ($ime_m, 2));
        }
    }
    
    /**
     * 7
     * LOKATIV ( 0 KOME? NA KOME? PO KOME? U KOME? )
     */
    public function testLokativ()
    {
        // Žene
        $expected = [
            'Milici', 'Mileni', 'Ani', 'Ivani', 'Ljilji',
            'Ceci', 'Maji', 'Zlati', 'Dani', 'Miri',
            'Sari', 'Nedi', 'Nadi', 'Teodori', 'Mici',
            'Lepi', 'Janji', 'Ivi', 'Stani', 'Maši',
            'Goci', 'Persi', 'Bilji', 'Anđi', 'Sanji'
        ];
        foreach (array_combine($this->imena_z, $expected) as $ime_z => $expected) {
            $this->assertEquals($expected, $this->padez->lokativ($ime_z, 1));
        }
        // Muškarci
        $expected = [
            'Marku', 'Milošu', 'Nenadu', 'Stefanu', 'Nikoli',
            'Saši', 'Paši', 'Luki', 'Vuku', 'Pavletu',
            'Andreju', 'Vanji', 'Branimiru', 'Dragomiru', 'Svetomiru',
            'Aljoši', 'Balši', 'Jakši', 'Lazaru', 'Filipu',
            'Teodoru', 'Đorđu', 'Dušanu', 'Jovanu', 'Mihailu'
        ];
        foreach (array_combine($this->imena_m, $expected) as $ime_m => $expected) {
            $this->assertEquals($expected, $this->padez->lokativ($ime_m, 2));
        }
    }
}
