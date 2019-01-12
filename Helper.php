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
        $name = trim($name);

        $uses_diacritics = (strlen($name) != strlen(utf8_decode($name))); // check for fada's

        $name = str_replace('\'', ' ', $name); // replace apostrophes with spaces
        $name = str_replace(' - ', '-', $name); // replace spaced hyphens with hyphens
        $name = preg_replace('!\s+!', ' ', $name); // replace multiple spaces with single spaces

        $split = preg_split( "/[\s-]+/", $name); // divide according to spaces, hyphens
        $split = array_map('self::latinise_string', $split); // remove accents
        $original_case_split = $split; // store in original case for later
        $split = array_map('strtolower', $split); // make lowercase


        // remove any abbreviations ('John C. Reilly' => 'John Reilly')

        foreach($split as $i => $s)
        {
            if(strpos($s,'.') !== false)
                unset($split[$i]);
        }
        $split = array_values($split);



        // if only left with one value, return it

        if(count($split) === 1)
            return $split[0];

        $ga_familials = ['mac','mc','ni','o','ui'];
        if(!in_array($split[0], $ga_familials))
            array_shift($split); // take out first name

        if(count($split) === 1)
            return $split[0];



        // if no diacritics are used, we just cannot reliably tell the difference between
        // a name spelled with a sheimhiú and an English variant of an Irish name, so just return

        if(!$uses_diacritics)
            return implode('', $split);



        // check for vowel ending familials, and also store where in the name array that occurs.

        $vowel_ending_ga_familials = ['ni','o','ui'];

        $has_vowel_ending_ga_familial = false;
        $familial_key = 0;
        foreach($split as $i => $s)
        {
            if(in_array($s, $vowel_ending_ga_familials))
            {
                $familial_key = $i;
                $has_vowel_ending_ga_familial = true;
            }
        }



        // if no vowel ending ga_familial, just return

        if(!$has_vowel_ending_ga_familial)
            return implode('', $split);

        // remove irrelevant values from name array (i.e. anything before familial), in-case there are any fnames left

        if($familial_key > 0)
            $split = array_slice($split, $familial_key);




        // find those last names that may have sheimhiús, and remove them

        $vowels = ['a','e','i','o','u'];
        $very_last_name_key = count($split) - 1;
        $very_last_name = $split[ $very_last_name_key ];

        $first_char = substr($very_last_name, 0, 1);
        $second_char = substr($very_last_name, 1, 1);

        if( ($first_char !== 'h') && ($second_char !== 'h') ) // no sheimhiú at all
            return implode('', $split);

        if( ($first_char === 'h') && (in_array($second_char, $vowels)) ) // always a 'h' between vowels
        {
            // as a last safety, check first if 'h' was originally capitalised. If so, leave it.
            $original_case_first_char = substr($original_case_split[ count($original_case_split) - 1 ], 0, 1);
            if($original_case_first_char === 'H')
                return implode('', $split);

            // if not capitalised, it's a sheimhiu...
            $split[$very_last_name_key] = substr($very_last_name, 1);
            return implode('', $split);
        }

        if($second_char === 'h')
        {
            // at this point, we are left with someone with an Irish familial, with a vowel ending familial,
            // who spells in Irish, and with a 'h' as a second character - it's a sheimhiú

            $split[$very_last_name_key] = substr($very_last_name, 0,1) . substr($very_last_name,2);
            return implode('', $split);
        }

        return implode('', $split);
    }
}