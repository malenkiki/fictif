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
 * Create some fake logins. 
 * 
 * @author Michel Petit <petit.michel@gmail.com> 
 * @license MIT
 */
class Login
{
    protected $arr_part = array();
    
    protected $int_minimum = 2;
    
    protected $int_maximum = 15;



    /**
     * constructor. Generate couples letters internally. 
     * 
     * @access public
     * @return void
     */
    public function __construct()
    {
        $str_c = 'zrtpsdfghjklmwxcvbnq';
        $str_v = 'aeyuio';
        
        foreach(str_split($str_c) as $c)
        {
            if($c == 'q')
            {
                $this->arr_part[] = 'qu';
            }
            else
            {
                foreach(str_split($str_v) as $v)
                {
                    $this->arr_part[] = $c . $v;
                    $this->arr_part[] = $v . $c;
                }
            }
        }
    }



    /**
     * Create one login 
     * 
     * @access public
     * @return string
     */
    public function generateOne()
    {
        $str_out = '';

        for($i = 0; $i < floor(rand($this->int_minimum, $this->int_maximum) / 2); $i++)
        {
            $str_out .= $this->arr_part[array_rand($this->arr_part)];
        }

        return substr($str_out, 0, $this->int_maximum);
    }



    /**
     * Create several logins at once.
     * 
     * @param integer $amount 
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

        while($int_count < $amount)
        {
            $arr_out[] = $this->generateOne();
            $arr_out = array_unique($arr_out);

            $int_count = count($arr_out);
        }

        return $arr_out;
    }



    public function __toString()
    {
        return $this->generateOne();
    }
}

