<?php if (isset($DOKU_TPL)==FALSE) $DOKU_TPL = DOKU_TPL; if (isset($DOKU_TPLINC)==FALSE) $DOKU_TPLINC = DOKU_TPLINC; ?>
<?php
/**
 * DokuWiki Default Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://wiki.splitbrain.org/wiki:tpl:templates
 * @author Andreas Gohr <andi@splitbrain.org>
 * @author Oscar M. Lage <r0sk10@gmail.com>
 * @link   http://7throot.com
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

require_once(dirname(__FILE__).'/tpl_functions.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php echo strip_tags($conf['title'])?> &#187; <?php tpl_pagetitle()?></title>

  <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo $DOKU_TPL?>images/favicon.png" />
  <link rel="stylesheet" media="screen" type="text/css" href="<?php echo $DOKU_TPL?>menu_primary.css" />

  <script type="text/javascript" src="<?php echo $DOKU_TPL?>js/jquery-1.5.2.min.js"></script>
  <script type="text/javascript" src="<?php echo $DOKU_TPL?>js/hex_hover.js"></script>
  <script type="text/javascript">
    // find the div.fade elements and hook the hover event
    $(document).ready(function() {
        setup_hex_hover('.tdr_button', '<?php echo $DOKU_TPL?>images/background-tdr.png');
      });
  </script>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>

  <?php
  if (file_exists(DOKU_PLUGIN.'googleanalytics/code.php')) include_once(DOKU_PLUGIN.'googleanalytics/code.php');
  if (function_exists('ga_google_analytics_code')) ga_google_analytics_code();
  ?>
</head>

<body>
<div class="bg"><div class="front"></div></div>

<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html')?>
<div class="dokuwiki">
  <?php html_msgarea()?>

  <div class="stylehead">

    <div class="header">
      <div class="logo">
        <?php tpl_link(wl(),'<img src="'.DOKU_TPL.'images/logo.png" alt="logo" />','id="dokuwiki__top" accesskey="h" title="[ALT+H]"')?>
      </div>
      <!-- menu_primary -->
      <div class="menu_primary">
        <?php print tpl_menu("primary"); ?>
      </div>
    <?php /*old includehook*/ @include(dirname(__FILE__).'/header.html')?>
    </div>

    <div class="bar" id="bar__top">
      <div class="bar-left" id="bar__topleft">
        <?php if($INFO['userinfo']) { tpl_button('edit'); } ?>
        <?php if($INFO['userinfo']) { tpl_button('history'); } ?>
      </div>

      <div class="bar-right" id="bar__topright">
        <?php if($INFO['userinfo']) { tpl_button('recent'); } ?>
        <?php tpl_searchform()?>&nbsp;
      </div>

      <div class="clearer"></div>
    </div>

    <?php if($conf['breadcrumbs']){?>
    <div class="breadcrumbs">
      <?php tpl_breadcrumbs()?>
      <?php //tpl_youarehere() ?>
    </div>
    <?php }?>

    <?php if($conf['youarehere']){?>
    <div class="breadcrumbs">
      <?php tpl_youarehere() ?>
    </div>
    <?php }?>

  </div>
  <?php flush()?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>

  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->

    <?php
    if (file_exists(DOKU_PLUGIN.'googleads/code.php')) include_once(DOKU_PLUGIN.'googleads/code.php');
    if (function_exists('gads_code')) gads_code();
    ?>
  </div>

  <div class="clearer">&nbsp;</div>

  <?php flush()?>

  <div class="stylefoot">

    <div class="meta">
      <div class="user">
        <?php tpl_userinfo()?>
      </div>
      <div class="doc">
        <?php tpl_pageinfo()?>
      </div>
    </div>

    <div class="meta">
        <?php tpl_button('subscription')?>
    </div>

   <?php /*old includehook*/ @include(dirname(__FILE__).'/pagefooter.html')?>

    <div class="bar" id="bar__bottom">
      <div class="bar-left" id="bar__bottomleft">
        <?php if($INFO['userinfo']) { tpl_button('edit'); } ?>
        <?php if($INFO['userinfo']) { tpl_button('history'); } ?>
      </div>
      <div class="bar-right" id="bar__bottomright">
        <?php if($INFO['userinfo']) { tpl_button('login'); } ?>
        <?php if($INFO['userinfo']) { tpl_button('admin'); } ?>
        <?php if($INFO['userinfo']) { tpl_button('profile'); }?>
        <?php tpl_button('index')?>
        <?php tpl_button('top')?>&nbsp;
      </div>
      <div class="clearer"></div>
    </div>

  </div>
<?php /*old includehook*/ @include(dirname(__FILE__).'/footer.html')?>
</div>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
