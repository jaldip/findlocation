<?php
/**
 * StepIn Solutions venture, an MVC framework
 * configuration  file
 *
 * @package stepOne 
 */

     /* Constants */
     
//     define("SITE_URL","http://".$_SERVER["HTTP_HOST"]);
//     define("ROOT_DIR","C:/wamp/www/Addmordel");
//     define("LANGUAGE","en");
//     define("HOME_MODULE","home");
//     define("HOME_ACTION","index");

                    $aConfig['common'] = array(
						'siteUrl' => "http://".$_SERVER["HTTP_HOST"],
						'rootDir' => '/home/stepin/projects/findlocation',
						'language'=>'en',
                                                'loginModule'=>'users',
                                                'loginAction'=>'login',
                                                'dbHost'=>'localhost',
                                                'dbUser'=>'root',
                                                'dbPassword'=>'stepin',
                                                'dbName'=>'find_my_location',
                                                'nPagerLength'=>'',
                                                'nPerPageRecords'=>'',
                                                'sSessionName'=>'userSession',
                                                'routerClassName' => 'routers',
                                                'DEVELOPERSTRING' => '!@#123!@#',
                                              );

     /* Database Credentials */
//     $sDbHost = "";
//     $sDbUser = "";
//     $sDbPassword = "";
//     $sDbName = "";
//     $nPagerLength = "";
//     $nPerPageRecords = "";
     
