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

$cakeDescription = __d('cake_dev', 'Sistema Cooperativa');
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


		echo $this->Html->css(array('bootstrap.css', 'bootstrap-responsive.css', 'general.css', 'colors/noise-black.css', 'select2.css'));

    echo $this->Html->script(array('jquery-1.8.3.js', 'ui/jquery-ui-1.9.2.custom.js', 'flot/excanvas.min.js', 'flot/jquery.flot.js', 'flot/jquery.flot.pie.min.js', 'flot/jquery.flot.resize.js', 'flot/jquery.flot.orderBars.js', 'formWizard/jquery.form.js', 'formWizard/jquery.validate.js', 'formWizard/bbq.js', 'formWizard/jquery.form.wizard.js',  'scrollbar/jquery.mCustomScrollbar.js', 'fullcalendar/fullcalendar.js', 'tipsy/jquery.tipsy.js', 'fancybox/jquery.fancybox.pack.js', 'uniform/jquery.uniform.js', 'dataTable/jquery.dataTables.js', 'sparklines/jquery.sparkline.js', 'chosen/chosen.jquery.js', 'cookie/jquery.cookie.js', 'jplayer/jquery.jplayer.min.js', 'mask/jquery.maskedinput-1.3.js', 'easypiechart/jquery.easy-pie-chart.js', 'globalize/globalize.js', 'globalize/cultures/globalize.culture.de.js', 'jplayer/jquery.jplayer.min.js', 'jplayer/jplayer.playlist.min.js', 'ibutton/jquery.ibutton.js', 'dateRangepicker/date.js', 'dateRangepicker/daterangepicker.jQuery.js', 'antiscroll/jquery-mousewheel.js', 'antiscroll/antiscroll.js', 'fullcalendar/fullcalendar.js','bootstrap.min.js', 'application.js', 'general.js', 'forms.js', 'select2.js', 'calendar.js' ));
     

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

      <ul class="responsiveNav">
            <li><a href="#"><i class="icon-white icon-home"></i>Quienes Somos <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>somos/"><i class="icon-white icon-file"></i>Quienes Somos</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/mision"><i class="icon-white icon-eye-open"></i>Mision y Vision</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/respaldo"><i class="icon-white icon-download-alt"></i>Respaldo</a></li>
              </ul>
            </li>
             <li><a href="#"><i class="icon-white icon-list"></i>Construcción <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>tiposMaquinarias/"><i class="icon-white icon-exclamation-sign"></i>Tipos de Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camiones/"><i class="icon-white icon-screenshot"></i>Camiones</a></li>
                 <li><a href="<?php echo $sitioUrl ?>maquinarias/"><i class="icon-white icon-road"></i>Maquinarias</a></li>
                 <li><a href="#"><i class="icon-white icon-tasks"></i>Tabuladores <span class="expand"></span></a>
                  <ul class="subMenu" style="display: none;">
                    <li><a href="<?php echo $sitioUrl ?>camionesTabuladores/">Camiones</a></li>
                    <li><a href="<?php echo $sitioUrl ?>tabuladores/">Maquinarias</a></li>
                  </ul>
                </li>         
              </ul>
            </li>
              <li><a href="#"><i class="icon-white icon-calendar"></i>Trabajos <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>maquinariasTrabajos/"><i class="icon-white icon-file"></i>Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camionesTrabajos/"><i class="icon-white icon-eye-open"></i>Camiones</a></li>               
              </ul>
            </li>
            <li><a href="#"><i class="icon-white icon-th"></i>Personal <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>cargos/"><i class="icon-white icon-bookmark"></i>Cargos</a></li>
                <li><a href="<?php echo $sitioUrl ?>empleados/"><i class="icon-white icon-user"></i>Empleados</a></li>
               
                <li><a href="<?php echo $sitioUrl ?>empleados/generarNomina"><i class="icon-white icon-user"></i>Generar Nómina</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="icon-white icon-signal"></i>Reportes <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>maquinariasTrabajos/consultarForm"><i class="icon-white icon-file"></i>Consultas Trabajos Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camionesTrabajos/consultarForm"><i class="icon-white icon-file"></i>Consultas Trabajos Camiones</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/consultarForm"><i class="icon-white icon-file"></i>Trabajos Totales</a></li>
              </ul>
            </li>
            </li>
            <li><a href="<?php echo $sitioUrl ?>usuarios/"><i class="icon-white icon-user"></i>Usuarios</a></li>             
      </ul>

      <div class="containerNav">
        <ul class="noFluidNav">           
            <li><a href="#"><i class="icon-white icon-home"></i>Quienes Somos <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>somos/"><i class="icon-white icon-file"></i>Quienes Somos</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/mision"><i class="icon-white icon-eye-open"></i>Mision y Vision</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/respaldo"><i class="icon-white icon-download-alt"></i>Respaldo</a></li>
              </ul>
            </li>
             <li><a href="#"><i class="icon-white icon-list"></i>Construcción <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>tiposMaquinarias/"><i class="icon-white icon-exclamation-sign"></i>Tipos de Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camiones/"><i class="icon-white icon-screenshot"></i>Camiones</a></li>
                 <li><a href="<?php echo $sitioUrl ?>maquinarias/"><i class="icon-white icon-road"></i>Maquinarias</a></li>
                 <li><a href="#"><i class="icon-white icon-tasks"></i>Tabuladores <span class="expand"></span></a>
                  <ul class="subMenu" style="display: none;">
                    <li><a href="<?php echo $sitioUrl ?>camionesTabuladores/">Camiones</a></li>
                    <li><a href="<?php echo $sitioUrl ?>tabuladores/">Maquinarias</a></li>
                  </ul>
                </li>         
              </ul>
            </li>
             <li><a href="#"><i class="icon-white icon-calendar"></i>Trabajos <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>maquinariasTrabajos/"><i class="icon-white icon-file"></i>Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camionesTrabajos/"><i class="icon-white icon-eye-open"></i>Camiones</a></li>               
              </ul>
            </li>
            <li><a href="#"><i class="icon-white icon-th"></i>Personal <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>cargos/"><i class="icon-white icon-bookmark"></i>Cargos</a></li>
                <li><a href="<?php echo $sitioUrl ?>empleados/"><i class="icon-white icon-user"></i>Empleados</a></li>
               
                <li><a href="<?php echo $sitioUrl ?>empleados/generarNomina"><i class="icon-white icon-user"></i>Generar Nómina</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="icon-white icon-signal"></i>Reportes <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>maquinariasTrabajos/consultarForm"><i class="icon-white icon-file"></i>Consultas Trabajos Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camionesTrabajos/consultarForm"><i class="icon-white icon-file"></i>Consultas Trabajos Camiones</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/consultarForm"><i class="icon-white icon-file"></i>Trabajos Totales</a></li>
              </ul>
            </li>
            <li><a href="<?php echo $sitioUrl ?>usuarios/"><i class="icon-white icon-user"></i>Usuarios</a></li>
        </ul>
      </div>

      <header>
        <div>
          <a href="#" class="logo"><?php echo $this->Html->image('app.png', array('alt' => 'logo', 'width' => '30'));?> Sistema Administrativo de Transporte</a>
          
          <ul class="headerButtons">
            <li class="respNav"><a href="#"><img src="<?php echo $this->webroot; ?>img/icons/14x14/light/list.png" alt=""></a></a></li>
            <li><a href="../usuarios/logout"><img src="<?php echo $this->webroot; ?>img/icons/14x14/light/lock3.png" alt=""></a>
          </ul>
        </div>
      </header>

      <div class="widgetBar">
        <div class="barInner">
          <ul class="navigation">
            
            <li><a href="#"><i class="icon-white icon-home"></i>Quienes Somos <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>somos/"><i class="icon-white icon-file"></i>Quienes Somos</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/mision"><i class="icon-white icon-eye-open"></i>Mision y Vision</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/respaldo"><i class="icon-white icon-download-alt"></i>Respaldo</a></li>
              </ul>
            </li>
             <li><a href="#"><i class="icon-white icon-list"></i>Construcción <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>tiposMaquinarias/"><i class="icon-white icon-exclamation-sign"></i>Tipos de Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camiones/"><i class="icon-white icon-screenshot"></i>Camiones</a></li>
                 <li><a href="<?php echo $sitioUrl ?>maquinarias/"><i class="icon-white icon-road"></i>Maquinarias</a></li>
                 <li><a href="#"><i class="icon-white icon-tasks"></i>Tabuladores <span class="expand"></span></a>
                  <ul class="subMenu" style="display: none;">
                    <li><a href="<?php echo $sitioUrl ?>camionesTabuladores/">Camiones</a></li>
                    <li><a href="<?php echo $sitioUrl ?>tabuladores/">Maquinarias</a></li>
                  </ul>
                </li>         
              </ul>
            </li>
             <li><a href="#"><i class="icon-white icon-calendar"></i>Trabajos <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>maquinariasTrabajos/"><i class="icon-white icon-file"></i>Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camionesTrabajos/"><i class="icon-white icon-eye-open"></i>Camiones</a></li>               
              </ul>
            </li>
            <li><a href="#"><i class="icon-white icon-th"></i>Personal <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>cargos/"><i class="icon-white icon-bookmark"></i>Cargos</a></li>
                <li><a href="<?php echo $sitioUrl ?>empleados/"><i class="icon-white icon-user"></i>Empleados</a></li>
               
                <li><a href="<?php echo $sitioUrl ?>empleados/generarNomina"><i class="icon-white icon-user"></i>Generar Nómina</a></li>
              </ul>
            </li>
            <li><a href="#"><i class="icon-white icon-signal"></i>Reportes <span class="expand"></span></a>
              <ul class="subMenu" style="display: none;">
                <li><a href="<?php echo $sitioUrl ?>maquinariasTrabajos/consultarForm"><i class="icon-white icon-file"></i>Consultas Trabajos Maquinarias</a></li>
                <li><a href="<?php echo $sitioUrl ?>camionesTrabajos/consultarForm"><i class="icon-white icon-file"></i>Consultas Trabajos Camiones</a></li>
                <li><a href="<?php echo $sitioUrl ?>somos/consultarForm"><i class="icon-white icon-file"></i>Trabajos Totales</a></li>
              </ul>
            </li>
            <li><a href="<?php echo $sitioUrl ?>usuarios/"><i class="icon-white icon-user"></i>Usuarios</a></li>
          </ul>
        </div>
      </div>

      <div class="content">
        <div class="topBar">
          <div class="topBarInner">
            <ul class="breadcrumbs">
              <li><a href="#"><img src="<?php echo $this->webroot; ?>img/icons/14x14/export1.png" alt=""></a></li>
              <li><a href="#"><?php echo Inflector::humanize(Inflector::underscore($this->params['controller'])); ?></a></li>
            </ul>
            
          </div>
        </div>

        <div class="contentInner">          
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content');  ?>
        </div>
        
      </div>

    </div>

    
    <!-- Le javascript
    ================================================== -->


    <script>
      $(document).ready(function() {
        setTimeout('$("html").removeClass("loader")',100);

      });

    </script>

    <script type="text/javascript">

  var gu;
$("#nuevo-dialog").dialog({ 
    autoOpen: false,
    title: 'Información del Registro',
    width: 400,
    resizable: false,
    show: {
        effect: "blind",
        duration: 50
      },
      hide: {
        effect: "explode",
        duration: 500
      }
 });

$("#messages").dialog({ 
    autoOpen: false,
    title: 'Operación no permitida',
    resizable: false,
    buttons: [{ text: "Ok", click: function() { $( this ).dialog( "close" ); } } ],
    show: {
        effect: "blind",
        duration: 50
      },
      hide: {
        effect: "explode",
        duration: 500
      }
 });


$("#confirmacion").dialog({ 
    autoOpen: false,
    title: 'Confirmación',
    buttons: {
        Aceptar: function() {
          $.ajax({
            type: "POST",
            url: "<?php  echo $sitioUrl.$controlador; ?>/eliminar",
            data: {id: gu}
          })
            .done(function() {
              location.reload();
            })
            .fail(function() {
              alert( "error" );
            });
          $( this ).dialog( "close" );
        },
        Cancelar: function() {
          $( this ).dialog( "close" );
        }
      },
    show: {
        effect: "blind",
        duration: 50
      },
      hide: {
        effect: "explode",
        duration: 500
      }
 });

$("#add").click(function() {
    $("#nuevo-dialog").load("<?php  echo $sitioUrl.$controlador; ?>/agregar");
    $("#nuevo-dialog").dialog("open");
});

$("input").click(function(){
  gu = $("input:checked").val();
  
});

$("#edit").click(function() {
    if(gu==undefined) {
      $("#messages").html("Debe seleccionar un registro!!").dialog("open");
      return;
    }
    else{
      $("#nuevo-dialog").load("<?php  echo $sitioUrl.$controlador; ?>/editar/"+gu);
      $("#nuevo-dialog").dialog("open");

    }
});
$("#delete").click(function() {
  if(gu==undefined) {
      $("#messages").html("Debe seleccionar un registro!!").dialog("open");
      return;
    }
    else {
      $("#confirmacion").html("¿Está seguro que desea eliminar el registro?").dialog("open");
    }
});
$(document).ready(function() {
  $(".lengthLabel").html('Registros por pagina');
});

$("#nuevo-reporte").dialog({ 
    autoOpen: false,
    title: 'Reportes',
    width: 600,
    resizable: false,
    show: {
        effect: "blind",
        duration: 50
      },
      hide: {
        effect: "explode",
        duration: 500
      }
 });
  $("#lista-docentes").click(function() {
      $("#nuevo-reporte").load("reportes/listaDocentes/");
      $("#nuevo-reporte").dialog("open");

    });
  $("#trabajoMaquinaria").click(function() {
    if(gu==undefined) {
      $("#messages").html("Debe seleccionar una Maquina!!").dialog("open");
      return;
    }
    else{
      $(location).attr('href','<?php echo $sitioUrl.$controlador; ?>/pdfTrabajo/'+gu);
    }
  });

  $("#trabajo").click(function() {
    if(gu==undefined) {
      $("#messages").html("Debe seleccionar un Camión!!").dialog("open");
      return;
    }
    else{
      $(location).attr('href','<?php echo $sitioUrl.$controlador; ?>/pdfTrabajo/'+gu);
    }
  });



</script>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
