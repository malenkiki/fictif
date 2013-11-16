# Fictif

Create random fictive people or some of their informations to use as fake data.

## Use Only The Classes

In order to generate what you want, into the more simple way, I have design this library into several small parts. So, if you want only generate fake passwords, you can.

To use my classes into your own project, the best way is to use [composer](http://getcomposer.org/). So, edit your `composer.json`and add this into require packages:

```json
"require": {
    "malenki/fictif": "dev-master"
}
```

### Birthday Class

Creating birthday dates is very simple. By default, this class can generate dates between 1900 and now, returning `DateTime` object.

```php
$bd = new \Malenki\Fictif\Birthday();
echo $bd->generateOne()->format('Y-m-d');
// you can use the object in string context too, in this case, the date will be 'YYYY-MM-DD'
echo $bd;
```

If you want, you can set minimal year and/or maximal year.

```php
$bd = new \Malenki\Fictif\Birthday();
$bd->minYear(1967);
$bd->maxYear(1980);
echo $bd->generateOne()->format('Y-m-d');
```

You can generate one like seen into previous examples, or many dates.

```php
$bd = new \Malenki\Fictif\Birthday();
$bd->minYear(1967);
$bd->maxYear(1980);
$arr = $bd->generateMany(23);
foreach($arr as $k => $v)
{
    printf('Date #%d: %s', $k + 1, $v->format('Y-m-d'));
}
```
Simple, isn't it?


### Email Class
TODO

### FirstName and LastName Classes

This classes have a lot of french samples of many origins, so, you can get a great variety of first and last names!

Using `FirstName` class is very simple. To get one random firstname, do the following:

```php
$fn = new \Malenki\Fictif\FirstName();
echo $fn->takeOne();
// or just that in string context:
echo $fn;
```

OK, but if you want femal firstnames only, you can do that:

```php
$fn = new \Malenki\Fictif\FirstName();
$fn->onlyWomen();
echo $fn->takeOne();
```

For men, without surprise:

```php
$fn = new \Malenki\Fictif\FirstName();
$fn->onlyMen();
echo $fn->takeOne();
```

For names that can be both for women or men:

```php
$fn = new \Malenki\Fictif\FirstName();
$fn->onlyBoth();
echo $fn->takeOne();
```

You can generate several at once too:

```php
$fn = new \Malenki\Fictif\FirstName();
$fn->onlyWomen();
$arr = $fn->takeMany(20);
var_dump($arr);
foreach($arr as $k => $v)
{
    printf('Firstname #%d: %s', $k + 1, $v);
}
```

The `LastName` class use only `takeOne()` and `takeMany()` methods, and works the same way as `FirstName` class, including the `__toString()` behavior too.

### Login Class
TODO

### Password Class

Password Class allows you to play with length and characters.

You can give a minimal and/or maximal length:

``` php
$p = new \Malenki\Fictif\Password();
$p->minimal(5)->maximal(15);
echo $p->generateOne();
```

If not set by you, the min/max are 5 and 20.

You can set the length to have always the same numbers of chars too:

```php
$p = new \Malenki\Fictif\Password();
$p->fixedSize(4);
echo $p->generateOne();
// you can do that too:
echo $p;
```

You can add some characters…

```php
$p = new \Malenki\Fictif\Password();
$p->allowThis('-_/^$&');
echo $p;
```

or just use letters…

```php
$p = new \Malenki\Fictif\Password();
$p->onlyLetters();
echo $p;
```

or just digits, as you want!

```php
$p = new \Malenki\Fictif\Password();
$p->onlyDigits();
echo $p
```

### Putting it all together: The User Class
TODO

## Use The CLI App

Before using the CLI app, be sure you have PHP CLI and [composer](http://getcomposer.org/) installed on your system.

Download the source code of this project, or just git clone it.

```bash
git clone https://github.com/malenkiki/fictif.git
```

Then, go to the root projects to execute this:

```
composer install
```

After that, you can do a simple `./fictif` to have the list of all available options. I think that help available into this CLI script is enough, no need to do more blahblah here ;-)

Try it, you can output result as __JSON__, __serialized PHP__ or __CSV__.

Enjoy creating fake people!

