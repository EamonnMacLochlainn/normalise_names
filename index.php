<?php
/**
 * Created by PhpStorm.
 * Date: 12/01/2019
 * Time: 16:06
 */

require_once 'Helper.php';


$names = [
    'Lillis Ó Laoire',
    'Rióna Ní Fhrighil',
    'Liam Ó hAisibéil',
    'Joe O Heaney',
    'Otto Von Bismark',
    'John C Reilly',
    'Thos. Byrne',
    'Derbhla O Shaughnessy - Hennessy',
    'Johan',
    'Mac Dowell'
];

foreach($names as $n)
{
    $indexed_name = Helper::normalise_name($n, true);
    echo $n;
    Helper::show($indexed_name);
}

