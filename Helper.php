<?php
/**
 * Created by PhpStorm.
 * Date: 12/01/2019
 * Time: 16:04
 */

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

        $table = [
            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'ă'=>'a', 'ā'=>'a', 'ą'=>'a', 'æ'=>'a', 'ǽ'=>'a',
            'Þ'=>'b', 'þ'=>'b', 'ß'=>'ss',
            'ç'=>'c', 'č'=>'c', 'ć'=>'c', 'ĉ'=>'c', 'ċ'=>'c',
            'đ'=>'dj', 'ď'=>'d',
            'è'=>'e', 'é'=>'e', 'ê'=>'e', 'ë'=>'e', 'ĕ'=>'e', 'ē'=>'e', 'ę'=>'e', 'ė'=>'e',
            'ĝ'=>'g', 'ğ'=>'g', 'ġ'=>'g', 'ģ'=>'g',
            'ĥ'=>'h', 'ħ'=>'h',
            'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'į'=>'i', 'ĩ'=>'i', 'ī'=>'i', 'ĭ'=>'i', 'ı'=>'i',
            'ĵ'=>'j',
            'ķ'=>'k', 'ĸ'=>'k',
            'ĺ'=>'l', 'ļ'=>'l', 'ľ'=>'l', 'ŀ'=>'l', 'ł'=>'l',
            'ñ'=>'n', 'ń'=>'n', 'ň'=>'n', 'ņ'=>'n', 'ŋ'=>'n', 'ŉ'=>'n',
            'ò'=>'o', 'ó'=>'o', 'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ō'=>'o', 'ŏ'=>'o', 'ő'=>'o', 'œ'=>'o', 'ð'=>'o',
            'ŕ'=>'r', 'ř'=>'r', 'ŗ'=>'r',
            'š'=>'s', 'ŝ'=>'s', 'ś'=>'s', 'ş'=>'s',
            'ŧ'=>'t', 'ţ'=>'t', 'ť'=>'t',
            'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ü'=>'u', 'ũ'=>'u', 'ū'=>'u', 'ŭ'=>'u', 'ů'=>'u', 'ű'=>'u', 'ų'=>'u',
            'ŵ'=>'w', 'ẁ'=>'w', 'ẃ'=>'w', 'ẅ'=>'w',
            'ý'=>'y', 'ÿ'=>'y', 'ŷ'=>'y',
            'ž'=>'z', 'ź'=>'z', 'ż'=>'z',
            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Ă'=>'A', 'Ā'=>'A', 'Ą'=>'A', 'Æ'=>'A', 'Ǽ'=>'A',
            'Ç'=>'C', 'Č'=>'C', 'Ć'=>'C', 'Ĉ'=>'C', 'Ċ'=>'C',
            'Đ'=>'DJ', 'Ď'=>'D',
            'È'=>'E', 'É'=>'E', 'Ê'=>'E', 'Ë'=>'E', 'Ĕ'=>'E', 'Ē'=>'E', 'Ę'=>'E', 'Ė'=>'E',
            'Ĝ'=>'G', 'Ğ'=>'G', 'Ġ'=>'G', 'Ģ'=>'G',
            'Ĥ'=>'H', 'Ħ'=>'H',
            'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Į'=>'I', 'Ĩ'=>'I', 'Ī'=>'I', 'Ĭ'=>'I',
            'Ĵ'=>'J',
            'Ķ'=>'K',
            'Ĺ'=>'L', 'Ļ'=>'L', 'Ľ'=>'L', 'Ŀ'=>'L', 'Ł'=>'L',
            'Ñ'=>'N', 'Ń'=>'N', 'Ň'=>'N', 'Ņ'=>'N', 'Ŋ'=>'N',
            'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O', 'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ō'=>'O', 'Ŏ'=>'O', 'Ő'=>'O', 'Œ'=>'O', 'Ð'=>'O',
            'Ŕ'=>'R', 'Ř'=>'R', 'Ŗ'=>'R',
            'Š'=>'S', 'Ŝ'=>'S', 'Ś'=>'S', 'Ş'=>'S',
            'Ŧ'=>'T', 'Ţ'=>'T', 'Ť'=>'T',
            'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ũ'=>'U', 'Ū'=>'U', 'Ŭ'=>'U', 'Ů'=>'U', 'Ű'=>'U', 'Ų'=>'U',
            'Ŵ'=>'W', 'Ẁ'=>'W', 'Ẃ'=>'W', 'Ẅ'=>'W',
            'Ý'=>'Y', 'Ÿ'=>'Y', 'Ŷ'=>'Y',
            'Ž'=>'Z', 'Ź'=>'Z', 'Ż'=>'Z'
        ];
        $string = strtr($string, $table);
        return $string;
    }

    static function normalise_name($name)
    {
        $resp = [
            'fname' => null,
            'lname' => null
        ];

        $name = trim($name);

        $name = str_replace('d\'', 'd', $name); // concatenate Latin abbreviated particle
        $name = str_replace('\'', ' ', $name); // replace remaining apostrophes with spaces
        $name = preg_replace('!\s+!', ' ', $name); // replace multiple spaces with single spaces
        $name = str_replace([' -','- '], '-', $name); // replace spaced hyphens with hyphens
        $name = str_replace(['-','.'], '', $name); // concatenate hyphenated names, and remove dots from abbreviated names

        $split = preg_split( "/[\s]+/", $name); // divide according to spaces
        $split = array_map('self::latinise_string', $split); // remove accents
        $original_case_split = $split; // store in original case for later
        $split = array_map('strtolower', $split); // make lowercase

        // if only one value, return it (defaults as lname)

        if(count($split) === 1)
        {
            $resp['lname'] = $split[0];
            return $resp;
        }


        // remove any abbreviated middle/last names ('John C. Reilly' => 'John Reilly')

        foreach($split as $i => $s)
        {
            if($i === 0) // allow abbreviated first name ('A Smith')
                continue;

            if($s === 'o') // have to allow for 'o', for Irish names
                continue;

            if(strlen($s) === 1)
                unset($split[$i]);
        }

        $split = array_values($split);



        // Separate first and last name(s):
        // The default behaviour is that the very last value *only* is the lname
        // (all remaining parts are assumed to be the fname), unless
        // the first part happens to be a patronymic/matronymic or nobiliary particle (in
        // which case, all parts are lname). If such a particle is found, then
        // that array key marks the beginning of the surname and we split fname and lname there

        // We also check for vowel-ending Gaelic patronymics while we're at it, for use later

        $patronymics = ['mac','mc','nic','ni','o','ui','af','von','zu','van','de','du','des','do','dos','da','das','dom','del','di','der'];
        $particle_key = 0;
        $has_particle = false;
        $vowel_ending_ga_patronymics = ['ni','o','ui'];
        $has_vowel_ending_ga_patronym = false;
        foreach($split as $i => $s)
        {
            if(!in_array($s, $patronymics))
                continue;

            $particle_key = $i;
            $has_particle = true;
            $has_vowel_ending_ga_patronym = (in_array($s, $vowel_ending_ga_patronymics));
            break;
        }

        if(!$has_particle) // doesn't have a particle, resort to default behaviour and return.
        {
            $x = count($split) - 1;

            $resp['lname'] = $split[$x];
            unset($split[$x]);
            $resp['fname'] = implode('', $split);

            return $resp;
        }

        $n = intval('-' . $particle_key);
        $fnames = ($particle_key > 0) ? array_slice($split, 0, $n) : null;
        $resp['fname'] = ($fnames === null) ? null : implode('', $fnames);
        $split = ($particle_key > 0) ? array_slice($split, $particle_key) : $split;

        // if only left with one lname value, or doesn't have a vowel-ending
        // Irish patronym, return it

        if( (count($split) === 1) || (!$has_vowel_ending_ga_patronym) )
        {
            $resp['lname'] = implode('', $split);
            return $resp;
        }



        // Now only left with names that have multiple parts to their
        // last name, AND that have a vowel-ending Irish patronym

        // check for possible sheimhiús, and remove them

        $very_last_name_key = count($split) - 1;
        $very_last_name = $split[ $very_last_name_key ];
        $first_char = substr($very_last_name, 0, 1);
        $second_char = substr($very_last_name, 1, 1);

        if( ($first_char !== 'h') && ($second_char !== 'h') ) // no possible sheimhiú, so return
        {
            $resp['lname'] = implode('', $split);
            return $resp;
        }

        if($first_char === 'h')
        {
            // as a safety, check first if 'h' was originally capitalised. If so, leave it, just return

            $original_case_first_char = substr($original_case_split[ count($original_case_split) - 1 ], 0, 1);
            if($original_case_first_char === 'H')
            {
                $resp['lname'] = implode('', $split);
                return $resp;
            }

            if(in_array($second_char, ['a','e','i','o','u']))
            {
                // wasn't capitalised, and appears before a vowel - always a sheimhiú
                // between vowels. This is as sure as we can be here.

                $split[$very_last_name_key] = substr($very_last_name, 1);
                $resp['lname'] = implode('', $split);
                return $resp;
            }
        }

        if($second_char === 'h')
        {
            // at this point, we are left with someone with an Irish familial, with a vowel ending familial,
            // who spells in Irish, and with a 'h' as a second character - it's a sheimhiú

            $split[$very_last_name_key] = substr($very_last_name, 0,1) . substr($very_last_name,2);
            $resp['lname'] = implode('', $split);
            return $resp;
        }

        // safety return
        $resp['lname'] = implode('', $split);
        return $resp;
    }
}