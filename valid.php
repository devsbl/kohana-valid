<?php defined('SYSPATH') or die('No direct script access.');
/*
 *  Usage: Valid::pesel('00000000000'); Valid::nip('000-00-00-00'); etc.
 */

class Valid extends Kohana_Valid
{
        public static function nip($value)
        {
                $value = preg_replace("/[^0-9]+/","",$value);
                
                if(strlen($value) != 10)
                {
                        return false;
                }
         
                $arrSteps = array(6, 5, 7, 2, 3, 4, 5, 6, 7);
                $intSum   = 0;
                
                for($i = 0; $i < 9; $i++)
                {
                        $intSum += $arrSteps[$i] * $value[$i];
                }

                $int = $intSum % 11;
         
                $intControlNr = ($int == 10) ? 0 : $int;

                if($intControlNr == $value[9])
                {
                        return true;
                }

                return false;
        }

        public static function pesel($value)
        {
                if (!preg_match('/^[0-9]{11}$/',$value))
                {
                        return false;
                }
         
                $arrSteps = array(1, 3, 7, 9, 1, 3, 7, 9, 1, 3);
                $intSum   = 0;

                for($i = 0; $i < 10; $i++)
                {
                        $intSum += $arrSteps[$i] * $value[$i];
                }

                $int          = 10 - $intSum % 10;
                $intControlNr = ($int == 10) ? 0 : $int;

                if($intControlNr == $value[10])
                {
                        return true;
                }

                return false;
        }

        public static function regon($value)
        {
                if(strlen($value) != 9)
                {
                        return false;
                }
         
                $arrSteps = array(8, 9, 2, 3, 4, 5, 6, 7);
                $intSum   = 0;
                
                for($i = 0; $i < 8; $i++)
                {
                        $intSum += $arrSteps[$i] * $value[$i];
                }

                $int          = $intSum % 11;
                $intControlNr = ($int == 10) ? 0 : $int;
                
                if ($intControlNr == $value[8]) 
                {
                        return true;
                }

                return false;
        }
}
