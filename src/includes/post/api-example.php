<?php 

/**************
  $href    =  URL a la que pedir
  $header  =  Devolver header
  $body    =  Devolver body
  $timeout =  TIMEOUT del curl (por defecto, global a la instalación)
  $add_agent = Añadir agente "Mozilla/5.0 (compatible...." (por defecto "true")

***************/

// curl -i -X POST --header 'X-app-version: IOS_1' https://api-example/v1

$href = "https://api-example/v1";
$ch = curl_init();
curl_setopt($ch, CURLOPT_HEADER, $header);
curl_setopt($ch, CURLOPT_NOBODY, (!$body));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_ENCODING, '');
curl_setopt($ch, CURLOPT_URL, $href);

// POST
curl_setopt($ch, CURLOPT_POST, 1);
// HEADER
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'X-app-version: IOS_1'
    ));

if($add_agent) {
    curl_setopt ($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; phpservermon/'.PSM_VERSION.'; +http://www.phpservermonitor.org)');
}
$result = curl_exec($ch);
