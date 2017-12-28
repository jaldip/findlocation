<?php
/**
 * StepIn Solutions venture, an MVC framework
 * procedural helper file
 *
 * @package stepOne 
 */
  function  __autoload($sClassName) 
  {
  	require(getconfig('rootDir')."/lib/".$sClassName.".class.php");
  }
  function  __( $sString,$aDynamicValues=array()) 
  {
        global $aLanguage;
  	return isset($aLanguage[getconfig('language')][$sString]) 
			? vsprintf($aLanguage[getconfig('language')][$sString],$aDynamicValues) 
				: $sString;
  }
  //Pagging Component
  function add_component($sComponentName,$aPaging=array())
  {
      global $sAppName;

      $sAction = '';
      file_exists(getconfig('rootDir')."/controllers/components/".$sComponentName."Component/Controller.php");
      //if controller exists get the file otherwise return __(missing component)
      {
          require(getconfig('rootDir')."/controllers/components/".$sComponentName."Component/Controller.php");
      //create object of controller
          $oComponentController = eval("return new ".$sComponentName."ComponentController();");
          //var_dump($oComponentController);exit;
          if(method_exists($oComponentController,'callComponentController'.$sAction))
                  
            {
                if($oComponentController->aLayout[$sAction])
		{
			require(getconfig('rootDir')."/web/_header.php");		
		}	

              
            }
            //call component
            eval('$oComponentController->callComponent'.$sAction.'($aPaging);');
        }
  }
  function getConfig($sConfigurationOption)
  {
	global $aConfig,$sAppName;
        if(isset($aConfig[$sAppName]) && isset($aConfig[$sAppName][$sConfigurationOption]))
                return $aConfig[$sAppName][$sConfigurationOption];
	elseif($aConfig['common'][$sConfigurationOption])
		return $aConfig['common'][$sConfigurationOption]; 
	else
		return false;
  }
  function redirect($url)
{
    ob_clean();
    header('Location: '.$url);
}
 /**
 * getParamsFromUrl use into routers class
 * @param type $sRequestURL
 * @return type
 */
function getParamsFromUrl($sRequestURL) 
{
    $aAllParams = explode('?', $sRequestURL);
    $sRequestURL = $aAllParams[0] . '/' . DEVELOPERSTRING;

    //replace // to / into stringUrl
    $sRequestURL = str_replace("//", "/", $sRequestURL);

    //Add slash because if url is abc.com or abc.com/jaimin then its create issues    
    $aParams = explode('/', $sRequestURL);

    //Array pop
    array_pop($aParams);
    //Array reverse
    $aRequestParams = array_reverse($aParams);
    //Array pop
    array_pop($aRequestParams);
    //Array reverse
    $aUrlParams = array_reverse($aRequestParams);

    isset($aAllParams[1]) ? $aUrlParams[] = $aAllParams[1] : '';

    return $aUrlParams;
}