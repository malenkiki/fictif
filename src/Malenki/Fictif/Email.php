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
 * Generate email following some rules. 
 * 
 * @author Michel Petit <petit.michel@gmail.com> 
 * @license MIT
 */
class Email
{
    protected $arr_domain = array(
        'truc',
        'machin',
        'chose',
        'chouette',
        'bidule',
        'foo',
        'bar'
    );

    protected $arr_ext = array('fr', 'eu', 'com', 'org', 'net', 'it', 'de', 'pt', 'el', 'es', 'be', 'pl', 'ru');

    protected $str_account = null;
    
    protected $str_domain = null;
    
    protected $str_ext = null;



    /**
     * Set account, usefull into bulk with other data.
     *
     * This is only usefull for bulk generation, with other data you could take 
     * to use in email, e.g. first and last name.
     * 
     * @param string $str 
     * @access public
     * @return Email
     */
    public function setAccount($str)
    {
        if(is_string($str) && strlen(trim($str)))
        {
            $this->str_account = trim($str);
        }
        else
        {
            throw new \InvalidArgumentException('Blahblah to do');
        }

        return $this;
    }



    /**
     * Add other domains to the defaults.
     * 
     * @param array $arr 
     * @access public
     * @return Email
     */
    public function allowThisDomain(array $arr)
    {
        $this->arr_domain = array_merge($this->arr_domain, $arr);

        return $this;
    }



    /**
     * Add other extensions to the defaults.
     * 
     * @param array $arr 
     * @access public
     * @return Email
     */
    public function allowThisExt(array $arr)
    {
        $this->arr_ext = array_merge($this->arr_ext, $arr);

        return $this;
    }



    /**
     * Fix domain to a custom value.
     * 
     * @param string $str 
     * @access public
     * @return Email
     */
    public function setDomain($str)
    {
        if(is_string($str) && strlen(trim($str)))
        {
            $this->str_domain = trim($str);
        }
        else
        {
            throw new \InvalidArgumentException('A domain must be a valid string.');
        }

        return $this;
    }



    /**
     * Fix extension to a custom value 
     * 
     * @param string $str 
     * @access public
     * @return Email
     */
    public function setExt($str)
    {
        if(is_string($str) && strlen(trim($str)))
        {
            $this->str_ext = trim($str);
        }
        else
        {
            throw new \InvalidArgumentException('Extension must be a valid string.');
        }

        return $this;
    }



    /**
     * Create email as a string. 
     * 
     * @access public
     * @return string
     */
    public function generateOne()
    {
        if(is_null($this->str_account))
        {
            $p = new Password();

            if(rand(0, 1))
            {
                $str_account = sprintf(
                    '%s.%s',
                    $p->minimum(1)->maximum(7)->generateOne(),
                    $p->minimum(1)->maximum(7)->generateOne()
                );
            }
            else
            {
                $str_account = $p->minimum(5)
                    ->maximum(12)
                    ->generateOne();
            }
        }
        else
        {
            $str_account = $this->str_account;
        }


        if(is_null($this->str_domain))
        {
            $str_domain = $this->arr_domain[array_rand($this->arr_domain)];
        }
        else
        {
            $str_domain = $this->str_domain;
        }


        if(is_null($this->str_ext))
        {
            $str_ext = $this->arr_ext[array_rand($this->arr_ext)];
        }
        else
        {
            $str_ext = $this->str_ext;
        }

        return mb_strtolower(
            sprintf(
                '%s@%s.%s',
                $str_account,
                $str_domain,
                $str_ext
            ),
            'UTF-8'
        );
    }



    /**
     * Create several emails
     * 
     * @param mixed $amount 
     * @access public
     * @return array
     */
    public function generateMany($amount)
    {
        if(!is_numeric($amount) || $amount < 1)
        {
            throw new \InvalidArgumentException('blahblah to do');
        }

        $arr_out = array();

        for($i = 0; $i < $amount; $i++)
        {
            $arr_out[] = $this->generateOne();
        }

        return $arr_out;
    }



    /**
     * Generate one email string if in string context. 
     * 
     * @access public
     * @return string
     */
    public function __toString()
    {
        return $this->generateOne();
    }
}

