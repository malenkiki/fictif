<?php

namespace Malenki\Fictif;

class Password
{
    protected $int_minimum = 5;
    protected $int_maximum = 20;
    protected $arr_allow = array();



    public function __construct()
    {
        $this->arr_allow = array_merge(
            range('a', 'z'),
            range('A', 'Z'),
            range(0, 9)
        );
    }



    public function minimum($int)
    {
        if($int <= 0)
        {
            throw new \InvalidArgumentException('Minimum size must be a positive number');
        }

        $this->int_minimum = $int;
        return $this;
    }



    public function maximum($int)
    {
        if($int < $this->int_minimum)
        {
            throw new \InvalidArgumentException('Maximum size must be greater than minimum size.');
        }

        if($int <= 0)
        {
            throw new \InvalidArgumentException('Maximum size must be a positive number');
        }

        $this->int_maximum = $int;
        return $this;
    }



    public function fixedSize($int)
    {
        if($int <= 0)
        {
            throw new \InvalidArgumentException('Fixed size must be a positive number.');
        }

        $this->int_minimum = $int;
        $this->int_maximum = $int;

        return $this;
    }



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
                throw new \InvalidArgumentException('Not null string is require.');
            }
        }
        else
        {
            throw new \InvalidArgumentException('Scalar values or array of scalars only.');
        }

        return $this;
    }



    public function onlyDigits()
    {
        $this->arr_allow = range(0, 9);
        return $this;
    }



    public function onlyLetters()
    {
        $this->arr_allow = array_merge(
            range('a', 'z'),
            range('A', 'Z')
        );
        return $this;
    }



    public function generateOne()
    {
        $str_out = '';

        for($i = 0; $i < rand($this->int_minimum, $this->int_maximum); $i++)
        {
            $str_out .= $this->arr_allow[array_rand($this->arr_allow)];
        }

        return $str_out;
    }



    public function generateMany($amount)
    {
        $arr_out = array();

        for($i = 0; $i < $amount; $i++)
        {
            $arr_out[] = $this->generateOne();
        }
        
        return $arr_out;
    }
}

