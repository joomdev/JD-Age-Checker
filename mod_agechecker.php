<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
/*-------------------------------------------------------------------------------
# mod_agechecker - JD Age Checker Joomla 3 module v1.1.1-PRO
# -------------------------------------------------------------------------------
# author    JoomDev (Formerly GraphicAholic)
# copyright Copyright (C) 2020 Joomdev, Inc. All rights reserved.
# @license - http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
# Websites: https://www.joomdev.com
--------------------------------------------------------------------------------*/
// No direct access
defined('_JEXEC') or die('Restricted access');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
JHtml::_('bootstrap.framework');
// Import the file / foldersystem
jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');
$LiveSite 	= JURI::base();
$document = JFactory::getDocument();
$modbase = JURI::base(true).'/modules/mod_agechecker/';
$siteWindow = $params->get('siteWindow');	
$document->addStyleSheet($modbase.'css/agecheck.css');
$redirectURL = $params->get('redirectURL'); 
$dateFormat = $params->get('dateFormat'); 
$loadjQuery = $params->get('loadjQuery'); 
$loadScripts = $params->get('loadScripts');           
if($loadScripts == 1) {
$document->addScript ($modbase.'js/'.$dateFormat.'');
}
$moduleID = $module->id;
?>
<?php if($loadjQuery == "1"):?>     
<script src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<?php endif ?>    
<?php if($loadScripts == "2"):?>    
<script src="<?php echo $modbase ?>js/<?php echo $params->get('dateFormat') ?>"></script>
<?php endif ?>
<style type="text/css">
.ac-container select {box-sizing: border-box !important; height: 28px !important; padding-left: 4px; width: 50% !important; margin-top: <?php echo $params->get('selectTopSpacing') ?>; margin-right: <?php echo $params->get('selectRightSpacing') ?>; display: inline;}    
.ac-overlay {background:<?php echo $params->get('overlayColor') ?>; opacity:<?php echo $params->get('overlayOpacity') ?> !important;}
.ac-container h3 {color: <?php echo $params->get('customHeaderColor') ?> !important;}
.ac-container button {background: <?php echo $params->get('buttonColor') ?> !important; color: <?php echo $params->get('buttonTextColor') ?> !important; text-shadow: 1px 1px 0 <?php echo $params->get('buttonTextShadow') ?> !important; margin-top: <?php echo $params->get('buttonSpacing') ?>;}    
.ac-container a {color: <?php echo $params->get('buttonTextColor') ?> !important; text-decoration: none;}
.ac-container button:hover{background: <?php echo $params->get('buttonColorHover') ?> !important;}
.ac-container h2 {color: <?php echo $params->get('customHeaderColor') ?> !important;}
.ac-container p {color: <?php echo $params->get('customTextColor') ?> !important;}
</style>
<script type="text/javascript">
	jQuery(document).ready(function(){
            jQuery.ageCheck({
            minAge : <?php echo $params->get('minAge') ?>,      
            <?php if ($redirectURL == "2") : ?>
            redirectTo : '<?php echo $params->get('siteRedirect') ?>',
            siteWindow : '<?php echo $params->get('siteWindow') ?>',
            <?php endif ?>
            <?php if ($redirectURL == "1") : ?>
            redirectTo : '',
            <?php endif ?>
            redirectOnFail: '<?php echo $params->get('failedRedirect') ?>',
            title : '<?php echo $params->get('verificationTitle') ?>', 
            copy : '<?php echo $params->get('verificationData') ?>',
            underAgeMsg: '<?php echo $params->get('underAgeMessage') ?>',
            //overlayOpacity : '<?php echo $params->get('overlayOpacity') ?>',
            backgroundColor : '<?php echo $params->get('backgroundColor') ?>',
            useBailout : <?php echo $params->get('useBailout') ?>,
            bailout : "<?php echo $params->get('bailout') ?>",
            bailoutURL : "<?php echo $params->get('bailoutURL') ?>",
            successMsg : {
                  header: '<?php echo $params->get('successData') ?>'
                  },
            successDelay : <?php echo $params->get('successDelay') ?>,
                  selectmonth : '<?php echo $params->get('selectMonth') ?>',
                  january : '<?php echo $params->get('monthJanuary') ?>',
                  february : '<?php echo $params->get('monthFebruary') ?>',
                  march : '<?php echo $params->get('monthMarch') ?>',
                  april : '<?php echo $params->get('monthApril') ?>',
                  may : '<?php echo $params->get('monthMay') ?>',
                  june : '<?php echo $params->get('monthJune') ?>',
                  july : '<?php echo $params->get('monthJuly') ?>',
                  august : '<?php echo $params->get('monthAugust') ?>',
                  september : '<?php echo $params->get('monthSeptember') ?>',
                  october : '<?php echo $params->get('monthOctober') ?>',
                  november : '<?php echo $params->get('monthNovember') ?>',
                  december : '<?php echo $params->get('monthDecember') ?>',
                  dayText : '<?php echo $params->get('dayText') ?>',
                  yearText : '<?php echo $params->get('yearText') ?>',
                  submitText : '<?php echo $params->get('submitText') ?>',
                  errorMsg: {
                  invalidDay : '<?php echo $params->get('dayErrorText') ?>',
                  invalidYear : '<?php echo $params->get('yearErrorText') ?>'
                  }
            });

	});
</script>
<div class="agechecker">        
</div>