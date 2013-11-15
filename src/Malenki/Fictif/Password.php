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
 * Generate custom password 
 * 
 * Password can have minimum and maximum size, can use letters, digits, 
 * together or not, with other custom chars…
 *
 * @author Michel Petit <petit.michel@gmail.com>
 * @license MIT
 */
class Password
{
    protected $int_minimum = 5;
    protected $int_maximum = 20;
    protected $arr_allow = array();



    /**
     * Constructor.
     *
     * Initialize default range of characters to generate password 
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        $this->arr_allow = array_merge(
            range('a', 'z'),
            range('A', 'Z'),
            range(0, 9)
        );
    }



    /**
     * Set custom minimum size for the password.
     * 
     * @param integer $int 
     * @access public
     * @return Password
     */
    public function minimum($int = 5)
    {
        if(!is_integer($int) || $int <= 0)
        {
            throw new \InvalidArgumentException('Minimum size for password must be a positive number');
        }

        $this->int_minimum = $int;
        return $this;
    }



    /**
     * Set custom maximum size for the password
     * 
     * @param integer $int 
     * @access public
     * @return Password
     */
    public function maximum($int = 20)
    {
        if(!is_integer($int) || $int < $this->int_minimum)
        {
            throw new \InvalidArgumentException('Maximum size for password must be greater than minimum size.');
        }

        if($int <= 0)
        {
            throw new \InvalidArgumentException('Maximum size for password must be a positive number');
        }

        $this->int_maximum = $int;
        return $this;
    }



    /**
     * Set fixed size for the password.
     *
     * One single size only for the password, the same as setting minimum and 
     * maximum size at the same value. 
     * 
     * @param integer $int 
     * @access public
     * @return Password
     */
    public function fixedSize($int)
    {
        if(!is_integer($int) || $int <= 0)
        {
            throw new \InvalidArgumentException('Fixed size of a password must be a positive number.');
        }

        $this->int_minimum = $int;
        $this->int_maximum = $int;

        return $this;
    }



    /**
     * Add other allowed characters to generate password.
     *
     * You can add other chars by array of chars or a string.
     *
     * @param mixed $mix 
     * @access public
     * @return Password
     */
    public function allowThis($mix)
    {
        if(is_array($mix))
        {
            foreach($mix as $item)
            {
                if(is_scalar($item))
                {
                    if(is_float($item) || is_bool($item))
                    {
                        $item = (integer) $item;
                    }
                    $this->arr_allow[] = $item;
                }
            }
        }
        elseif(is_scalar($mix))
        {
            if(is_float($mix) || is_bool($mix))
            {
                $mix = (integer) $mix;
            }

            if(mb_strlen($mix))
            {
                for($i = 0; $i < mb_strlen($mix, 'UTF-8'); $i++)
                {
                    $this->arr_allow[] = mb_substr($mix, $i, 1, 'UTF-8');
                }
            }
            else
            {
                throw new \InvalidArgumentException('Adding allowed chars to password must be done with not null string.');
            }
        }
        else
        {
            throw new \InvalidArgumentException('Adding allowed chars to password : scalar values or array of scalars only.');
        }

        return $this;
    }



    /**
     * The password will contain only digits. 
     * 
     * @access public
     * @return Password
     */
    public function onlyDigits()
    {
        $this->arr_allow = range(0, 9);
        return $this;
    }



    /**
     * The password will contain only letters. 
     * 
     * @access public
     * @return Password
     */
    public function onlyLetters()
    {
        $this->arr_allow = array_merge(
            range('a', 'z'),
            range('A', 'Z')
        );
        return $this;
    }



    /**
     * Generate one password string. 
     * 
     * @access public
     * @return string
     */
    public function generateOne()
    {
        $str_out = '';

        for($i = 0; $i < rand($this->int_minimum, $this->int_maximum); $i++)
        {
            $str_out .= $this->arr_allow[array_rand($this->arr_allow)];
        }

        return $str_out;
    }



    /**
     * Generate several passwords returned into and array. 
     * 
     * @param integer $amount Number of password to generate
     * @access public
     * @return array
     */
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



    /**
     * In string context, generates one password. 
     * 
     * @access public
     * @return string
     */
    public function __toString()
    {
        return $this->generateOne();
    }
}

