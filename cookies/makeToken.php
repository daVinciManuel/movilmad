<?php
// se va a crear un token para el usuario.
// el token va a ser:
// [salt][][nombre][][password*(length(nombre)+1)][][salt]
function makeToken($email,$pass){
  $name = substr($email,0,strpos($email,'.'));
  $superNumber = strlen($name);
  $saltExtended = 'VestibulumfaucibusenimattinciduntlaoreetProintincidunthendrerittristiqueDonecutturpisMorbinibhantesodalesetscelerisqueintinciduntatduiPellentesquehabitantmorbitristiquesenectusetnetusetmalesuadafamesacturpisegestasDonecultricesblanditpurusintristiqueAliquameratvolutpatInminibhdapibusvellacusegetblanditplaceratliberoPellentesquesodalespulvinarposuereNullamefficiturmivitaeultricespharetrarisusligulaportaurnatcongueipsumipsuminenimCrasacduiexSedeuleoerosSedpretiumtinciduntorcivitaeefficiturVestibulumfaucibusenimattinciduntlaoreetProintincidunthendrerittristiqueDonecutturpisMorbinibhantesodalesetscelerisqueintinciduntatduiPellentesquehabitantmorbitristiquesenectusetnetusetmalesuadafamesacturpisegestasDonecultricesblanditpurusintristiqueAliquameratvolutpatInminibhdapibusvellacusegetblanditplaceratliberoPellentesquesodalespulvinarposuereNullamefficiturmivitaeultricespharetrarisusligulaportaurnatcongueipsumipsuminenimCrasacduiexSedeuleoerosSedpretiumtinciduntorcivitaeefficiturVestibulumfaucibusenimattinciduntlaoreetProintincidunthendrerittristiqueDonecutturpisMorbinibhantesodalesetscelerisqueintinciduntatduiPellentesquehabitantmorbitristiquesenectusetnetusetmalesuadafamesacturpisegestasDonecultricesblanditpurusintristiqueAliquameratvolutpatInminibhdapibusvellacusegetblanditplaceratliberoPellentesquesodalespulvinarposuereNullamefficiturmivitaeultricespharetrarisusligulaportaurnatcongueipsumipsuminenimCrasacduiexSedeuleoerosSedpretiumtinciduntorcivitaeefficiturVestibulumfaucibusenimattinciduntlaoreetProintincidunthendrerittristiqueDonecutturpisMorbinibhantesodalesetscelerisqueintinciduntatduiPellentesquehabitantmorbitristiquesenectusetnetusetmalesuadafamesacturpisegestasDonecultricesblanditpurusintristiqueAliquameratvolutpatInminibhdapibusvellacusegetblanditplaceratliberoPellentesquesodalespulvinarposuereNullamefficiturmivitaeultricespharetrarisusligulaportaurnatcongueipsumipsuminenimCrasacduiexSedeuleoerosSedpretiumtinciduntorcivitaeefficitur';
  $salt = substr($saltExtended,$superNumber,$superNumber * 11);
  $separador = substr($email,2,$superNumber);
  $key = $pass * $superNumber + 1;
  $token = $salt . $separador . $name . $separador . $key . $separador . $salt;
  setCookie('acctk',$token,time()+3600,'/');
}
