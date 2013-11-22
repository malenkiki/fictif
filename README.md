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

Creating birthday dates is very simple. By default, this class can generate dates between 1900 and now, returning `string.

```php
$bd = new \Malenki\Fictif\Birthday();
$bd->format('d/m/Y'); // if not given, the date will be 'YYYY-MM-DD'
echo $bd->generateOne();
// you can use the object in string context too
echo $bd;
```

If you want, you can set minimal year and/or maximal year.

```php
$bd = new \Malenki\Fictif\Birthday();
$bd->minYear(1967);
$bd->maxYear(1980);
echo $bd;
```

You can generate one like seen into previous examples, or many dates.

```php
$bd = new \Malenki\Fictif\Birthday();
$bd->minYear(1967);
$bd->maxYear(1980);
$arr = $bd->generateMany(23);
foreach($arr as $k => $v)
{
    printf('Date #%d: %s', $k + 1, $v);
}
```
Simple, isn't it?


### Email Class

This class is very flexible.

By default, will take randomly domain and extension, the account is generated or can be set.

So, domain and extension can be fixed (i.e. always the same at every generation), or you can put your sets too.

```php
$m = \Malenki\Fictif\Email();
$m->allowThisDomain(array('one','other')); // add new available domains
$m->allowThisExt(array('ru', 'jp')); // add some other extensions
//OR, for only one choice:
$m->setDomain('foo'); // will be always xxxx@foo.xx
$m->setExt('fr'); // will be always xxxx@xxx.fr
```

Like for `Birthday` class, you have `generateOne()` and `generateMany()` methods.

And, in string context, this class is like a string too.

```php
$m = new \Malenki\Fictif\Email();
echo $m;
```

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

The `LastName` class use only `takeOne()` and `takeMany()` methods, and works the same way as `FirstName` class, including the `toString()` behavior too.

### Login Class

This is very simple to use. Only two methods: `generateOne()` and `generateMany()`. As others classes, use the `toString()` behavior too.

This class generate login commposed of pseudo syllabs.

So, just for you, one example:

```php
$l = new \Malenki\Fictif\Login();
echo $l->generateOne()
//or just:
echo $l;
```

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

User class allows you to play with all previous classes together.

Each of them can be accessed by property. So, for example, to customize password, you can do that:

``` php
$u = new \Malenki\Fictif\User();
$u->password->onlyDigits();
```

Simple, no?

But, if you want only some data, you can disable some of them by calling methods `disableX()` where X is the name of the property to disable. So, to disable login generator, just do:

``` php
$u = new \Malenki\Fictif\User();
$u->disableLogin();
```

As other classes, `User` class has `generateOne()` and `generateMany()`, but no `toString()` feature, and `generateOne()` return `stdClass` object.

Two other methods are avaible, to get __json__ output:

```php
$u = new \Malenki\Fictif\User();
$u->exportOneToJson(); // to have only one user
$u->exportManyToJson(10); // to have ten users
```

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


Following lines show you the `--help` option output:

``` text
pc18:fictif michel$ ./fictif --help
Usage: fictif [OPTIONS]…
Create fake poeple to populate some database, website or any other app you want
while developing it. Fictif is the "Lorem ipsum" for data!


Disable some features
      --no-password          Do not create password
      --no-login             Do not create login
      --no-birthday          Do not create birthday
      --no-email             Do not create email
      --only-women           Create only women users.
      --only-men             Create only men users.


Birthday options
      --min-year=YYYY        Smaller four-digits year allowed for birthday. It
                             cannot be set before 1900.
      --max-year=YYYY        Greater year allowed for birthday, into 4 digits.
                             It cannot be greater than current year.


Email options
      --eml-add-domains=LIST Add new domain's names to defaults. Separate them
                             by comma.
      --eml-add-exts=LIST    Add new extensions to defaults. Separate each
                             extensions by a comma.
      --eml-set-domain=NAME  Use only one domain NAME
      --eml-set-ext=EXT      Use only one extension EXT


Password options
      --pwd-min-size=VALUE   Smaller password string length allowed.
      --pwd-max-size=VALUE   Greater password string length allowed.
      --pwd-one-size=VALUE   Give size for a unique size password.
      --pwd-other=VALUE      Give some others characters to use in addition of
                             characters used by default..
      --pwd-only-letters     The password must have only letters.
      --pwd-only-digits      The password must have only digits.


Output options
  -n, --amount=VALUE         Users's quantity to create.
  -j, --json                 Output result as JSON.
  -p, --php                  Output result as serialized PHP code.
  -c, --csv                  Output result as CSV. Unlike JSON and PHP, you must
                             provide "output" option too.
  -o, --output=FILE          File name into where the script writes its output
                             result. No need to give extension too, this is done
                             automatically


  -h, --help                 Display this help message and exit
      --version              Display version information and exit

```

Enjoy creating fake people!

