<?php

require_once('../v3-php-sdk-2.4.1/config.php');

require_once(PATH_SDK_ROOT . 'Core/ServiceContext.php');
require_once(PATH_SDK_ROOT . 'DataService/DataService.php');
require_once(PATH_SDK_ROOT . 'PlatformService/PlatformService.php');
require_once(PATH_SDK_ROOT . 'Utility/Configuration/ConfigurationManager.php');
require_once('helper/TermHelper.php'); 

//Specify QBO or QBD
$serviceType = IntuitServicesType::QBO;

// Get App Config
$realmId = ConfigurationManager::AppSettings('RealmID');
if (!$realmId)
	exit("Please add realm to App.Config before running this sample.\n");

// Prep Service Context
$requestValidator = new OAuthRequestValidator(ConfigurationManager::AppSettings('AccessToken'),
                                              ConfigurationManager::AppSettings('AccessTokenSecret'),
                                              ConfigurationManager::AppSettings('ConsumerKey'),
                                              ConfigurationManager::AppSettings('ConsumerSecret'));
$serviceContext = new ServiceContext($realmId, $serviceType, $requestValidator);
if (!$serviceContext)
	exit("Problem while initializing ServiceContext.\n");

// Prep Data Services
$dataService = new DataService($serviceContext);
if (!$dataService)
	exit("Problem while initializing DataService.\n");

// Add a term
$addTerm = $dataService->Add(TermHelper::getTermFields());
echo "Term created :::  DueDays ::: {$addTerm->DueDays} \n";

//sparse update term
$addTerm->DueDays = 40;
$addTerm->sparse = 'true';
$savedTerm = $dataService->Update($addTerm);
echo "Term sparse updated :::  DueDays ::: {$savedTerm->DueDays} \n";


// update term with all fields
$updatedTerm = TermHelper::getTermFields();
$updatedTerm->Id = $savedTerm->Id;
$updatedTerm->SyncToken = $savedTerm->SyncToken;
$savedTerm = $dataService->Update($updatedTerm);
echo "Term updated with all fields :::  DueDays ::: {$savedTerm->DueDays} \n";

?>
