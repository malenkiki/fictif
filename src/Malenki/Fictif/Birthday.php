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
 * Generate fake but valid birthday!
 *
 * @author Michel Petit <petit.michel@gmail.com>
 * @license MIT
 */
class Birthday
{
    protected $year_range = null;
    protected $str_format = 'Y-m-d';

    public function __construct()
    {
        $this->year_range = new \stdClass();
        $this->year_range->min = 1900;
        $this->year_range->max = (int) date('Y');
        $this->year_range->use_nd = false;
        $this->year_range->nd = null;
    }

    /**
     * Use normal distribution (Gauss) to choose year.
     *
     * @param  mixed    $int_mean_year          Mean year
     * @param  mixed    $int_standard_deviation
     * @access public
     * @return Birthday
     */
    public function normalDistribution($int_mean_year, $int_standard_deviation)
    {
        if(
            $int_mean_year < $this->year_range->min
            ||
            $int_mean_year > $this->year_range->max
        )
        {
            throw new \OutOfRangeException(
                sprintf(
                    'Mean year must be into te range [%d, %d]',
                    $this->year_range->min,
                    $this->year_range->max
                )
            );
        }

        $this->year_range->nd = new \Malenki\Math\NormalDistribution($int_mean_year, $int_standard_deviation);
        $this->year_range->use_nd = true;

        return $this;
    }

    /**
     * Set the format of the output date time.
     *
     * @param  str      $str
     * @access public
     * @return Birthday
     */
    public function format($str)
    {
        if (!is_string($str) || strlen($str) == 0) {
            throw new \InvalidArgumentException(
                'Birthday format must be a valid string!'
            );
        }

        $this->str_format = $str;

        return $this;
    }

    /**
     * Define minimum year allowed.
     *
     * @param  integer  $int
     * @access public
     * @return Birthday
     */
    public function minYear($int)
    {
        if ($int < 1900) {
            throw new \InvalidArgumentException('Year must be after 1900');
        }

        $this->year_range->min = $int;

        return $this;
    }

    /**
     * Define maximum year to use.
     *
     * @param  integer  $int
     * @access public
     * @return Birthday
     */
    public function maxYear($int)
    {
        if ($int > (int) date('Y')) {
            throw new \InvalidArgumentException('Year must be before or equal to the current year');
        }

        $this->year_range->max = $int;

        return $this;
    }

    /**
     * Generate one birthdate.
     *
     * @access public
     * @return string
     */
    public function generateOne()
    {
        $year = $month = $day = null;

        while (!checkdate($month, $day, $year)) {
            if ($this->year_range->use_nd) {
                while(
                    $year < $this->year_range->min
                    ||
                    $year > $this->year_range->max
                )
                {
                    $year = (integer) round(array_pop($this->year_range->nd->samples(1)));
                }
            } else {
                $year = rand($this->year_range->min, $this->year_range->max);
            }

            if ($year == (int) date('Y')) {
                $month = rand(1, (int) date('n'));

                if ($month == (int) date('n')) {
                    $day = rand(1, (int) date('j'));
                }
            } else {
                $month = rand(1, 12);
                $day = rand(1, 31);
            }
        }

        $dt = new \DateTime(sprintf('%04d-%02d-%02d', $year, $month, $day));

        return $dt->format($this->str_format);
    }

    /**
     * Create several birthdates.
     *
     * @param  integer $amount
     * @access public
     * @return array
     */
    public function generateMany($amount)
    {
        if (!is_integer($amount) || $amount <= 0) {
            throw new \InvalidArgumentException('Amount must be a positive number.');
        }

        $arr_out = array();

        for ($i = 0; $i < $amount; $i++) {
            $arr_out[] = $this->generateOne();
        }

        return $arr_out;
    }

    /**
     * In string context, outputs one formated date.
     *
     * @access public
     * @return string
     */
    public function __toString()
    {
        return $this->generateOne();
    }
}
