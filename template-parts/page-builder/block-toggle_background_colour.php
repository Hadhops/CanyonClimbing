<?php 

// white is the default the scroll script assumes for the first block
$colour = match( get_sub_field('new_background_colour') ) {
    'Pale Yellow' => '#F7E6BB',
    'Yellow'      => '#E3B545',
    'Black'       => '#29282B',
    default       => '#FFFFFF',
};

?>

<div class="block-bg-colour" data-new-colour="<?= $colour; ?>"></div>