# normalise_names
Remove diacritics (and séimhiús (lowercase 'h' before or after initial letter) from Irish names), as well as spaces, and hyphens, for normalised strings that can be used for ordering.

Has option to remove abbreviated name values (e.g. 'John C. Reilly' => \['john','reilly'\]), and to remove patronymics for gender-neutral name sorting (e.g. 'Éamonn Mac Lochlainn' => \['eamonn','lochlainn'\], 'Méabh Nic Lochlainn' => \['meabh','lochlainn'\]).

## Usage  
Feed the function a person's full name, get back an array containing their first name(s) and last name(s), stripped of any diacritics, spaces, hyphens, and séimhiús.

    $normalised_name = Helper::normalise_name($input, [$remove_abbr = false, $remove_patronymics = false, $preferred_key = 'fname']);

## Examples

### Default:

    Helper::normalise_name('Lillis Ó Laoire');
    Helper::normalise_name('Rióna Ní Fhrighil');
    // results in
    Array
    (
        [fname] => lillis
        [lname] => olaoire
    )
    Array
    (
        [fname] => riona
        [lname] => nifrighil
    )

### Handling Abbreviations:

    Helper::normalise_name('John C. Reilly');
    // results in
    Array
    (
        [fname] => johnc
        [lname] => reilly
    )

    Helper::normalise_name('John C Reilly', true);
    Helper::normalise_name('Thos. Byrne', true);
    // results in
    Array
    (
        [fname] => john
        [lname] => reilly
    )
    Array
    (
        [fname] =>
        [lname] => byrne
    )

### Handling Patronymics:

    Helper::normalise_name('Otto Von Bismark');
    // results in
    Array
    (
        [fname] => otto
        [lname] => vonbismark
    )
    Helper::normalise_name('Mac Dermot');
    // results in
    Array
    (
        [fname] =>
        [lname] => macdermot
    )

    Helper::normalise_name('Otto Von Bismark', false, true);
    // results in
    Array
    (
        [fname] => otto
        [lname] => bismark
    )

### Handling single-value names

    Helper::normalise_name('John');
    // results in
    Array
    (
        [fname] => john
        [lname] =>
    )

    Helper::normalise_name('John', false, false, 'lname');
    // results in
    Array
    (
        [fname] =>
        [lname] => john
    )
