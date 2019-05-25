<?php
/**
 * Created by PhpStorm.
 * User: Eamonn
 * Date: 29/12/2018
 * Time: 14:21
 */

namespace FT;

use Transliterator;

class Helper
{
    static function show($arg, $return = false)
    {
        if( (is_array($arg)) || (is_object($arg)) )
            $tmp = print_r($arg, true);
        elseif(is_bool($arg))
            $tmp = ($arg) ? 'true' : 'false';
        else
            $tmp = $arg;

        if($return)
            return $tmp;

        echo ( (is_array($arg)) || (is_object($arg)) ) ? '<pre>' . $tmp . '</pre>' : '<br/>' . $tmp;
        return true;
    }

    static function latinise_string($string)
    {
        if(empty($string))
            return null;

        if(empty($string))
            return null;

        $transliterator = Transliterator::createFromRules(':: Any-Latin; :: Latin-ASCII; :: NFD; :: [:Nonspacing Mark:] Remove; :: Lower(); :: NFC;', Transliterator::FORWARD);
        return $transliterator->transliterate($string);
    }

    static function normalise_name($name, $remove_sheimhu = false)
    {
        $resp = [
            'fname' => null,
            'lname' => null,
            'normalised_lname' => null,
            'patronym' => null
        ];


        $name = trim($name);
        if (empty($name))
            return $resp;

        $name = preg_replace('!\s+!', ' ', $name); // replace multiple spaces with single spaces
        $name = str_replace([' -', '- '], '-', $name); // replace spaced hyphens with hyphens


        // split on spaces and assign first and last name values

        $split = explode(' ', $name);
        $num_parts = count($split);

        $first = array_shift($split);
        $last = null;
        if ($num_parts > 2)
        {
            if (strlen($split[0]) == 1)
            {
                $mid = array_shift($split);
                $first .= ' ' . $mid;
            }
        }
        $last = (!empty($split)) ? implode(' ', $split) : null;


        // if no 'last' value, assume all is first name and return

        if ($last === null)
        {
            $first_lwr = strtolower($first);
            $first_lwr = self::latinise_string($first_lwr); // remove accents
            $first_lwr = str_replace(' ', '', $first_lwr);

            $resp['fname'] = $first;
            $resp['lname'] = null;
            $resp['normalised_lname'] = $first_lwr;
            $resp['patronym'] = null;

            return $resp;
        }


        // check for and remove patronymics

        $patronymics = ['mac', 'mc', 'nic', 'ni', 'o', 'ui', 'af', 'von', 'zu', 'van', 'd\'', 'de', 'du', 'des', 'do', 'dos', 'da', 'das', 'dom', 'del', 'di', 'der'];

        $last_lwr = strtolower($last);
        $last_lwr = self::latinise_string($last_lwr); // remove accents

        $patronym = null;
        $sans_patronym = null;
        foreach ($patronymics as $p)
        {
            $p_len = strlen($p);

            if (substr($last_lwr, 0, $p_len) !== $p)
                continue;

            $char_after_p = substr($last, $p_len, 1);

            if(!preg_match("/^[a-zA-Z]$/", $char_after_p)) // if followed by a space or apostrophe, etc, it is a patronym
            {
                $patronym = $p;
                $sans_patronym = substr($last, $p_len + 1);
            }
            else
            {
                // remove 'mc' regardless
                if ($p == 'mc')
                {
                    $patronym = $p;
                    $sans_patronym = substr($last, $p_len);
                }
                else
                {
                    if (ctype_lower($char_after_p))
                        $sans_patronym = $last;
                    else
                    {
                        $patronym = $p;
                        $sans_patronym = substr($last, $p_len);
                    }
                }
            }
            break;
        }

        $sans_patronym = ($sans_patronym == null) ? $last : str_replace(' ', '', $sans_patronym);
        $sans_patronymic_lwr = strtolower($sans_patronym);


        $ga_patronyms = ['mac', 'mc', 'nic', 'ni', 'o', 'ui'];
        $has_ga_patronym = ($patronym === null) ? false : (in_array($patronym, $ga_patronyms));

        $resp = [
            'fname' => $first,
            'lname' => $last,
            'normalised_lname' => self::latinise_string($sans_patronymic_lwr),
            'patronym' => $patronym
        ];

        if ((!$has_ga_patronym) || (!$remove_sheimhu))
            return $resp;


        // we can check for shéimhús now

        $first_char = substr($sans_patronym, 0, 1);
        $second_char = substr($sans_patronym, 1, 1);

        $first_char_lwr = strtolower($first_char);
        $second_char_lwr = strtolower($second_char);

        if (($first_char_lwr !== 'h') && ($second_char_lwr !== 'h')) // no 'h' as first or second char
            return $resp;

        if (($first_char !== 'h') && ($second_char !== 'h')) // no lowercase 'h' as first or second char
            return $resp;

        if ((!ctype_lower($first_char)) && ($first_char_lwr == 'h')) // 'h' is first, but not lowercase
            return $resp;

        if (($first_char_lwr == 'h') && (ctype_lower($second_char))) // 'h' is first, but followed by a lowercase letter
            return $resp;


        if ($second_char == 'h')
        {
            if((strpbrk($first . $last, "áéíóúÁÉÍÓÚ")) === false) // name does not use diacritics, cannot proceed safely, just return
                return $resp;

            $resp['normalised_lname'] = self::latinise_string($first_char_lwr . substr($sans_patronymic_lwr, 2)); // remove (90% likely) shéimhú
        }
        else
        {
            if(in_array($second_char_lwr, ['a','e','i','o','u','á','é','í','ó','ú']))
                $resp['normalised_lname'] = self::latinise_string(substr($sans_patronymic_lwr, 1));
        }

        return $resp;
    }
}