<?php

/*----------------------


    var amigable 	= (function() {
    	var tildes = "ÃƒÃ€ÃÃ„Ã‚ÃˆÃ‰Ã‹ÃŠÃŒÃÃÃŽÃ’Ã“Ã–Ã”Ã™ÃšÃœÃ›Ã£Ã Ã¡Ã¤Ã¢Ã¨Ã©Ã«ÃªÃ¬Ã­Ã¯Ã®Ã²Ã³Ã¶Ã´Ã¹ÃºÃ¼Ã»Ã‘Ã±Ã‡Ã§", 
    		conver = "AAAAAEEEEIIIIOOOOUUUUaaaaaeeeeiiiioooouuuunncc",
          	cuerpo 	= {};
     
     	for (var i=0, j=tildes.length; i<j; i++ ) { 
    		cuerpo[tildes.charAt(i)] = conver.charAt(i);
    	}
     
    	return function(str) {
    		var salida = [];
    		for( var i = 0, j = str.length; i < j; i++) {
    			var c = str.charAt( i );
    			if(cuerpo.hasOwnProperty(str.charAt(i))) {
    				salida.push(cuerpo[c]);
    			} else {
    				salida.push(c);
    			}
    		}
    		return salida.join('').replace(/[^-A-Za-z0-9]+/g, '-').toLowerCase();
    	}
    })();
     
     
    document.write(amigable("Esta es una Ã¡eÃ­prueba con tÃ¬ldes"));

*/

    /*-----------------------------

<html>
<head>
<?php

//Funcion donde envias una cadena y te reemplaza las "ñ", "tildes" y los espacios.
function reemplazacadena($cadena){

    $cadena = trim($cadena);
    $cadena = strtolower($cadena);
    $cadena_nueva=str_replace('á','a',str_replace('é','e',str_replace('í','i',
    str_replace('ó','o',str_replace('ú','u',str_replace('ñ','n',str_replace('Á','A',
    str_replace(' ','-',$cadena,str_replace('É','E',str_replace('Í','I',str_replace('Ó','O',str_replace('Ú','U',
    str_replace('Ñ','N',str_replace(' ','',($cadena)))))))))))))));
    return $cadena_nueva;
}

?>
<script languaje="javascript">
function pasaValor(form)
{ ejemplo2.url.value = ejemplo2.title.value; 

}
</script> 

</head>



<body>

    <form name="ejemplo2" method="POST">
Tu nombre: <input type="text" name="title" onKeyUp="pasaValor(this.form)"><br>
Nombre introducido: <input type="text" name="url" ReadOnly>
</body>
</html>

    ejemplo2.url.value = ejemplo2.title.value; //esto está mal
    document.ejemplo2.url.value = document.ejemplo2.title.value; //esto me parece que es lo correcto

    */

    /*-------------------------------

	var x;
x=$(document);
x.ready(UrlAmigable);

(function($){
    $.fn.extend({
        jFriendly : function ( inputUri , notEditable ){
        		inputUri = $(inputUri);
						$(this.href).each(function(){
							inputUri.val( uriSanitize($(this).val()) );
						});
						return inputUri;
        }
    });
})(jQuery);  
uriSanitize = function(uri) { 
	return String(uri)
		.toLowerCase()
		.split(/[\W_]+/).join("-")
		.split(/-+/).join("-");
}

function UrlAmigable ()
{
$("a").jFriendly(window.location.hash);
$("a").jFriendly(window.location.hash);
}

    */



/*------------------------



La solución podría ser redirigir todo lo que exista en los subdirectorios de último nivel a dichos archivos directamente, en vez de tratar de obtenerlos de sus rutas reales (las que generan el uso de las barras en las URLs amigables) o enviarlos a un PHP (si usas una regla genérica de redirección).

Estas son las reglas .htaccess que debes usar para detectar cualquier ruta "assets" que siga con un directorio llamado "css", "js", "fonts" o "img":

# Activamos mod_rewrite
RewriteEngine on

# Definimos la ruta base, por facilidad, una única vez
SetEnvIf RUTA_BASE ^(.*)$ RUTA_BASE=/project/

# Aquí nos evitamos comprobar que sea un archivo (agrego comprobación
# para detectar también directorio) en cada conjunto de reglas
RewriteCond %{REQUEST_FILENAME} -d [OR]
RewriteCond %{REQUEST_FILENAME} -f
RewriteRule ^(.*)$ $1 [QSA,L]

# Obtenemos todo lo que vaya tras "assets/"
RewriteCond %{REQUEST_URI} assets/(.+)$
# Y éstos coinciden con un archivo existente..
RewriteCond %{DOCUMENT_ROOT}%{ENV:RUTA_BASE}assets/%1 -f
# Entonces (si se cumplen todas las condiciones) redirigimos (R)
# y dejamos de evaluar el resto de reglas (L)
RewriteRule ^(.*)$ %{ENV:RUTA_BASE}assets/%1 [L,R]

# Tu/s regla/s
RewriteRule ^online-video-en-hd-gratis/?$ online.php [L,NC,QSA]
RewriteRule ^online/video/hd/free/?$ online.php [L,NC,QSA]

He hecho las siguientes pruebas para comprobar su correcto funcionamiento:

    La URL http://localhost/project/online/video/hd/free/ accede al script php llamado online.php.
    La URL http://localhost/project/online/video/hd/free/assets/css/style.css provoca el envío de una cabecera Location: http://localhost/project/assets/css/style.css que redirige al navegador al recurso existente.

Se han complicado las reglas por estar contenidas en un directorio arbitrario. Se podrían haber tecleado manualmente en el lugar que fuera necesario, para para facilitar la migración o cambio del directorio en un futuro, puedes definir fácilmente la ruta base al comienzo del .htaccess, así te evitas tener que cambiarlo en varias lugares del archivo (y, posiblemente, olvidarte de algún cambio).

Si las reglas hubieran estado en el raíz todo hubiera sido más fácil (y en eso se basaban mis reglas anteriores) porque usábamos la variable %{DOCUMENT_ROOT} sin agregar nada adicional. Podríamos haber usado %{ENV:BASE}, pero en la redirección también tendríamos que haber agregado esa misma cadena, y ahí ya no tenemos ninguna variable de entorno de apache que nos pudiera ayudar (o al menos yo no la conozco).

Espero que ahora la solución te funcione correctamente.

Se me olvidaba la segunda opción, aunque puede generar falsos positivos porque no puedo (no sé) comprobar la existencia del archivo, pero para minimizarlos hago más estricta la regla:

# Activamos mod_rewrite
RewriteEngine on

# Seleccionamos el directorio base para el RewriteRule
RewriteBase /project/

# Aquí nos evitamos comprobar que sea un archivo (agrego comprobación
# para detectar también directorio) en cada conjunto de reglas
RewriteCond %{REQUEST_FILENAME} -d [OR]
RewriteCond %{REQUEST_FILENAME} -f
RewriteRule ^(.*)$ $1 [QSA,L]

# Obtenemos todo lo que vaya tras "assets/" y subdirectorios previstos
RewriteCond %{REQUEST_URI} assets/(css|fonts|js|img)/(.+)$
# Entonces (si se cumplen todas las condiciones) redirigimos (R)
# y dejamos de evaluar el resto de reglas (L)
RewriteRule ^(.*)$ assets/%1/%2 [L,R]

# Tu/s regla/s
RewriteRule ^online-video-en-hd-gratis/?$ online.php [L,NC,QSA]
RewriteRule ^online/video/hd/free/?$ online.php [L,NC,QSA]



*/

function seo_url($url){

$url = mb_strtolower($url);

//Rememplazamos caracteres especiales latinos

$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');

$repl = array('a', 'e', 'i', 'o', 'u', 'n');

$url = str_replace ($find, $repl, $url);

// Añaadimos los guiones

$find = array(' ', '&', '\r\n', '\n', '+');
$url = str_replace ($find, '-', $url);

// Eliminamos y Reemplazamos demás caracteres especiales

$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

$repl = array('', '-', '');

$url = preg_replace ($find, $repl, $url);

return $url; 
	
}

function completar_url($url,$script){

Global $ruta;

return $ruta.$script.'/'.$url; 
	
}

function getRealIP()
{
 
   if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) != '' )
   {
      $client_ip = 
         ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
            $_SERVER['REMOTE_ADDR'] 
            : 
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
               $_ENV['REMOTE_ADDR'] 
               : 
               "unknown" );
 
      // los proxys van añadiendo al final de esta cabecera
      // las direcciones ip que van "ocultando". Para localizar la ip real
      // del usuario se comienza a mirar por el principio hasta encontrar 
      // una dirección ip que no sea del rango privado. En caso de no 
      // encontrarse ninguna se toma como valor el REMOTE_ADDR
 
      $entries = preg_split('/[, ]/', $_SERVER['HTTP_X_FORWARDED_FOR']);
 
      reset($entries);
      while (list(, $entry) = each($entries)) 
      {
         $entry = trim($entry);
         if ( preg_match("/^([0-9]+\.[0-9]+\.[0-9]+\.[0-9]+)/", $entry, $ip_list) )
         {
            // http://www.faqs.org/rfcs/rfc1918.html
            $private_ip = array(
                  '/^0\./', 
                  '/^127\.0\.0\.1/', 
                  '/^192\.168\..*/', 
                  '/^172\.((1[6-9])|(2[0-9])|(3[0-1]))\..*/', 
                  '/^10\..*/');
 
            $found_ip = preg_replace($private_ip, $client_ip, $ip_list[1]);
 
            if ($client_ip != $found_ip)
            {
               $client_ip = $found_ip;
               break;
            }
         }
      }
   }
   else
   {
      $client_ip = 
         ( !empty($_SERVER['REMOTE_ADDR']) ) ? 
            $_SERVER['REMOTE_ADDR'] 
            : 
            ( ( !empty($_ENV['REMOTE_ADDR']) ) ? 
               $_ENV['REMOTE_ADDR'] 
               : 
               "unknown" );
   }
 
   return $client_ip;
 
}

 function returnMacAddress() {
       // This code is under the GNU Public Licence
       // Written by michael_stankiewicz {don't spam} at yahoo {no spam} dot com
       // Tested only on linux, please report bugs

       // WARNING: the commands 'which' and 'arp' should be executable
      // by the apache user; on most linux boxes the default configuration
      // should work fine

       // Get the arp executable path
        $location = `which arp`;
       // Execute the arp command and store the output in $arpTable
       $arpTable = `arp -a`;
       // Split the output so every line is an entry of the $arpSplitted array
       $arpSplitted = explode("\\n",$arpTable);
       // Get the remote ip address (the ip address of the client, the browser)
       $remoteIp = getenv('REMOTE_ADDR');
       // Cicle the array to find the match with the remote ip address
       foreach ($arpSplitted as $value) {
         // Split every arp line, this is done in case the format of the arp
         // command output is a bit different than expected
          $valueSplitted = explode(" ",$value);
          foreach ($valueSplitted as $spLine) {
           if (preg_match("/$remoteIp/",$spLine)) {
                $ipFound = true;
          }
        // The ip address has been found, now rescan all the string
        // to get the mac address
        if (isset($ipFound)) {
               // Rescan all the string, in case the mac address, in the string
               // returned by arp, comes before the ip address
               // (you know, Murphy's laws)
           reset($valueSplitted);
           foreach ($valueSplitted as $spLine) {
                 if (preg_match("/[0-9a-f][0-9a-f][:-]".
                     "[0-9a-f][0-9a-f][:-]".
                     "[0-9a-f][0-9a-f][:-]".
                    "[0-9a-f][0-9a-f][:-]".
                    "[0-9a-f][0-9a-f][:-]".
                  "[0-9a-f][0-9a-f]/i",$spLine)) {
                     return $spLine;
                  }
              }
         }
        $ipFound = false;
       }
       }
      return false;
     }
//$mac=str_replace("-",":",returnMacAddress());
//echo $mac;

function plantillaimp($impresion){
Global $NombreSitio;
Global $MetaDesc;
Global $mensaje_pie;
	return '<style>
				<!--
				#encabezado {padding: 1px 0; border-bottom: 3px double color: #333;}
				#encabezado .fila td {text-align:center; width:100%;}
				#encabezado h2{font-size: 16px; padding: 0; margin:0; color: #333;}
				#encabezado h3{font-size: 12px; padding: 0; margin:0; color: #333;}
				 
				#footer {padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; border-top: 3px double color: #333; width:100%;}
				#footer .fila {font-size: 10px; padding: 0; margin:0; color: #333;}
				
				#contenido {margin-top:10px; width:765;}
				#contenido {font-size: 12px; color: #333;}
				#contenido hr {color: #333;}
				#contenido h4 {font-size: 18px;}
				#contenido table {width: 500px;}
				-->
				</style>
				<page backtop="20mm" backbottom="15mm" backleft="2mm" backright="2mm" footer="page">
				<page_header>
				<table id="encabezado" width="765">
				<tr class="fila">
				<td width="50">
				<img src="../img/logo.png" width="50">
				</td>
				<td width="605" align="left">
				<h2>'.$NombreSitio.'</h2>
				<h3>'.$MetaDesc.'</h3>
				</td>
				<td width="100">
				<img src="../img/UCV.png" width="80">
				</td>
				</tr>
				</table>
				</page_header>
			 
				<page_footer>
					<table id="footer" width="765">
						<tr class="fila">
							<td width="765" align="center">
								<b>'.$mensaje_pie.'</b>
							</td>
						</tr>
					</table>
				</page_footer>
				
				 <div id="contenido">
				
						'.$impresion.'
					
				</div>
			 
				</page>';
	
}

function plantillaimp2($impresion){
Global	$Config;
	return '<style>
				<!--
				#encabezado {padding: 1px 0; border-bottom: 3px double color: #333;}
				#encabezado .fila td {text-align:center; width:100%;}
				#encabezado h2{font-size: 16px; padding: 0; margin:0; color: #333;}
				#encabezado h3{font-size: 12px; padding: 0; margin:0; color: #333;}
				 
				#footer {padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; border-top: 3px double color: #333; width:100%;}
				#footer .fila {font-size: 10px; padding: 0; margin:0; color: #333;}
				
				#contenido {margin-top:10px; width:765px;}
				#contenido {font-size: 12px; color: #333;}
				#contenido hr {color: #333;}
				#contenido h4 {font-size: 18px;}
				-->
				</style>
				<page backtop="20mm" backbottom="15mm" backleft="2mm" backright="2mm" footer="page">
				<page_header>
				<table id="encabezado" width="765">
				<tr class="fila">
				<td width="50">
				<img src="../img/logo2.png">
				</td>
				<td width="605" align="left">
				<h2>'.$Config -> NombreSitio.'</h2>
				<h3>'.$Config -> MetaDesc.'</h3>
				</td>
				<td width="100">
				<img src="../img/UCV.png" width="80">
				</td>
				</tr>
				</table>
				</page_header>
			 
				<page_footer>
					<table id="footer" width="765">
						<tr class="fila">
							<td width="765" align="center">
								<b>'.$Config -> mensaje_pie.'</b>
							</td>
						</tr>
					</table>
				</page_footer>
				
				 <div id="contenido">
				
						'.$impresion.'
					
				</div>
			 
				</page>';
	
}

function plantillapdfcurso($impresion){
Global $NombreSitio;
Global $MetaDesc;
Global $mensaje_pie;
	return '<style>
				<!--
				#encabezado {padding: 1px 0; border-bottom: 3px double color: #333;}
				#encabezado .fila td {text-align:center; width:100%;}
				#encabezado h2{font-size: 16px; padding: 0; margin:0; color: #333;}
				#encabezado h3{font-size: 12px; padding: 0; margin:0; color: #333;}
				 
				#footer {padding: 0px 0px 0px 0px; margin: 0px 0px 0px 0px; border-top: 3px double color: #333; width:100%;}
				#footer .fila {font-size: 10px; padding: 0; margin:0; color: #333;}
				
				#contenido {margin-top:10px; width:765;}
				#contenido {font-size: 12px; color: #333;}
				#contenido hr {color: #333;}
				#contenido h4 {font-size: 18px;}
				#contenido table {width: 500px;}
				-->
				</style>
				<page backtop="20mm" backbottom="15mm" backleft="2mm" backright="2mm" footer="page">
				<page_header>
				<table id="encabezado" width="765">
				<tr class="fila">
				<td width="50">
				<img src="img/logo.png" width="50">
				</td>
				<td width="605" align="left">
				<h2>'.$NombreSitio.'</h2>
				<h3>'.$MetaDesc.'</h3>
				</td>
				<td width="100">
				<img src="img/UCV.png" width="80">
				</td>
				</tr>
				</table>
				</page_header>
			 
				<page_footer>
					<table id="footer" width="765">
						<tr class="fila">
							<td width="765" align="center">
								<b>'.$mensaje_pie.'</b>
							</td>
						</tr>
					</table>
				</page_footer>
				
				 <div id="contenido">
				
						'.$impresion.'
					
				</div>
			 
				</page>';
	
}

function correosms($email,$nomb,$titulo,$body){
	
$mail = new PHPMailer();

$mail->IsSMTP();

// la dirección del servidor, p. ej.: smtp.servidor.com
$mail->Host = "smtp.gmail.com";

// dirección remitente, p. ej.: no-responder@miempresa.com
$mail->From = "noresponder@ctic.ucv.ve";

// nombre remitente, p. ej.: "Servicio de envío automático"
$mail->FromName = "Soporte CTIC";

// asunto y cuerpo alternativo del mensaje
$mail->Subject = $titulo;
//$mail->AltBody = $body; 

$mail->IsHTML(false);
$mail->Body = $body;

// si el cuerpo del mensaje es HTML
//$mail->MsgHTML($body);

// podemos hacer varios AddAdress
$mail->AddAddress($email, $nomb);

// si el SMTP necesita autenticación
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";                 // Establece el tipo de seguridad SMTP  
$mail->Port       = 465;                   // Establece el puerto del servidor SMTP de Gmail

// credenciales usuario
$mail->Username = "soporte.ctic.ucv@gmail.com";
$mail->Password = "soportectic0104"; 

if(!$mail->Send()) {
return "<br>Sin embargo, ocurrio un error al enviar la información a su correo.<br> ";// $mail->ErrorInfo.'<br>';
} else {
return "<br>Adicionalmente, la información ha sido enviada a <b>".strtolower($email).'</b>, para su registro.<br>';
}

}

function sms($telf,$message){
Global	$Config;

$url='http://192.168.0.101:9090/sendsms';
$message = 'Estimado usuario, '.$message.'. Saludos Cordiales, '.$Config -> NombreSitio;	
$texto = str_replace(" ","%20",$message);
//@ $response = file_get_contents($url . '?phone=' . $telf  . '&text=' . $texto);
//echo strlen($message);

$smscorreo=correosms("soporte.ctic.ucv@gmail.com","usuario",$telf,$message);

}


?>
