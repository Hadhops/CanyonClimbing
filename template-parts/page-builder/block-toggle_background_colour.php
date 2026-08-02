<?php 

$colour_yellow = '#E3B545';
$colour_l_yellow = '#F7E6BB';
$colour_white = '#FFFFFF';
$colour_black = '#29282B';

$this_colour = get_sub_field('new_background_colour');

if($this_colour == 'White'){
    $colour = $colour_white;
} else if($this_colour == 'Pale Yellow'){
    $colour = $colour_l_yellow;
} else if($this_colour == 'Yellow'){
    $colour = $colour_yellow;
} else if($this_colour == 'Black'){
    $colour = $colour_black;
}

?>

<div class="block-bg-colour" data-new-colour="<?= $colour; ?>"></div>