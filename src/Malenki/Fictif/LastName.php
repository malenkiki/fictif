<?php
/*
Copyright (c) 2013 Michel Petit <petit.michel@gmail.com>

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace Malenki\Fictif;

class LastName
{
    protected static $arr_last_name = array(
        'Abitbol',
        'Adam',
        'Albert',
        'Alexandre',
        'Allain',
        'Allard',
        'Allouche',
        'Alvarez',
        'Alves',
        'Amar',
        'Amsellem',
        'André',
        'Andrieu',
        'Antoine',
        'Armand',
        'Arnaud',
        'Arnould',
        'Attal',
        'Attia',
        'Aubert',
        'Aubin',
        'Aubry',
        'Auger',
        'Azoulay',
        'Ba',
        'Bailly',
        'Barbe',
        'Barbier',
        'Baron',
        'Barre',
        'Barrier',
        'Barthelemy',
        'Baudouin',
        'Baudry',
        'Bauer',
        'Bazin',
        'Beaumont',
        'Becker',
        'Begue',
        'Bellaiche',
        'Bellanger',
        'Ben',
        'Benard',
        'Benhamou',
        'Benichou',
        'Benoist',
        'Benoit',
        'Bensoussan',
        'Berard',
        'Berger',
        'Bernard',
        'Bernier',
        'Berthelot',
        'Berthet',
        'Berthier',
        'Bertin',
        'Bertrand',
        'Besnard',
        'Besse',
        'Besson',
        'Bigot',
        'Billard',
        'Binet',
        'Bismuth',
        'Blanc',
        'Blanchard',
        'Blanchet',
        'Blin',
        'Bloch',
        'Blondel',
        'Blot',
        'Bob',
        'Bodin',
        'Boisseau',
        'Bon',
        'Bond',
        'Bonneau',
        'Bonnefoy',
        'Bonnet',
        'Bonnin',
        'Bordes',
        'Bouchard',
        'Bouche',
        'Boucher',
        'Bouchet',
        'Boulanger',
        'Boulay',
        'Boulet',
        'Bouquet',
        'Bourdin',
        'Bourdon',
        'Bourgeois',
        'Bousquet',
        'Boutin',
        'Bouvet',
        'Bouvier',
        'Boyer',
        'Brachet',
        'Brault',
        'Breton',
        'Briand',
        'Briere',
        'Brion',
        'Brun',
        'Bruneau',
        'Brunel',
        'Brunet',
        'Buffet',
        'Bui',
        'Buisson',
        'Bureau',
        'Cadet',
        'Camus',
        'Cardon',
        'Carlier',
        'Caron',
        'Carpentier',
        'Carre',
        'Carriere',
        'Cartier',
        'Casanova',
        'Castel',
        'Champion',
        'Chapuis',
        'Charles',
        'Charpentier',
        'Charrier',
        'Chartier',
        'Chauveau',
        'Chauvet',
        'Chauvin',
        'Chene',
        'Chevalier',
        'Chevallier',
        'Chevrier',
        'Chollet',
        'Chretien',
        'Claude',
        'Clement',
        'Clerc',
        'Cochet',
        'Coco',
        'Cohen',
        'Colas',
        'Colin',
        'Collet',
        'Collin',
        'Cordier',
        'Cornet',
        'Cornu',
        'Costa',
        'Coste',
        'Couderc',
        'Coudert',
        'Coulon',
        'Courtois',
        'Cousin',
        'Couturier',
        'Cros',
        'Cuny',
        'Da costa',
        'Dahan',
        'Daniel',
        'Darmon',
        'Da silva',
        'David',
        'Dede',
        'Delage',
        'Delahaye',
        'Delannoy',
        'Delattre',
        'Delaunay',
        'Delcourt',
        'Delmas',
        'Delorme',
        'Denis',
        'Desbois',
        'Descamps',
        'Deschamps',
        'Deshayes',
        'De sousa',
        'Devaux',
        'Dias',
        'Diaz',
        'Didier',
        'Dore',
        'Dos santos',
        'Doucet',
        'Dubois',
        'Dubreuil',
        'Dubus',
        'Duchemin',
        'Duchene',
        'Duchesne',
        'Duclos',
        'Dufour',
        'Duhamel',
        'Dujardin',
        'Dumas',
        'Dumont',
        'Dupin',
        'Dupond',
        'Dupont',
        'Dupre',
        'Dupuis',
        'Dupuy',
        'Duquesne',
        'Durand',
        'Durant',
        'Duval',
        'Elbaz',
        'Esnault',
        'Etienne',
        'Evrard',
        'Fabre',
        'Faivre',
        'Faucher',
        'Faure',
        'Favre',
        'Fernandes',
        'Fernandez',
        'Ferrand',
        'Ferrari',
        'Ferre',
        'Ferreira',
        'Ferry',
        'Fischer',
        'Fitoussi',
        'Fleury',
        'Fontaine',
        'Forest',
        'Fort',
        'Fortin',
        'Foucher',
        'Fouquet',
        'Fournier',
        'Franck',
        'Francois',
        'Fred',
        'Gabriel',
        'Gaillard',
        'Gallet',
        'Gallois',
        'Garcia',
        'Garnier',
        'Gaultier',
        'Gauthier',
        'Gautier',
        'Gay',
        'Genin',
        'Geoffroy',
        'George',
        'Georges',
        'Gerard',
        'Germain',
        'Gervais',
        'Gibert',
        'Gicquel',
        'Gilbert',
        'Gilles',
        'Gillet',
        'Girard',
        'Giraud',
        'Girault',
        'Godard',
        'Godefroy',
        'Gomes',
        'Gomez',
        'Gonçalves',
        'Gonzalez',
        'Gosselin',
        'Grand',
        'Gras',
        'Gregoire',
        'Grenier',
        'Gros',
        'Guedj',
        'Gueguen',
        'Guerin',
        'Guez',
        'Guibert',
        'Guichard',
        'Guignard',
        'Guilbert',
        'Guillaume',
        'Guillemin',
        'Guillemot',
        'Guillon',
        'Guillot',
        'Guillou',
        'Guy',
        'Guyon',
        'Guyot',
        'Ha',
        'Haddad',
        'Halimi',
        'Hamel',
        'Hamon',
        'Hardouin',
        'Hardy',
        'Hebert',
        'Henri',
        'Henry',
        'Hernandez',
        'Herve',
        'Hoffmann',
        'Hubert',
        'Hue',
        'Huet',
        'Humbert',
        'Husson',
        'Huynh',
        'Imbert',
        'Jacob',
        'Jacquemin',
        'Jacques',
        'Jacquet',
        'Jacquot',
        'James',
        'Jamet',
        'Jan',
        'Jean',
        'John',
        'Jolivet',
        'Joly',
        'Joseph',
        'Joubert',
        'Jourdain',
        'Jourdan',
        'Julien',
        'Jullien',
        'Klein',
        'Labbe',
        'Lacombe',
        'Lacoste',
        'Lacour',
        'Lacroix',
        'Lafon',
        'Lafond',
        'Lagarde',
        'Lagrange',
        'Laine',
        'Lam',
        'Lambert',
        'Lamotte',
        'Lamy',
        'Langlois',
        'Laporte',
        'Laroche',
        'Lasserre',
        'Launay',
        'Laurent',
        'Laval',
        'Lavigne',
        'Le',
        'Le berre',
        'Leblanc',
        'Leblond',
        'Lebon',
        'Lebreton',
        'Lebrun',
        'Leclerc',
        'Leclercq',
        'Lecomte',
        'Leconte',
        'Lecoq',
        'Le corre',
        'Lecuyer',
        'Ledoux',
        'Leduc',
        'Lee',
        'Lefebvre',
        'Lefevre',
        'Le floch',
        'Lefort',
        'Le gall',
        'Legendre',
        'Leger',
        'Le goff',
        'Legrand',
        'Legros',
        'Le guen',
        'Lejeune',
        'Leleu',
        'Lelievre',
        'Lelong',
        'Lemaire',
        'Lemaitre',
        'Lemarchand',
        'Lemoine',
        'Lemonnier',
        'Lenoir',
        'Leon',
        'Leonard',
        'Lepage',
        'Leray',
        'Le roux',
        'Leroux',
        'Le roy',
        'Leroy',
        'Lesage',
        'Letellier',
        'Leveque',
        'Levy',
        'Loiseau',
        'Lolo',
        'Lombard',
        'Lopes',
        'Lopez',
        'Louis',
        'Lucas',
        'Ly',
        'Ma',
        'Mace',
        'Mahe',
        'Maillard',
        'Maillet',
        'Maisonneuve',
        'Maitre',
        'Mallet',
        'Mangin',
        'Marc',
        'Marcel',
        'Marchal',
        'Marchand',
        'Marechal',
        'Marie',
        'Marin',
        'Marion',
        'Marques',
        'Marquet',
        'Marquis',
        'Marteau',
        'Martel',
        'Martin',
        'Martineau',
        'Martinet',
        'Martinez',
        'Martins',
        'Marty',
        'Mary',
        'Mas',
        'Masse',
        'Masson',
        'Mathieu',
        'Maurel',
        'Maurice',
        'Maurin',
        'Maury',
        'Mayer',
        'Menard',
        'Mercier',
        'Merle',
        'Merlin',
        'Metayer',
        'Meunier',
        'Meyer',
        'Michaud',
        'Michel',
        'Michelet',
        'Millet',
        'Millot',
        'Moi',
        'Momo',
        'Monnier',
        'Morand',
        'Moreau',
        'Morel',
        'Moreno',
        'Morin',
        'Morvan',
        'Moulin',
        'Mouton',
        'Muller',
        'Nataf',
        'Navarro',
        'Neveu',
        'Nguyen',
        'Nicolas',
        'Noël',
        'Normand',
        'Olivier',
        'Ollivier',
        'Pages',
        'Papin',
        'Parent',
        'Paris',
        'Parmentier',
        'Partouche',
        'Pascal',
        'Pasquier',
        'Paul',
        'Payet',
        'Pelissier',
        'Pelletier',
        'Peltier',
        'Pereira',
        'Perez',
        'Perin',
        'Peron',
        'Perret',
        'Perrier',
        'Perrin',
        'Perrot',
        'Petit',
        'Petitjean',
        'Pham',
        'Phan',
        'Philippe',
        'Picard',
        'Pichon',
        'Pierre',
        'Pillet',
        'Pineau',
        'Pinon',
        'Pinto',
        'Poirier',
        'Poisson',
        'Poncet',
        'Pons',
        'Portier',
        'Potier',
        'Poulain',
        'Prevost',
        'Prigent',
        'Proust',
        'Pujol',
        'Quere',
        'Raoul',
        'Rault',
        'Raymond',
        'Raynal',
        'Raynaud',
        'Redon',
        'Regnier',
        'Remy',
        'Renard',
        'Renaud',
        'Renault',
        'Rey',
        'Reynaud',
        'Ribeiro',
        'Ricard',
        'Richard',
        'Rigal',
        'Rigaud',
        'Riou',
        'Riviere',
        'Robert',
        'Robin',
        'Roche',
        'Rocher',
        'Rodrigues',
        'Rodriguez',
        'Roger',
        'Rolland',
        'Rollin',
        'Rondeau',
        'Roques',
        'Rose',
        'Rossi',
        'Rossignol',
        'Rousseau',
        'Roussel',
        'Rousselle',
        'Rousset',
        'Roux',
        'Rouxel',
        'Roy',
        'Royer',
        'Ruiz',
        'Salmon',
        'Salomon',
        'Samson',
        'Sanchez',
        'Sarfati',
        'Saunier',
        'Sauvage',
        'Schmitt',
        'Schneider',
        'Schwartz',
        'Sebban',
        'Seguin',
        'Serre',
        'Simon',
        'Simonet',
        'Sitbon',
        'Smadja',
        'Smith',
        'Stephan',
        'Sultan',
        'Taieb',
        'Tanguy',
        'Tardieu',
        'Tardy',
        'Teixeira',
        'Tellier',
        'Terrier',
        'Tessier',
        'Thery',
        'Thibault',
        'Thierry',
        'Thomas',
        'Tissier',
        'Tran',
        'Truong',
        'Uzan',
        'Vaillant',
        'Valentin',
        'Valette',
        'Vallee',
        'Vallet',
        'Vannier',
        'Vasseur',
        'Verdier',
        'Veron',
        'Vial',
        'Viard',
        'Vidal',
        'Vignon',
        'Villard',
        'Villeneuve',
        'Vincent',
        'Vivier',
        'Voisin',
        'Wagner',
        'Weber',
        'Wolff',
        'Zeitoun'
    );

    public function takeOne()
    {
        return self::$arr_last_name[array_rand(self::$arr_last_name)];
    }

    public function takeMany($amount = 10)
    {
        $arr_out = array();

        for ($i = 0; $i < $amount; $i++) {
            $arr_out[] = $this->takeOne();
        }

        return $arr_out;
    }

    public function __toString()
    {
        return $this->takeOne();
    }
}
