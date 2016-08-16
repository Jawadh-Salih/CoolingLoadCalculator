<?php
/**
 * Created by PhpStorm.
 * User: Jawadh Salih
 * Date: 2016-08-16
 * Time: AM 2.25
 */

$sensible_load = array(0,0,0,0,0,0,0,0,0,0);

for($x = 0; $x < 10; $x++) {
           $sensible_load[$x] += $x;//Sally metana int-ext nathanm anik pathada?? Abs ganna weida??
        }

echo $sensible_load[2];