<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
$sitioUrl = 'http://'.$_SERVER['SERVER_NAME'].'/cooperativa/';
$controlador = $this->params['controller'];

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
   <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->webroot; ?>img/app.png">
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap.css', 'bootstrap-responsive.css', 'general.css', 'colors/noise-black.css', 'buttons/buttons'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

	?>
	 <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->webroot; ?>img/app.png">
    <script>
      //* hide all elements & show preloader
      document.documentElement.className += 'loader';
    </script>
</head>
<body>
	<div class="loading"><img src="<?php echo $this->webroot; ?>img/ajaxLoader/loader01.gif" alt=""></div>

    <div class="mainContainer">

        
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content');  ?>
        </div>
        

    </div>

     <?php echo $this->Html->script(array('jquery-1.8.3.js', 'ui/jquery-ui-1.9.2.custom.js', 'flot/excanvas.min.js', 'flot/jquery.flot.js', 'flot/jquery.flot.pie.min.js', 'flot/jquery.flot.resize.js', 'flot/jquery.flot.orderBars.js', 'formWizard/jquery.form.js', 'formWizard/jquery.validate.js', 'formWizard/bbq.js', 'formWizard/jquery.form.wizard.js',  'scrollbar/jquery.mCustomScrollbar.js', 'fullcalendar/fullcalendar.js', 'tipsy/jquery.tipsy.js', 'fancybox/jquery.fancybox.pack.js', 'uniform/jquery.uniform.js', 'dataTable/jquery.dataTables.js', 'sparklines/jquery.sparkline.js', 'chosen/chosen.jquery.js', 'cookie/jquery.cookie.js', 'jplayer/jquery.jplayer.min.js', 'mask/jquery.maskedinput-1.3.js', 'easypiechart/jquery.easy-pie-chart.js', 'globalize/globalize.js', 'globalize/cultures/globalize.culture.de.js', 'jplayer/jquery.jplayer.min.js', 'jplayer/jplayer.playlist.min.js', 'ibutton/jquery.ibutton.js', 'dateRangepicker/date.js', 'dateRangepicker/daterangepicker.jQuery.js', 'antiscroll/jquery-mousewheel.js', 'antiscroll/antiscroll.js', 'fullcalendar/fullcalendar.js','bootstrap.min.js', 'application.js', 'general.js', 'forms.js', 'select2.js', 'calendar.js' ));
     ?>
    <!-- Le javascript
    ================================================== -->

   </body>

    <script>
      $(document).ready(function() {
        setTimeout('$("html").removeClass("loader")',100);
      });
    </script>
</html>
