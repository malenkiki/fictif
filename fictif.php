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

define('DS', DIRECTORY_SEPARATOR);
define('ARGILE_PATH', __DIR__ . DS . 'vendor'.DS.'malenki'.DS.'argile'.DS.'src'.DS.'Malenki'.DS.'Argile'.DS);
define('FICTIF_PATH', __DIR__ . DS . 'src'.DS.'Malenki'.DS.'Fictif'.DS);

include(ARGILE_PATH . 'Arg.php');
include(ARGILE_PATH . 'Options.php');

include(FICTIF_PATH . 'Password.php');
include(FICTIF_PATH . 'Login.php');
include(FICTIF_PATH . 'FirstName.php');
include(FICTIF_PATH . 'LastName.php');
include(FICTIF_PATH . 'Birthday.php');
include(FICTIF_PATH . 'Email.php');
include(FICTIF_PATH . 'User.php');


use Malenki\Argile\Arg as Arg;
use Malenki\Argile\Options as Options;


date_default_timezone_set('UTC');


$opt = Options::getInstance();

$opt->description('Create fake poeple to populate some database, website or any other app you want while developing it. Fictif is the "Lorem ipsum" for data!');
$opt->version('Fictif CLI version 0.9');

$opt->flexible();



$opt->addGroup('block-disable', 'Disable some features');
$opt->addGroup('block-birthday', 'Birthday options');
$opt->addGroup('block-email', 'Email options');
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




$opt->newValue('emailAddDomain', 'block-email')
    ->required()
    ->long('eml-add-domains')
    ->help('Add new domain\'s names to defaults. Separate them by comma.', 'LIST')
    ;

$opt->newValue('emailAddExt', 'block-email')
    ->required()
    ->long('eml-add-exts')
    ->help('Add new extensions to defaults. Separate each extensions by a comma.', 'LIST')
    ;

$opt->newValue('emailSetDomain', 'block-email')
    ->required()
    ->long('eml-set-domain')
    ->help('Use only one domain NAME', 'NAME')
    ;

$opt->newValue('emailSetExt', 'block-email')
    ->required()
    ->long('eml-set-ext')
    ->help('Use only one extension EXT', 'EXT')
    ;




$opt->newValue('minPassword', 'block-password')
    ->required()
    ->long('pwd-min-size')
    ->help('Smaller password string length allowed.')
    ;

$opt->newValue('maxPassword', 'block-password')
    ->required()
    ->long('pwd-max-size')
    ->help('Greater password string length allowed.')
    ;

$opt->newValue('fixedPassword', 'block-password')
    ->required()
    ->long('pwd-one-size')
    ->help('Give size for a unique size password.')
    ;

$opt->newValue('allowPassword', 'block-password')
    ->required()
    ->long('pwd-other')
    ->help('Give some others characters to use in addition of characters used by default..')
    ;

$opt->newSwitch('lettersPassword', 'block-password')
    ->long('pwd-only-letters')
    ->help('The password must have only letters.')
    ;

$opt->newSwitch('digitsPassword', 'block-password')
    ->long('pwd-only-digits')
    ->help('The password must have only digits.')
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
    ->help('Output result as CSV. Unlike JSON and PHP, you must provide "output" option too.')
    ;

$opt->newValue('output', 'block-output')
    ->required()
    ->short('o')
    ->long('output')
    ->help('File name into where the script writes its output result. No need to give extension too, this is done automatically', 'FILE')
    ;


$opt->parse();

$user = new User();

if($opt->has('switchNoPassword'))
{
    $user->disablePassword();
}

if($opt->has('switchNoLogin'))
{
    $user->disableLogin();
}

if($opt->has('switchNoPassword'))
{
    $user->disablePassword();
}


if($opt->has('switchNoBirthday'))
{
    $user->disableBirthday();
}

if($opt->has('switchNoEmail'))
{
    $user->disableEmail();
}

if($opt->has('switchOnlyMen'))
{
    $user->firstName->onlyMen();
}

if($opt->has('switchOnlyWomen'))
{
    $user->firstName->onlyWomen();
}


if($opt->has('emailAddDomain'))
{
    // TODO: make some tests
    $user->email->allowThisDomain(explode(',', $opt->get('emailAddDomain')));
}

if($opt->has('emailAddExt'))
{
    // TODO: make some tests
    $user->email->allowThisExt(explode(',', $opt->get('emailAddExt')));
}

if($opt->has('emailSetDomain'))
{
    $user->email->setDomain($opt->get('emailSetDomain'));
}

if($opt->has('emailSetExt'))
{
    $user->email->setExt($opt->get('emailSetExt'));
}

if($opt->has('switchJson'))
{
    $str_json = $user->exportManyToJson((int) $opt->get('amount'));

    if($opt->has('output'))
    {
        file_put_contents($opt->get('output'), $str_json);
    }
    else
    {
        echo $str_json;
    }
}

if($opt->has('switchPhp'))
{
    $str_php = serialize($user->generateMany((int) $opt->get('amount')));

    if($opt->has('output'))
    {
        file_put_contents($opt->get('output'), $str_php);
    }
    else
    {
        echo $str_php;
    }
}

if($opt->has('switchCsv'))
{
    if(!$opt->has('output'))
    {
        echo "\nError, with 'CSV option', you must provide a filename with 'output' option.\n";
        exit(1);
    }

    $f = fopen($opt->get('output'), 'w');
    $arr = $user->generateMany((int) $opt->get('amount'));

    foreach($arr as $item)
    {
        $data = array();

        if(isset($item->login))
        {
            $data['login'] = $item->login;
        }

        $data['first_name'] = $item->name->first;
        $data['last_name'] = $item->name->last;

        if(isset($item->birthday))
        {
            $data['birthday'] = $item->birthday->date;
        }

        if(isset($item->password))
        {
            $data['original_password'] = $item->password->original;
            $data['md5_password'] = $item->password->md5;
        }

        if(isset($item->email))
        {
            $data['email'] = $item->email;
        }

        fputcsv($f, $data);
    }

    fclose($f);
}
exit();

