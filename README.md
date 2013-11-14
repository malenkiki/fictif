# Fictif

Create random fictive people or some of their informations to use as fake data.

## Use Only The Classes

In order to generate what you want, into the more simple way, I have design this library into several small parts. So, if you want only generate fake passwordq, you can.

### Birthday Class

Creating birthday dates is very simple. By default, this class can generate dates between 1900 and now, returning `DateTime` object.

```php
$bd = new \Malenki\Fictif\Birthday();
echo $bd->generateOne()->format('Y-m-d');
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
TODO

### Login Class
TODO

### Password Class
TODO

### Putting it all together: The User Class
TODO

## Use The CLI App

Before using the CLI app, be sure you have PHP CLI and [composer](http://getcomposer.org/) installed on your system, and then, go to the root projects to execute this:

```
composer install
```

After that, you can do a simple `php fictif.php` to have the list of all available options.

Try it, you can output result as __JSON__, __serialized PHP__ or __CSV__.

