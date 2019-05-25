# normalise_names
When provided with a name, this function will return the following: 

    Array (
        'fname' => 'Joe',
        'lname' => 'O Connor',
        'normalised_lname => 'connor',
        'patronym' => 'o'
    )
    
Where by the name is split into `fname` and `lname` values (first and last names), as well as providing a normalised version of the last name, stripped of patronymics/honorifics (Mac, O, Von, etc.). 
The function can also remove shéimhús from Irish names (with reasonable accuracy - when in doubt, the 'h' is retained).    

## Usage
Feed the function a person's full name, get back an array containing their first name(s) and last name(s), normalised last name, and patronym.

    $normalised_name = Helper::normalise_name($input, [$remove_sheimhu = false]);

## Examples

    Helper::normalise_name('Lillis Ó Laoire');
    Helper::normalise_name('Rióna Ní Fhrighil', true);
    Helper::normalise_name('Otto Von Bismark');
    // results in
    Array
    (
        [fname] => Lillis
        [lname] => Ó Laoire
        [normalised_lname] => laoire
        [patronym] => o
    )
    Array
    (
        [fname] => Rióna
        [lname] => Ní Fhrighil
        [normalised_lname] => frighil
        [patronym] => ni
    )
    Array
    (
        [fname] => Otto
        [lname] => Von Bismark
        [normalised_lname] => bismark
        [patronym] => von
    )

### Handling single-value names

    Helper::normalise_name('John');
    // results in
    Array
    (
        [fname] => John
        [lname] =>
        [normalised_lname] => 
        [patronym] => 
    )