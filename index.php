<?php
/**
 * Created by PhpStorm.
 * Date: 12/01/2019
 * Time: 16:06
 */

require_once 'Helper.php';


$names = [
    'Rióna Ní Fhrighil',
    'Lesa Ní Mhunghaile',
    'Liam Ó hAisibéil',
    'Lillis Ó Laoire',
    'Deirdre Ní Chonghaile',
    'Pádraig Ó Macháin',
    'Áine Ní Ghadhra',
    'Gobnait Ní Loingsigh',
    'Marian Ní Shúilliobháin',
    'Claire Ní Mhuirthile',
    'Seán Ó Laoi',
    'Brian Ó Donnchadha',
    'Aoife Ní Shéaghdha',
    'John C. Reilly',
    'Joe O Heaney',
    'Joe Ó Heaney',
    'Otto Von Bismark',
    'Derbhla O Shaughnessy-Hennessy',
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

