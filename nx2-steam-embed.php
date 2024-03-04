<?php
/**
* Plugin Name: Steam Store Embed
* Plugin URI: https://neutralx2.com/
* Description: Substitutes a URL to a Steam Store page with a widget.
* Version: 1.0
* Author: NeutralX2
* Author URI: https://neutralx2.com/
* License: GPL2

Steam Store Embed is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
Steam Store Embed is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
 
You should have received a copy of the GNU General Public License
along with Steam Store Embed. If not, see https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html.
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function register_steam_embed()
{
	    wp_embed_register_handler( 
        'steamstore', 
        '#https?://store\.steampowered\.com/app/([\d]+)/?#i', 
        'wp_embed_handler_steamstore' 
    );
}

function wp_embed_handler_steamstore( $matches, $attr, $url, $rawattr )
{
    $embed = sprintf(
        '<iframe class="steamstore" src="https://store.steampowered.com/widget/%1$s/" width="100%%" height="190" frameborder="0" scrolling="no"></iframe>',
        esc_attr( $matches[1] ) 
     );

    return apply_filters( 'embed_steamstore', $embed, $matches, $attr, $url, $rawattr );
}

add_action('init','register_steam_embed');

?>