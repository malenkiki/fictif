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



/**
 * Generate fake user(s) 
 * 
 * @author Michel Petit <petit.michel@gmail.com> 
 * @license MIT
 */
class User
{
    protected $login = null;
    
    protected $firstName = null;
    
    protected $lastName = null;
    
    protected $birthday = null;
    
    protected $password = null;
    
    protected $email = null;



    public function __get($name)
    {
        if(in_array($name, array('login', 'firstName', 'lastName', 'birthday', 'password', 'email')))
        {
            return $this->$name;
        }
    }



    public function __construct()
    {
        $this->login = new Login();
        $this->firstName = new FirstName();
        $this->lastName = new LastName();
        $this->birthday = new Birthday();
        $this->password = new Password();
        $this->email = new Email();
    }



    public function disableLogin()
    {
        $this->login = null;
    }



    public function disableBirthday()
    {
        $this->birthday = null;
    }



    public function disablePassword()
    {
        $this->password = null;
    }



    public function disableEmail()
    {
        $this->email = null;
    }



    public function generateOne()
    {
        $out = new \stdClass();

        if($this->login)
        {
            $out->login = $this->login->generateOne();
        }

        $out->name = new \stdClass();
        $out->name->first = $this->firstName->takeOne();
        $out->name->last = $this->lastName->takeOne();

        if($this->birthday)
        {
            $birthday = $this->birthday->generateOne();

            $out->birthday = new \stdClass();
            $out->birthday->date = $birthday->format('Y-m-d');
            $out->birthday->year = (int) $birthday->format('Y');
            $out->birthday->month = (int) $birthday->format('n');
            $out->birthday->day = (int) $birthday->format('j');
        }

        if($this->password)
        {
            $str_password = $this->password->generateOne();

            $out->password = new \stdClass();
            $out->password->original = $str_password;
            $out->password->md5 = md5($str_password);
        }

        if($this->email)
        {
            $out->email = $this->email->generateOne();
        }

        return $out;
    }



    public function generateMany($amount)
    {
        if(!is_integer($amount) || $amount <= 0)
        {
            throw new \InvalidArgumentException('Amount must be a positive number.');
        }

        $arr_out = array();

        for($i = 0; $i < $amount; $i++)
        {
            $arr_out[] = $this->generateOne();
        }
        
        return $arr_out;
    }



    public function exportOneToJson()
    {
        return json_encode($this->generateOne());
    }
    
    
    
    public function exportManyToJson($amount)
    {
        return json_encode($this->generateMany($amount));
    }
}
