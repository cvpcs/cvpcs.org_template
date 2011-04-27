<?php
function tpl_menu($menu)
{
    global $conf, $ID, $REV, $INFO;

    print p_wiki_xhtml("menu:" . $menu, '', false);
}
?>
