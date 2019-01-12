# normalise_names
Remove diacritics (and séimhiús from Irish names), as well as spaces, hyphens, and abbreviations, for normalised strings that can be used for ordering

# Usage
Feed the function a person's full name, get back a string containing their last name (only), stripped of any diacritics, spaces, hyphens, abbreviations, and séimhiús.

    $normalised_name = Helper::normalise_name($full_name);

# Examples

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
        echo Helper::normalise_name($n) . '<br/>';

results in:

    nifrighil
    nimunghaile
    oaisibeil
    olaoire
    niconghaile
    omachain
    nigadhra
    niloingsigh
    nisuilliobhain
    nimuirthile
    olaoi
    odonnchadha
    niseaghdha
    reilly
    oheaney
    oheaney
    vonbismark
    oshaughnessyhennessy
    johan
    macdowell
    
Note: this function does *not* remove patronymics or matronymics ('Mac', 'O', etc.), which you may want to do in order to have siblings listed together.    
