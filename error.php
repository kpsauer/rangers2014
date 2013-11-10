<?php defined( '_JEXEC' ) or die;
/*------------------------------------------------------------------------
# author  Klaus-Peter Sauer
# version   1.0.0 November 9, 2013
# package München Rangers Joomla Template 2014
# copyright Copyright © 2013 by Klaus-Peter Sauer - All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website http://www.muenchen-rangers.de
-------------------------------------------------------------------------*/
// variables
$app = JFactory::getApplication();
$doc = JFactory::getDocument(); 
$tpath = $this->baseurl.'/templates/'.$this->template;

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <title><?php echo $this->error->getCode(); ?> - <?php echo $this->title; ?></title>
  <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" /> <!-- mobile viewport optimized -->
  <link rel="stylesheet" href="<?php echo $tpath; ?>/css/error.css?v=1">
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png">
</head>

<body>
  <div align="center">
    <div id="error">
      <h1 align="center">
        <a href="<?php echo $this->baseurl; ?>/" class="ihrlogo">
          <img src="<?php echo $tpath; ?>/images/logo.png" width="256" border="0" alt="Muenchen Rangers">
        </a>
      </h1>
      <table width="100%">
        <tr>
          <td width="80%">      
            <?php 
              echo '<br /> <div class="error-message1">';
              echo $this->error->getCode().' - '.$this->error->getMessage(); 
              echo '</div><br />';
              if (($this->error->getCode()) == '404') {
                echo '<br /> <div class="error-message2">';
                echo JText::_('JERROR_LAYOUT_REQUESTED_RESOURCE_WAS_NOT_FOUND');
                echo '</div><br />';
             }
            ?>
          </td>
          <td>
            <a>
              <img src="<?php echo $tpath; ?>/images/penalty_flag.png" alt="Penalty Flag">
            </a>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td><td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <p><?php echo JText::_('JERROR_LAYOUT_GO_TO_THE_HOME_PAGE'); ?>: 
            <a href="<?php echo $this->baseurl; ?>/"><?php echo JText::_('JERROR_LAYOUT_HOME_PAGE'); ?></a></p>
          </td>
          <td>
            <?php // render module mod_search
              $module = new stdClass();
              $module->module = 'mod_search';
              echo JModuleHelper::renderModule($module);
            ?>
          </td>
        </tr>
      </table>  

    </div>
  </div>
</body>

</html>
