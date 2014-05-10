<?php defined( '_JEXEC' ) or die; 
/*------------------------------------------------------------------------
# author  Klaus-Peter Sauer
# version   1.0.0 November 9, 2013
# package München Rangers Joomla Template 2014
# copyright Copyright © 2013 by Klaus-Peter Sauer - All rights reserved.
# @license  http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Website http://www.muenchen-rangers.de
-------------------------------------------------------------------------*/
include_once JPATH_THEMES.'/'.$this->template.'/logic.php'; // load logic.php

?><!doctype html>
<!--[if IEMobile]><html class="iemobile" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8" lang="<?php echo $this->language; ?>"> <![endif]-->
<!--[if gt IE 8]><!-->  <html class="no-js" lang="<?php echo $this->language; ?>"> <!--<![endif]-->

<head>
  <jdoc:include type="head" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo $tpath; ?>/images/apple-touch-icon-57x57-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $tpath; ?>/images/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $tpath; ?>/images/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $tpath; ?>/images/apple-touch-icon-144x144-precomposed.png">
  <link rel="stylesheet" href="templates/rangers2014/css/tooltip.css">
  <script src="templates/rangers2014/js/jquery-ui-1.10.4.custom.js"></script>
  <script>
   jQuery(document).ready(function() {
    jQuery( '.rs_calendar_module' ).tooltip();  
   });

  </script>
  <script type="text/javascript" src="<?php echo $tpath.'/js/easing.js'; ?>"></script>
  <script type="text/javascript" src="<?php echo $tpath.'/js/jquery.ui.totop.js'; ?>" ></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      jQuery().UItoTop({ easingType: 'easeOutQuart' });
    });
    
  </script>
  <!--[if lte IE 8]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <?php if ($pie==1) : ?>
      <style> 
      .tip, .kp-content, h3.moduletable , .moduletable, .mr-tab, .uneditable-input:focus, .game-center-away-team .score, .game-center-home-team .score, img.game-center-home-team, img.game-center-away-team
        {behavior:url(<?php echo $tpath; ?>/js/PIE.htc);}
      </style>
    <?php endif; ?>
  <![endif]-->
</head>
<body class="<?php echo (($menu->getActive() == $menu->getDefault()) ? ('front') : ('page')).' '.$active->alias.' '.$pageclass; ?>">
  <a name="toTop" id="toTop" ></a>
<!-- ************************************************
*   T O P                                           *
* Module: schriftzug, topmenu, search,              *
*         teamlinks, ticker                         *
* Other:  NONE                                      *
*************************************************/-->

<!-- *****  HEADER  ***** -->
  <div id="bgheader">
    <div class="container">
      <div class="row">
        <!-- ***** München Rangers Schriftzug ***** -->
            <div class="col-md-4 col-sm-3 col-xs-4">
              <?php if($this->countModules('ticker')) :?>
                <div class="mr-schriftzug-ticker">
                  <a href="index.php">
                    <img src="templates/rangers2014/images/mr-schrift.png" class="mr-muenchen" alt="München Rangers Schriftzug"> 
                  </a>
                </div>
              <?php else: ?> 
                <div class="mr-schriftzug">
                  <a href="index.php">
                    <img src="templates/rangers2014/images/mr-schrift.png" class="mr-muenchen" alt="München Rangers Schriftzug"> 
                  </a>
                </div>
              <?php endif; ?> 
            </div>
        <div class="col-md-8 col-sm-9 col-xs-8">
          <div class="row">
            <?php if($this->countModules('topmenu')) :?>
              <div class="navbar navbar-inverse col-md-7 col-sm-7 hidden-xs" role="navigation">
                <div class="navbar-header">
                  <jdoc:include type="modules" name="topmenu" />
                </div>
              </div>
            <?php endif; ?> 
            <?php if($this->countModules('search')) :?>
              <div class="mr-search col-md-5 col-sm-5 hidden-xs">
                <jdoc:include type="modules" name="search" />
              </div>
            <?php endif; ?> 
          </div>
          <div class="row">
            <?php if($this->countModules('teamlinks')) :?>
              <div class="teams col-md-11 col-md-offset-1 col-lg-9 col-lg-offset-3 visible-md visible-lg">
                <jdoc:include type="modules" name="teamlinks" />
              </div>
            <?php endif; ?> 
          </div>
        </div>
      </div>
      <!-- ***** TICKER ***** -->
        <!-- Prüfen ob TICKER vorhanden -->
        <?php if($this->countModules('ticker')) :?>
          <div class="row">
            <div class="col-md-10 col-md-offset-2 col-sm-9 col-sm-offset-3 hidden-xs">
              <div id="ticker"> <jdoc:include type="modules" name="ticker" /> </div>
            </div>
          </div>      
        <?php endif; ?> 
    </div>    
  </div>

<!-- ****************************************************
*   M I D D L E                                         *
* Module:   navbar, show, news, logout,                 *
*           sponsor1, component, message,               *
*           gamecenter, user10, user11, user12,         *
*           user13, sidebar                             *
* Other:    Hintergrundbild                             *
*****************************************************/-->
<?php if($this->params->get('background')): ?>
<style>
    #bgoverall{
        height:100%;
        min-height:1100px;
        margin:0 auto;
        text-align:left;
        width:100%;
        z-index:0;
        background:url('<?php echo $tpath.'/images/background/'.$this->params->get('background'); ?>') no-repeat top center #000}
</style>
 <?php endif; ?>
  <div id="bgoverall">
    <div id="overall">

    <!-- ***** NAVBAR JoomlaCK Megamenu***** -->  
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12"> <jdoc:include type="modules" name="navbar" /> </div>      
        </div>      
      </div>

    <!-- ***** SLIDE SHOW + NEWS MODULE ***** -->
    <!-- Nur auf HAUPTSEITE -->
      <?php if($this->countModules('show or news')) :?>
        <div class="container">
          <div class="row">
            <div class="col-md-12 col-sm-12">
              <div class="row">
                <div class="col-md-8 col-sm-12"> <jdoc:include type="modules" name="show" /> </div>
                <div class="col-md-4 col-sm-6"> <jdoc:include type="modules" name="news" style="xhtml" /> </div> 
    <!-- ***** Sponsoren bei kleinen Bildschirmen neben News ***** -->
                <div class="col-sm-6 hidden-lg hidden-md hidden-xs"> 
                  <div class="sponsor1 kp-content "> <jdoc:include type="modules" name="sponsor1" /> </div>
                </div>

              </div> 
            </div>
          </div>
        </div>
      <?php else: ?>
      <!-- NEBENSEITE -->
        <div class="container">
          <div class="row">
            <div class="col-sm-12 hidden-lg hidden-md hidden-xs"> 
              <div class="sponsor1 kp-content "> <jdoc:include type="modules" name="sponsor1" /> </div>
            </div>
          </div>
        </div>
    
      <?php endif; ?> 

    <!-- ***** MAIN SPONSORS & LOGOUT ***** -->
        <?php if($this->countModules('sponsor1')) :?>
        <div class="container">
          <div class="row"> 
            <div class="col-md-12 hidden-sm"> 
              <div class="sponsor1 kp-content "> <jdoc:include type="modules" name="sponsor1" /> </div>
            </div>
          </div>
        </div>
        <?php endif; ?> 


    <!-- ***** MAIN CONTENT ***** -->
      <div class="container">
        <div class="row">
        <!-- Prüfen ob SIDEBAR vorhanden -->
        <?php if($this->countModules('sidebar')) :?>
        <!-- Wenn SIDEBAR vorhanden -> geteilter Inhalt 9:3 -->
          <!-- HAUPTSEITE?? -->
          <?php if($menu->getActive() == $menu->getDefault()) :?> 
            <div class="col-md-9 col-sm-8">
              <div class="kp-content">
                <?php if (!empty($app->getMessageQueue)) : ?>
                  <jdoc:include type="message" />
                <?php endif ?>
                <?php if($this->countModules('news')) :?>
                <?php else: ?> 
                  <div class="margin-content"> <jdoc:include type="component" /> </div> 
                <?php endif; ?> 
              </div> 
              <div class="row">
                <div class="col-md-8 col-sm-12">
                  <?php if($this->countModules('gamecenter')) :?> 
                  <div class="kp-content margin-correct ">
                    <jdoc:include type="modules" name="gamecenter" style="xhtml" />
                    <!-- ***** Bootstrap CAROUSEL ***** -->
                    <script type="text/javascript"> 
                      jQuery(document).ready(function() {
//                        jQuery('.carousel').each(function(){
//                        jQuery(this).carousel({
//                            interval: 600000
//                        });
//                        jQuery('.carousel').carousel('pause');
//                        });
                      });
                      if (typeof jQuery != 'undefined' && typeof MooTools != 'undefined' ) {
                          Element.implement({
                              slide: function(how, mode){
                                  return this;}
                          });
                      } </script>
  				        </div>
                  <?php endif; ?>  

                  <?php if($this->countModules('user10')) :?> 
                    <div class="">
                      <jdoc:include type="modules" name="user10" style="xhtml" />
                    </div> 
                  <?php endif; ?>  

                </div> 
                <div class="col-md-4 hidden-xs hidden-sm">
                  <?php if($this->countModules('user11')) :?> 
                    <jdoc:include type="modules" name="user11" style="xhtml" />
                  <?php endif; ?>  
                </div> 
              </div>
              <div class="row">
                <div class="col-md-6">
                  <?php if($this->countModules('user12')) :?> 
                    <jdoc:include type="modules" name="user12" style="xhtml" />
                  <?php endif; ?>  
                </div> 
                <div class="col-md-6">
                  <?php if($this->countModules('user13')) :?> 
                    <jdoc:include type="modules" name="user13" style="xhtml" />
                  <?php endif; ?>  
                </div> 
              </div>
            </div>

            <div class="col-md-3 col-sm-4">
              <jdoc:include type="modules" name="sidebar" style="xhtml" />
            </div>
          <?php else: ?>
          <!-- NEBENSEITE -->
            <div class="col-md-9 col-sm-12 col-xs-12">
              <div class="kp-content">
                <?php if (!empty($app->getMessageQueue)) : ?>
                  <jdoc:include type="message" />
                <?php endif ?>
                  <div class="margin-content"> <jdoc:include type="component" /> </div> 
              </div> 
            </div> 

            <div class="col-md-3 hidden-xs hidden-sm">
              <jdoc:include type="modules" name="sidebar" style="xhtml" />
            </div>
          <?php endif; ?>  

        <?php else: ?> 
          <!-- Wenn SIDEBAR nicht vorhanden -> ganze Breite 12 columns für Content wie z.B. Forum -->
            <div class="col-md-12">
              <div class="kp-content">
                <?php if (!empty($app->getMessageQueue)) : ?>
                  <jdoc:include type="message" />
                <?php endif ?>
                <div class="margin-content"> <jdoc:include type="component" /> </div> 
              </div> 
            </div>
        <?php endif; ?> 
        </div>
      </div>
<!-- ****************************************************
*   B O T T O M                                         *
* Module:   sponsor2-1, sponsor2-2, sponsor2-3,         *
*           sponsor2-4, sponsor2-5, sponsor2-6          *
*           sitemap1, sitemap2, sitemap3, sitemap4,     *
*           sitemap5, facebook, expedia                 *
*****************************************************/-->
<!-- ***** FACEBOOK & EXPEDIA ***** -->
    <?php if($this->countModules('facebook or expedia')) :?>
    <div class="container ">
      <div class="row">
        <div class="facebook col-md-6 col-md-offset-1 col-sm-6 col-xs-12"><jdoc:include type="modules" name="facebook" /></div>
        <div class="expedia col-md-5 col-sm-6 hidden-xs"><jdoc:include type="modules" name="expedia" /></div>
      </div>
    </div>
    <?php endif; ?> 
  <!-- ***** SPONSORS 2 ***** -->
    <?php if($this->countModules('sponsor2-1 or sponsor2-2 or sponsor2-3 or sponsor2-4 or sponsor2-5 or sponsor2-6')) :?>
    <div class="container">
      <div class="row">
        <div class="sponsor2 col-md-2 col-sm-2"><jdoc:include type="modules" name="sponsor2-1" /></div>
        <div class="sponsor2 col-md-2 col-sm-2"><jdoc:include type="modules" name="sponsor2-2" /></div>
        <div class="sponsor2 col-md-2 col-sm-2"><jdoc:include type="modules" name="sponsor2-3" /></div>
        <div class="sponsor2 col-md-2 col-sm-2"><jdoc:include type="modules" name="sponsor2-4" /></div>
        <div class="sponsor2 col-md-2 col-sm-2"><jdoc:include type="modules" name="sponsor2-5" /></div>
        <div class="sponsor2 col-md-2 col-sm-2"><jdoc:include type="modules" name="sponsor2-6" /></div>
      </div>
    </div>
    <?php endif; ?> 
  <!-- ***** Footer for Sitemap ***** -->
    <?php if($this->countModules('sitemap1 or sitemap2 or sitemap3 or sitemap4 or sitemap5')) :?>
    <div class="container hidden-xs">
      <div class="row">
        <a name="toSiteMap" id="toSiteMap" ></a>
        <div class="sitemap col-md-2 col-md-offset-1 col-sm-3 col-sm-offset-1"><jdoc:include type="modules" name="sitemap1" /></div>
        <div class="sitemap col-md-2 col-sm-3"><jdoc:include type="modules" name="sitemap2" /></div>
        <div class="sitemap col-md-2 col-sm-3"><jdoc:include type="modules" name="sitemap3" /></div>
        <div class="sitemap col-md-2 col-sm-3"><jdoc:include type="modules" name="sitemap4" /></div>
        <div class="sitemap col-md-2 col-sm-3"><jdoc:include type="modules" name="sitemap5" /></div>
      </div>
    </div>
    <?php endif; ?> 
  

    </div>  
  </div>

<!-- ****************************************************
*   F O O T E R                                         *
*                                                       *
* Other:    Copyright                                   *
*****************************************************/-->
  <div id="bgfooter">
  <!-- ***** COPYRIGHT ***** -->
    <div class="container">
      <div class="row">
        <div id="copyright">
          <div class="col-md-12">
            <?php echo JText::_('Footballclub M&uuml;nchen 1981 M&uuml;nchen Rangers e.V. &minus; American Football in M&uuml;nchen.<br /> 
            &copy; 2009-'.date('Y ').' by KP &minus; Alle Rechte vorbehalten.')?> 
            <a><img class="footer-logo" src="templates/rangers2014/images/rangers_stern_286.png" width="1" height="1" alt=""> </a>
          </div>
        </div>  
      </div>
    </div>  
  </div>
<!-- ************************************************
*   F L O A T I N G   Modules           *
* Module:   social, debug             *
* Other:  To-Top Button, FB Code, Expedia Code  *
*************************************************/-->
<!-- ***** SOCIAL BAR ***** -->
  <?php if($this->countModules('social')) :?>
    <div id="social-buttons" class="right hidden-xs">
      <jdoc:include type="modules" name="social"/>      
    </div>
  <?php endif; ?> 

  
  <jdoc:include type="modules" name="debug" />
</body>
<!-- ********************************************
*   P I W I K -> noch einfügen!!!       *
*************************************************/-->

<div id="fb-root"></div>

<!-- ********************************************
*   EXPEDIA CODE                      *
*************************************************/-->
<script type='text/javascript' src='http://widgets.partners.expedia.de/daily/shared/affiliates/WidgetService.aspx?partner=cobrand&eapid=13858-6&omnituretag1key=mdpcid&omnituretag1value=wpk.DE.13858.WD00002&size=300x250&window=new&products=hotels%2cflighthotel%2cflights%2ccars%2cpackageholidays%2cactivities&widgetname=searchform&divid=searchform_634758699966593314&langid=1031'></script> 

<!-- ********************************************
*   FACEBOOK CODE                     *
*************************************************/-->
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/de_DE/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- ********************************************
*   OTHER CODE               *
*************************************************/-->

</html>
<script type="text/javascript">
    jQuery(document).ready(function() {
          jQuery('#lbClose, #lbOverlay').live('click',function(){
              jQuery('#lbOverlay').height(0);
          }); 
    });
</script>


<style>
    #mainmenu_mr {
    display: block !important;
}
.floatck{
z-index: 1000000;
position: relative;
}

.carousel-control, .carousel-control:focus {
    top: 35px!important;

}
</style>
