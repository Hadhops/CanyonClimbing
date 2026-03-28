<?php 

$colour_yellow = '#FFCC00';
$colour_l_yellow = '#FFF1BB';
$colour_white = '#FFFFFF';

$this_colour = get_sub_field('new_background_colour');

if($this_colour == 'White'){
    $colour = $colour_white;
} else if($this_colour == 'Pale Yellow'){
    $colour = $colour_l_yellow;
} else if($this_colour == 'Yellow'){
    $colour = $colour_yellow;
}

?>

<div class="block-bg-colour" data-new-colour="<?= $colour; ?>"></div>