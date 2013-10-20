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

include('vendor/malenki/argile/src/Malenki/Argile/Arg.php');
include('vendor/malenki/argile/src/Malenki/Argile/Options.php');

include('src/Malenki/Fictif/Password.php');
include('src/Malenki/Fictif/Login.php');
include('src/Malenki/Fictif/FirstName.php');
include('src/Malenki/Fictif/LastName.php');
include('src/Malenki/Fictif/Birthday.php');
include('src/Malenki/Fictif/Email.php');
include('src/Malenki/Fictif/User.php');


use Malenki\Argile\Arg as Arg;
use Malenki\Argile\Options as Options;


$opt = Options::getInstance();


$opt->flexible();



$opt->addGroup('block-disable', 'Disable some features');
$opt->addGroup('block-birthday', 'Birthday options');
$opt->addGroup('block-password', 'Password options');
$opt->addGroup('block-output', 'Output options');




$opt->newSwitch('switchNoPassword', 'block-disable')
    ->long('no-password')
    ->help('Do not create password')
    ;

$opt->newSwitch('switchNoLogin', 'block-disable')
    ->long('no-login')
    ->help('Do not create login')
    ;

$opt->newSwitch('switchNoBirthday', 'block-disable')
    ->long('no-birthday')
    ->help('Do not create birthday')
    ;

$opt->newSwitch('switchNoEmail', 'block-disable')
    ->long('no-email')
    ->help('Do not create email')
    ;

$opt->newSwitch('switchOnlyWomen', 'block-disable')
    ->long('only-women')
    ->help('Create only women users.')
    ;

$opt->newSwitch('switchOnlyMen', 'block-disable')
    ->long('only-men')
    ->help('Create only men users.')
    ;



$opt->newValue('minYear', 'block-birthday')
    ->required()
    ->long('min-year')
    ->help('Smaller four-digits year allowed for birthday. It cannot be set before 1900.', 'YYYY')
    ;

$opt->newValue('maxYear', 'block-birthday')
    ->required()
    ->long('max-year')
    ->help('Greater year allowed for birthday, into 4 digits. It cannot be greater than current year.', 'YYYY')
    ;




$opt->newValue('minPassword', 'block-password')
    ->required()
    ->long('min-password')
    ->help('Smaller password string length allowed.')
    ;

$opt->newValue('maxPassword', 'block-password')
    ->required()
    ->long('max-password')
    ->help('Greater password string length allowed.')
    ;



$opt->newValue('amount', 'block-output')
    ->required()
    ->short('n')
    ->long('amount')
    ->help('Users\'s quantity to create.')
    ;

$opt->newSwitch('switchJson', 'block-output')
    ->short('j')
    ->long('json')
    ->help('Output result as JSON.')
    ;

$opt->newSwitch('switchPhp', 'block-output')
    ->short('p')
    ->long('php')
    ->help('Output result as serialized PHP code.')
    ;

$opt->newSwitch('switchCsv', 'block-output')
    ->short('c')
    ->long('csv')
    ->help('Output result as CSV.')
    ;

$opt->newValue('output', 'block-output')
    ->required()
    ->short('o')
    ->long('output')
    ->help('File name into where the script writes its output result. No need to give extension too, this is done automatically', 'FILE')
    ;


$opt->parse();

$user = new User();

exit();

