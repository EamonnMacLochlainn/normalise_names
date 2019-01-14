<?php
/**
 * Created by PhpStorm.
 * Date: 12/01/2019
 * Time: 16:06
 */

require_once 'Helper.php';


$names = [
    'Rióna Ní Fhrighil',
    'Liam Ó hAisibéil',
    'Lillis Ó Laoire',
    'John C. Reilly',
    'Joe Ó Heaney',
    'Otto Von Bismark',
    'Derbhla O Shaughnessy - Hennessy',
    'Johan',
    'Mac Dowell'
];

foreach($names as $n)
{
    $indexed_name = Helper::normalise_name($n);
    $arr = [];
    $arr[] = $n;
    $arr[] = $indexed_name;
    Helper::show($arr);
}

