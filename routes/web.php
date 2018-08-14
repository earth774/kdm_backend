<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Support\Facades\Auth;

// For debugging sql statement
/*
Event::listen('Illuminate\Database\Events\QueryExecuted', function ($query) {
    var_dump($query->sql);
    var_dump($query->bindings);
    var_dump($query->time);
});*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});



$router->group(['prefix' => 'api/v1'], function($router){
    $router->put('user/authen', 'UserController@authenticate');
    //$router->put('user/gen', 'UserController@genUserTrial');
    $router->post('register', 'UserController@addData');
    $router->get('register/user_type', 'UserTypeController@index');
    
    // Need to handle security
    $router->post('news_info_resource/dropzone', 'NewsInfoResourceController@dropzone_post');
    $router->get('forgot_password','ForgotPasswordController@checkEmail');

    // Social authen
    $router->post('user/authen/facebook', 'UserController@facebookAuthen');
    $router->post('user/authen/google', 'UserController@googleAuthen');
});

$router->group(['prefix' => 'api/v1/user_management', 'middleware' => 'jwt.auth'], function($router){
    $router->get('user/user_management/{id}', 'UserController@getDataByUserManagementId');
});

$router->group(['prefix' => 'api/v1', 'middleware' => 'auth'], function($router){
    //news_info_resource
    $router->get('news_info_resource', 'NewsInfoResourceController@index');
    $router->get('news_info_resource/{id}', 'NewsInfoResourceController@getData');
    $router->delete('news_info_resource/dropzone', 'NewsInfoResourceController@dropzone_delete');
        
    // user
    $router->get('user', 'UserController@index');
    $router->get('user/{id}', 'UserController@getData');
    $router->post('user', 'UserController@addData');
    $router->put('user/{id}', 'UserController@updateData');
    $router->delete('user/{id}', 'UserController@deleteData');

    // user type
    $router->get('user_type', 'UserTypeController@index');

    // user role
    $router->get('user_role', 'UserRoleController@index');

    // user_user_type
    $router->get('user_user_type/user_id/{user_id}', 'UserUserTypeController@indexByUserId');
    $router->post('user_user_type', 'UserUserTypeController@setUserType');

    // master data
    // region
    $router->get('region', 'RegionController@index');

    // province
    $router->get('province', 'ProvinceController@index');
    $router->post('province', 'ProvinceController@addData');

    // district
    $router->get('district', 'DistrictController@index');
    $router->get('district/{province_id}', 'DistrictController@getDestrictList');
    $router->post('district', 'DistrictController@addData');

    // sub district
    $router->get('sub_district', 'SubDistrictController@index');
    $router->get('sub_district/{district_id}', 'SubDistrictController@getSubDestrictList');
    $router->post('sub_district', 'SubDistrictController@addData');

    // Resource info
    $router->post('resource_info', 'ResourceInfoController@addData');
    $router->put('resource_info/{id}', 'ResourceInfoController@updateData');
    $router->get('resource_info', 'ResourceInfoController@index');
    $router->get('resource_info/{id}', 'ResourceInfoController@getData');
    $router->delete('resource_info/{id}', 'ResourceInfoController@deleteData');

    // Breed info
    $router->get('breed_info/resource/{resource_info_id}','BreedInfoController@getBreedList');

    // Product info
    $router->post('product_info', 'ProductInfoController@addData');
    $router->put('product_info/{id}', 'ProductInfoController@updateData');
    $router->get('product_info', 'ProductInfoController@index');
    $router->get('product_info/{id}', 'ProductInfoController@getData');
    $router->get('product_info/resource/{id}', 'ProductInfoController@getDataByResourceId');
    $router->delete('product_info/{id}', 'ProductInfoController@deleteData');

    // cerificate type
    $router->post('cerificate_type', 'CerificateTypeController@addData');
    $router->put('cerificate_type/{id}', 'CerificateTypeController@updateData');
    $router->get('cerificate_type', 'CerificateTypeController@index');
    $router->get('cerificate_type/{id}', 'CerificateTypeController@getData');
    $router->delete('cerificate_type/{id}', 'CerificateTypeController@deleteData');

    // Thai Customs info
    $router->get('thai_customs_info','ThaiCustomsInfoController@index');
    $router->get('thai_customs_info/{id}','ThaiCustomsInfoController@getData');
    $router->get('thai_customs_info/user_id/{id}','ThaiCustomsInfoController@getDataByUser');
    $router->post('thai_customs_info', 'ThaiCustomsInfoController@addData');
    $router->put('thai_customs_info/{user_id}', 'ThaiCustomsInfoController@updateData');
    $router->delete('thai_customs_info/{id}', 'ThaiCustomsInfoController@deleteData');

    // Importer info
    $router->get('importer_info','ImporterInfoController@index');
    $router->get('importer_info/{id}','ImporterInfoController@getData');
    $router->get('importer_info/user_id/{id}','ImporterInfoController@getDataByUser');
    $router->post('importer_info', 'ImporterInfoController@addData');
    $router->put('importer_info/{user_id}', 'ImporterInfoController@updateData');
    $router->delete('importer_info/{id}', 'ImporterInfoController@deleteData');

    // Exporter info
    $router->get('exporter_info','ExporterInfoController@index');
    $router->get('exporter_info/{id}','ExporterInfoController@getData');
    $router->get('exporter_info/user_id/{id}','ExporterInfoController@getDataByUser');
    $router->post('exporter_info', 'ExporterInfoController@addData');
    $router->put('exporter_info/{user_id}', 'ExporterInfoController@updateData');
    $router->delete('exporter_info/{id}', 'ExporterInfoController@deleteData');

    // Import Item Info
    $router->get('import_item_info','ImportItemInfoController@index');
    $router->get('import_item_info/{id}','ImportItemInfoController@getData');
    $router->get('import_item_info/user_id/{id}','ImportItemInfoController@getDataByUser');
    $router->post('import_item_info', 'ImportItemInfoController@addData');
    $router->put('import_item_info/{user_id}', 'ImportItemInfoController@updateData');
    $router->delete('import_item_info/{id}', 'ImportItemInfoController@deleteData');

    // Exporter Item Info
    $router->get('exporter_item_info','ExporterItemInfoController@index');
    $router->get('exporter_item_info/{id}','ExporterItemInfoController@getData');
    $router->get('exporter_item_info/user_id/{id}','ExporterItemInfoController@getDataByUser');
    $router->post('exporter_item_info', 'ExporterItemInfoController@addData');
    $router->put('exporter_item_info/{user_id}', 'ExporterItemInfoController@updateData');
    $router->delete('exporter_item_info/{id}', 'ExporterItemInfoController@deleteData');

    // Thai Customs Import Into
    $router->get('thai_customs_import_info','ThaiCustomsImportInfoController@index');
    $router->get('thai_customs_import_info/{id}','ThaiCustomsImportInfoController@getData');
    $router->get('thai_customs_import_info/user_id/{id}','ThaiCustomsImportInfoController@getDataByUser');
    $router->post('thai_customs_import_info', 'ThaiCustomsImportInfoController@addData');
    $router->put('thai_customs_import_info/{user_id}', 'ThaiCustomsImportInfoController@updateData');
    $router->delete('thai_customs_import_info/{id}', 'ThaiCustomsImportInfoController@deleteData');

    // Thai Customs Export Into
    $router->get('thai_customs_export_info','ThaiCustomsExportInfoController@index');
    $router->get('thai_customs_export_info/{id}','ThaiCustomsExportInfoController@getData');
    $router->get('thai_customs_export_info/user_id/{id}','ThaiCustomsExportInfoController@getDataByUser');
    $router->post('thai_customs_export_info', 'ThaiCustomsExportInfoController@addData');
    $router->put('thai_customs_export_info/{user_id}', 'ThaiCustomsExportInfoController@updateData');
    $router->delete('thai_customs_export_info/{id}', 'ThaiCustomsExportInfoController@deleteData');

    // Farmer User Production Info
    $router->get('farmer_user_production_info','FarmerUserProductionInfoController@index');
    $router->get('farmer_user_production_info/{id}','FarmerUserProductionInfoController@getData');
    $router->get('farmer_user_production_info/user_id/{id}','FarmerUserProductionInfoController@getDataByUser');
    $router->post('farmer_user_production_info', 'FarmerUserProductionInfoController@addData');
    $router->put('farmer_user_production_info/{id}', 'FarmerUserProductionInfoController@updateData');
    $router->delete('farmer_user_production_info/{id}', 'FarmerUserProductionInfoController@deleteData');

    // Farmer large Info
    $router->get('farmer_large_info','FarmerLargeInfoController@index');
    $router->get('farmer_large_info/{id}','FarmerLargeInfoController@getData');
    $router->get('farmer_large_info/user_id/{id}','FarmerLargeInfoController@getDataByUser');
    $router->post('farmer_large_info', 'FarmerLargeInfoController@addData');
    $router->put('farmer_large_info/{user_id}', 'FarmerLargeInfoController@updateData');
    $router->delete('farmer_large_info/{id}', 'FarmerLargeInfoController@deleteData');

    // Farmer Sme Info
    $router->get('farmer_sme_info','FarmerSmeInfoController@index');
    $router->get('farmer_sme_info/{id}','FarmerSmeInfoController@getData');
    $router->get('farmer_sme_info/user_id/{id}','FarmerSmeInfoController@getDataByUser');
    $router->post('farmer_sme_info', 'FarmerSmeInfoController@addData');
    $router->put('farmer_sme_info/{user_id}', 'FarmerSmeInfoController@updateData');
    $router->delete('farmer_sme_info/{id}', 'FarmerSmeInfoController@deleteData');

    // Farmer Cooperative Info
    $router->get('farmer_cooperative_info','FarmerCooperativeInfoController@index');
    $router->get('farmer_cooperative_info/{id}','FarmerCooperativeInfoController@getData');
    $router->get('farmer_cooperative_info/user_id/{id}','FarmerCooperativeInfoController@getDataByUser');
    $router->post('farmer_cooperative_info', 'FarmerCooperativeInfoController@addData');
    $router->put('farmer_cooperative_info/{user_id}', 'FarmerCooperativeInfoController@updateData');
    $router->delete('farmer_cooperative_info/{id}', 'FarmerCooperativeInfoController@deleteData');

    // Farmer User Committee Info
    $router->get('farmer_user_committee_info','FarmerUserCommitteeInfoController@index');
    $router->get('farmer_user_committee_info/{id}','FarmerUserCommitteeInfoController@getData');
    $router->get('farmer_user_committee_info/user_id/{id}','FarmerUserCommitteeInfoController@getDataByUser');
    $router->post('farmer_user_committee_info', 'FarmerUserCommitteeInfoController@addData');
    $router->put('farmer_user_committee_info/{user_id}', 'FarmerUserCommitteeInfoController@updateData');
    $router->delete('farmer_user_committee_info/{id}', 'FarmerUserCommitteeInfoController@deleteData');

    // Farmer User Inspection
    $router->get('farmer_user_inspection','FarmerUserInspectionController@index');
    $router->get('farmer_user_inspection/{id}','FarmerUserInspectionController@getData');
    $router->get('farmer_user_inspection/user_id/{id}','FarmerUserInspectionController@getDataByUser');
    $router->post('farmer_user_inspection', 'FarmerUserInspectionController@addData');
    $router->put('farmer_user_inspection/{user_id}', 'FarmerUserInspectionController@updateData');
    $router->delete('farmer_user_inspection/{id}', 'FarmerUserInspectionController@deleteData');

    // Farmer User Gap Standard Info
    $router->get('farmer_user_gap_standard_info','FarmerUserGapStandardInfoController@index');
    $router->get('farmer_user_gap_standard_info/{id}','FarmerUserGapStandardInfoController@getData');
    $router->get('farmer_user_gap_standard_info/user_id/{id}','FarmerUserGapStandardInfoController@getDataByUser');
    $router->post('farmer_user_gap_standard_info', 'FarmerUserGapStandardInfoController@addData');
    $router->put('farmer_user_gap_standard_info/{user_id}', 'FarmerUserGapStandardInfoController@updateData');
    $router->delete('farmer_user_gap_standard_info/{id}', 'FarmerUserGapStandardInfoController@deleteData');

    // Farmer User Cultivated Area Info
    $router->get('farmer_user_cultivated_area_info','FarmerUserCultivatedAreaInfoController@index');
    $router->get('farmer_user_cultivated_area_info/{id}','FarmerUserCultivatedAreaInfoController@getData');
    $router->get('farmer_user_cultivated_area_info/user_id/{id}','FarmerUserCultivatedAreaInfoController@getDataByUser');
    $router->post('farmer_user_cultivated_area_info', 'FarmerUserCultivatedAreaInfoController@addData');
    $router->put('farmer_user_cultivated_area_info/{id}', 'FarmerUserCultivatedAreaInfoController@updateData');
    $router->delete('farmer_user_cultivated_area_info/{id}', 'FarmerUserCultivatedAreaInfoController@deleteData');

    // Farmer User Agriculture Info
    $router->get('farmer_user_agriculture_info','FarmerUserAgricultureInfoController@index');
    $router->get('farmer_user_agriculture_info/{id}','FarmerUserAgricultureInfoController@getData');
    $router->get('farmer_user_agriculture_info/user_id/{id}','FarmerUserAgricultureInfoController@getDataByUser');
    $router->post('farmer_user_agriculture_info', 'FarmerUserAgricultureInfoController@addData');
    $router->put('farmer_user_agriculture_info/{user_id}', 'FarmerUserAgricultureInfoController@updateData');
    $router->delete('farmer_user_agriculture_info/{id}', 'FarmerUserAgricultureInfoController@deleteData');

    // Farmer User Organic Standard Info
    $router->get('farmer_user_organic_standard_info','FarmerUserOrganicStandardInfoController@index');
    $router->get('farmer_user_organic_standard_info/{id}','FarmerUserOrganicStandardInfoController@getData');
    $router->get('farmer_user_organic_standard_info/user_id/{id}','FarmerUserOrganicStandardInfoController@getDataByUser');
    $router->post('farmer_user_organic_standard_info', 'FarmerUserOrganicStandardInfoController@addData');
    $router->put('farmer_user_organic_standard_info/{user_id}', 'FarmerUserOrganicStandardInfoController@updateData');
    $router->delete('farmer_user_organic_standard_info/{id}', 'FarmerUserOrganicStandardInfoController@deleteData');

    // Farmer User International Standard Info
    $router->get('farmer_user_international_standard_info','FarmerUserInternationalStandardInfoController@index');
    $router->get('farmer_user_international_standard_info/{id}','FarmerUserInternationalStandardInfoController@getData');
    $router->get('farmer_user_international_standard_info/user_id/{id}','FarmerUserInternationalStandardInfoController@getDataByUser');
    $router->post('farmer_user_international_standard_info', 'FarmerUserInternationalStandardInfoController@addData');
    $router->put('farmer_user_international_standard_info/{user_id}', 'FarmerUserInternationalStandardInfoController@updateData');
    $router->delete('farmer_user_international_standard_info/{id}', 'FarmerUserInternationalStandardInfoController@deleteData');

    // Wholesaler
    $router->get('wholesaler_info','WholeSalerInfoController@index');
    $router->get('wholesaler_info/{id}','WholeSalerInfoController@getData');
    $router->get('wholesaler_info/user_id/{id}','WholeSalerInfoController@getDataByUser');
    $router->post('wholesaler_info', 'WholeSalerInfoController@addData');
    $router->put('wholesaler_info/{user_id}', 'WholeSalerInfoController@updateData');
    $router->delete('wholesaler_info/{id}', 'WholeSalerInfoController@deleteData');

    // Buying item info
    $router->get('buying_item_info','BuyingItemInfoController@index');
    $router->get('buying_item_info/{id}','BuyingItemInfoController@getData');
    $router->get('buying_item_info/user_id/{id}','BuyingItemInfoController@getDataByUser');
    $router->post('buying_item_info', 'BuyingItemInfoController@addData');
    $router->put('buying_item_info/{user_id}', 'BuyingItemInfoController@updateData');
    $router->delete('buying_item_info/{id}', 'BuyingItemInfoController@deleteData');

    // Selling item info
    $router->get('selling_item_info','SellingItemInfoController@index');
    $router->get('selling_item_info/{id}','SellingItemInfoController@getData');
    $router->get('selling_item_info/user_id/{id}','SellingItemInfoController@getDataByUser');
    $router->post('selling_item_info', 'SellingItemInfoController@addData');
    $router->put('selling_item_info/{user_id}', 'SellingItemInfoController@updateData');
    $router->delete('selling_item_info/{id}', 'SellingItemInfoController@deleteData');

    // Country
    $router->get('country','CountryController@index');

    // Online Retailer
    $router->get('online_retailer_info','OnlineRetailerInfoController@index');
    $router->get('online_retailer_info/{id}','OnlineRetailerInfoController@getData');
    $router->get('online_retailer_info/user_id/{id}','OnlineRetailerInfoController@getDataByUser');
    $router->post('online_retailer_info', 'OnlineRetailerInfoController@addData');
    $router->put('online_retailer_info/{user_id}', 'OnlineRetailerInfoController@updateData');
    $router->delete('online_retailer_info/{id}', 'OnlineRetailerInfoController@deleteData');

    // Modern trader
    $router->get('modern_trader_info','ModernTraderInfoController@index');
    $router->get('modern_trader_info/{id}','ModernTraderInfoController@getData');
    $router->get('modern_trader_info/user_id/{id}','ModernTraderInfoController@getDataByUser');
    $router->post('modern_trader_info', 'ModernTraderInfoController@addData');
    $router->put('modern_trader_info/{user_id}', 'ModernTraderInfoController@updateData');
    $router->delete('modern_trader_info/{id}', 'ModernTraderInfoController@deleteData');

    // Consumer
    $router->get('consumer_info','ConsumerInfoController@index');
    $router->get('consumer_info/{id}','ConsumerInfoController@getData');
    $router->get('consumer_info/user_id/{id}','ConsumerInfoController@getDataByUser');
    $router->post('consumer_info', 'ConsumerInfoController@addData');
    $router->put('consumer_info/{user_id}', 'ConsumerInfoController@updateData');
    $router->delete('consumer_info/{id}', 'ConsumerInfoController@deleteData');

    // Manufacturer Info
    $router->get('manufacturer_info','ManufacturerInfoController@index');
    $router->get('manufacturer_info/{id}','ManufacturerInfoController@getData');
    $router->get('manufacturer_info/user_id/{id}','ManufacturerInfoController@getDataByUser');
    $router->post('manufacturer_info', 'ManufacturerInfoController@addData');
    $router->put('manufacturer_info/{user_id}', 'ManufacturerInfoController@updateData');
    $router->delete('manufacturer_info/{id}', 'ManufacturerInfoController@deleteData');

    // Manufacturer Factory Info
    $router->get('manufacturer_factory_info','ManufacturerFactoryInfoController@index');
    $router->get('manufacturer_factory_info/{id}','ManufacturerFactoryInfoController@getData');
    $router->get('manufacturer_factory_info/user_id/{id}','ManufacturerFactoryInfoController@getDataByUser');
    $router->post('manufacturer_factory_info', 'ManufacturerFactoryInfoController@addData');
    $router->put('manufacturer_factory_info/{user_id}', 'ManufacturerFactoryInfoController@updateData');
    $router->delete('manufacturer_factory_info/{id}', 'ManufacturerFactoryInfoController@deleteData');

    // Manufacturer Product Info
    $router->get('manufacturer_product_info','ManufacturerProductInfoController@index');
    $router->get('manufacturer_product_info/{id}','ManufacturerProductInfoController@getData');
    $router->get('manufacturer_product_info/user_id/{id}','ManufacturerProductInfoController@getDataByUser');
    $router->post('manufacturer_product_info', 'ManufacturerProductInfoController@addData');
    $router->put('manufacturer_product_info/{user_id}', 'ManufacturerProductInfoController@updateData');
    $router->delete('manufacturer_product_info/{id}', 'ManufacturerProductInfoController@deleteData');

    // Inspection Body Info
    $router->get('inspection_body_info','InspectionBodyInfoController@index');
    $router->get('inspection_body_info/{id}','InspectionBodyInfoController@getData');
    $router->get('inspection_body_info/user_id/{id}','InspectionBodyInfoController@getDataByUser');
    $router->post('inspection_body_info', 'InspectionBodyInfoController@addData');
    $router->put('inspection_body_info/{user_id}', 'InspectionBodyInfoController@updateData');
    $router->delete('inspection_body_info/{id}', 'InspectionBodyInfoController@deleteData');

    // Inspection Cultivated Info
    $router->get('inspection_cultivated_info','InspectionCultivatedInfoController@index');
    $router->get('inspection_cultivated_info/{id}','InspectionCultivatedInfoController@getData');
    $router->get('inspection_cultivated_info/user_id/{id}','InspectionCultivatedInfoController@getDataByUser');
    $router->post('inspection_cultivated_info', 'InspectionCultivatedInfoController@addData');
    $router->put('inspection_cultivated_info/{user_id}', 'InspectionCultivatedInfoController@updateData');
    $router->delete('inspection_cultivated_info/{id}', 'InspectionCultivatedInfoController@deleteData');

    // Inspection Standard Info
    $router->get('inspection_standard_info','InspectionStandardInfoController@index');
    $router->get('inspection_standard_info/{id}','InspectionStandardInfoController@getData');
    $router->get('inspection_standard_info/user_id/{id}','InspectionStandardInfoController@getDataByUser');
    $router->post('inspection_standard_info', 'InspectionStandardInfoController@addData');
    $router->put('inspection_standard_info/{user_id}', 'InspectionStandardInfoController@updateData');
    $router->delete('inspection_standard_info/{id}', 'InspectionStandardInfoController@deleteData');

    // Lender Info
    $router->get('lender_info','LenderInfoController@index');
    $router->get('lender_info/{id}','LenderInfoController@getData');
    $router->get('lender_info/user_id/{id}','LenderInfoController@getDataByUser');
    $router->post('lender_info', 'LenderInfoController@addData');
    $router->put('lender_info/{user_id}', 'LenderInfoController@updateData');
    $router->delete('lender_info/{id}', 'LenderInfoController@deleteData');

    // Lender Lender Program Info
    $router->get('lender_lender_program_info','LenderLenderProgramInfoController@index');
    $router->get('lender_lender_program_info/{id}','LenderLenderProgramInfoController@getData');
    $router->get('lender_lender_program_info/user_id/{id}','LenderLenderProgramInfoController@getDataByUser');
    $router->post('lender_lender_program_info', 'LenderLenderProgramInfoController@addData');
    $router->put('lender_lender_program_info/{user_id}', 'LenderLenderProgramInfoController@updateData');
    $router->delete('lender_lender_program_info/{id}', 'LenderLenderProgramInfoController@deleteData');

    // Investor Info
    $router->get('investor_info','InvestorInfoController@index');
    $router->get('investor_info/{id}','InvestorInfoController@getData');
    $router->get('investor_info/user_id/{id}','InvestorInfoController@getDataByUser');
    $router->post('investor_info', 'InvestorInfoController@addData');
    $router->put('investor_info/{user_id}', 'InvestorInfoController@updateData');
    $router->delete('investor_info/{id}', 'InvestorInfoController@deleteData');

    // Investor Interest Info
    $router->get('investor_interest_info','InvestorInterestInfoController@index');
    $router->get('investor_interest_info/{id}','InvestorInterestInfoController@getData');
    $router->get('investor_interest_info/user_id/{id}','InvestorInterestInfoController@getDataByUser');
    $router->post('investor_interest_info', 'InvestorInterestInfoController@addData');
    $router->put('investor_interest_info/{user_id}', 'InvestorInterestInfoController@updateData');
    $router->delete('investor_interest_info/{id}', 'InvestorInterestInfoController@deleteData');
    
    //InvestorExtra
    $router->get('investor_interest_type','InvestorInterestTypeController@index');
    $router->get('investor_income_type','InvestorIncomeTypeController@index');
    $router->get('investor_invest_type','InvestorInvestTypeController@index');
    $router->put('investor_interest_info_extra/{user_id}', 'InvestorInterestInfoExtraController@updateData');
    $router->get('investor_interest_info_extra/{id}', 'InvestorInterestInfoExtraController@getData');
    
    

    // Market Retailer Info
    $router->get('market_retailer_info','MarketRetailerInfoController@index');
    $router->get('market_retailer_info/{id}','MarketRetailerInfoController@getData');
    $router->get('market_retailer_info/user_id/{id}','MarketRetailerInfoController@getDataByUser');
    $router->post('market_retailer_info', 'MarketRetailerInfoController@addData');
    $router->put('market_retailer_info/{user_id}', 'MarketRetailerInfoController@updateData');
    $router->delete('market_retailer_info/{id}', 'MarketRetailerInfoController@deleteData');

    // gap_standard_title_info
    $router->get('gap_standard_title_info','GapStandardTitleInfoController@index');

    // gap_standard_item_info
    $router->get('gap_standard_item_info','GapStandardItemInfoController@index');
    $router->get('gap_standard_item_info/title/{title_id}','GapStandardItemInfoController@getItemByTitle');

    // ifoam_standard_title_info
    $router->get('ifoam_standard_title_info','IfoamStandardTitleInfoController@index');

    // ifoam_standard_lv2_title_info
    $router->get('ifoam_standard_lv2_title_info','IfoamStandardLv2TitleInfoController@index');
    $router->get('ifoam_standard_lv2_title_info/title/{title_id}','IfoamStandardLv2TitleInfoController@getItemByTitle');

    // ifoam_standard_lv3_title_info
    $router->get('ifoam_standard_lv3_title_info','IfoamStandardLv3TitleInfoController@index');
    $router->get('ifoam_standard_lv3_title_info/title/{title_id}','IfoamStandardLv3TitleInfoController@getItemByTitle');

    // ifoam_standard_lv4_title_info
    $router->get('ifoam_standard_lv4_title_info','IfoamStandardLv4TitleInfoController@index');
    $router->get('ifoam_standard_lv4_title_info/title/{title_id}','IfoamStandardLv4TitleInfoController@getItemByTitle');

    // gov_regulation_data_feeder_info
    $router->get('gov_regulation_data_feeder_info','GovRegulationDataFeederInfoController@index');
    $router->get('gov_regulation_data_feeder_info/{id}','GovRegulationDataFeederInfoController@getData');
    $router->post('gov_regulation_data_feeder_info','GovRegulationDataFeederInfoController@addData');

    // international_resource_price_data_feeder_info
    $router->get('international_resource_price_data_feeder_info','InternationalResourcePriceDataFeederInfoController@index');
    $router->get('international_resource_price_data_feeder_info/{id}','InternationalResourcePriceDataFeederInfoController@getData');
    $router->post('international_resource_price_data_feeder_info','InternationalResourcePriceDataFeederInfoController@addData');

    // irrigation_data_feeder_info
    $router->get('irrigation_data_feeder_info','IrrigationDataFeederInfoController@index');
    $router->get('irrigation_data_feeder_info/{id}','IrrigationDataFeederInfoController@getData');
    $router->get('irrigation_data_feeder_info/user_id/{id}','IrrigationDataFeederInfoController@getDataByUser');
    $router->post('irrigation_data_feeder_info','IrrigationDataFeederInfoController@addData');
    $router->put('irrigation_data_feeder_info/{user_id}', 'IrrigationDataFeederInfoController@updateData');
    $router->delete('irrigation_data_feeder_info/{id}', 'IrrigationDataFeederInfoController@deleteData');

    // irrigation_type
    $router->get('irrigation_type','IrrigationTypeController@index');

    // plant_diseases_data_feeder_info
    $router->get('plant_diseases_data_feeder_info','PlantDiseasesFeederInfoController@index');
    $router->get('plant_diseases_data_feeder_info/{id}','PlantDiseasesFeederInfoController@getData');
    $router->post('plant_diseases_data_feeder_info','PlantDiseasesFeederInfoController@addData');

    // soil_area_type
    $router->get('soil_area_type','SoilAreaTypeController@index');

    // soil_data_feeder_info
    $router->get('soil_data_feeder_info','SoilDataFeederInfoController@index');
    $router->get('soil_data_feeder_info/{id}','SoilDataFeederInfoController@getData');
    $router->post('soil_data_feeder_info','SoilDataFeederInfoController@addData');

    // soil_type
    $router->get('soil_type','SoilTypeController@index');

    // water_quality
    $router->get('water_quality','WaterQualityController@index');

    // weather_data_feeder_info
    $router->get('weather_data_feeder_info','WeatherDataFeederInfoController@index');
    $router->get('weather_data_feeder_info/{id}','WeatherDataFeederInfoController@getData');
    $router->post('weather_data_feeder_info','WeatherDataFeederInfoController@addData');

    // water_quality_data_feeder_info
    $router->get('water_quality_data_feeder_info','WaterQualityDataFeederInfoController@index');
    $router->get('water_quality_data_feeder_info/{id}','WaterQualityDataFeederInfoController@getData');
    $router->post('water_quality_data_feeder_info','WaterQualityDataFeederInfoController@addData');

    // Get profit value
    $router->get('farmer_user_production_info/profit/user_id/{id}','FarmerUserProductionInfoController@getProfitByUser');

    // Farmer Info (new)
    $router->get('farmer_info','FarmerInfoController@index');
    $router->get('farmer_info/{id}','FarmerInfoController@getData');
    $router->get('farmer_info/user_id/{id}','FarmerInfoController@getDataByUser');
    $router->post('farmer_info', 'FarmerInfoController@addData');
    $router->put('farmer_info/{user_id}', 'FarmerInfoController@updateData');
    $router->delete('farmer_info/{id}', 'FarmerInfoController@deleteData');

    // Farmer extra info
    $router->get('farmer_extra_info','FarmerExtraInfoController@index');
    $router->get('farmer_extra_info/{id}','FarmerExtraInfoController@getData');
    $router->get('farmer_extra_info/user_id/{id}','FarmerExtraInfoController@getDataByUser');
    $router->post('farmer_extra_info', 'FarmerExtraInfoController@addData');
    $router->put('farmer_extra_info/{user_id}', 'FarmerExtraInfoController@updateData');
    $router->delete('farmer_extra_info/{id}', 'FarmerExtraInfoController@deleteData');

    // Cooperative gen
    $router->get('cooperative_gen','CooperativeGenController@index');
    $router->get('cooperative_gen/{id}','CooperativeGenController@getData');
    $router->get('cooperative_gen/user_id/{id}','CooperativeGenController@getDataByUser');
    $router->post('cooperative_gen', 'CooperativeGenController@addData');
    $router->put('cooperative_gen/{user_id}', 'CooperativeGenController@updateData');
    $router->delete('cooperative_gen/{id}', 'CooperativeGenController@deleteData');

    // Irrigation info
    $router->get('irrigation_info','IrrigationInfoController@index');
    $router->get('irrigation_info/{id}','IrrigationInfoController@getData');
    $router->post('irrigation_info', 'IrrigationInfoController@addData');
    $router->put('irrigation_info/{user_id}', 'IrrigationInfoController@updateData');
    $router->delete('irrigation_info/{id}', 'IrrigationInfoController@deleteData');

    // farmer invest type
    $router->get('farmer_invest_type','FarmerInvestTypeController@index');

    // farmer user crop
    $router->get('farmer_user_crop','FarmerUserCropController@index');
    $router->get('farmer_user_crop/user_id/{id}','FarmerUserCropController@getDataByUser');
    $router->get('farmer_user_crop/{id}','FarmerUserCropController@getData');
    $router->post('farmer_user_crop', 'FarmerUserCropController@addData');
    $router->put('farmer_user_crop/{id}', 'FarmerUserCropController@updateData');
    $router->delete('farmer_user_crop/{id}', 'FarmerUserCropController@deleteData');
    
    //desease info
    $router->get('diseases_info','DiseasesInfoController@index');
    $router->get('diseases_info/{id}','DiseasesInfoController@getData');
    $router->post('diseases_info', 'DiseasesInfoController@addData');
    $router->put('diseases_info/{user_id}', 'DiseasesInfoController@updateData');
    $router->delete('diseases_info/{id}', 'DiseasesInfoController@deleteData');
    
    //weed info
    $router->get('weed_info','WeedInfoController@index');
    $router->get('weed_info/{id}','WeedInfoController@getData');
    $router->post('weed_info', 'WeedInfoController@addData');
    $router->put('weed_info/{user_id}', 'WeedInfoController@updateData');
    $router->delete('weed_info/{id}', 'WeedInfoController@deleteData');

    // market retailer shop info
    $router->get('market_retailer_shop_info','MarketRetailerShopInfoController@index');
    $router->get('market_retailer_shop_info/{id}','MarketRetailerShopInfoController@getData');
    $router->get('market_retailer_shop_info/user_id/{id}','MarketRetailerShopInfoController@getDataByUser');
    $router->post('market_retailer_shop_info', 'MarketRetailerShopInfoController@addData');
    $router->put('market_retailer_shop_info/{id}', 'MarketRetailerShopInfoController@updateData');
    $router->delete('market_retailer_shop_info/{id}', 'MarketRetailerShopInfoController@deleteData');

    // buy sell type
    $router->get('buy_sell_type','BuySellTypeController@index');

    // farmer user crop
    $router->get('modern_trader_store_info','ModernTraderStoreInfoController@index');
    $router->get('modern_trader_store_info/{id}','ModernTraderStoreInfoController@getData');
    $router->get('modern_trader_store_info/user_id/{id}','ModernTraderStoreInfoController@getDataByUser');
    $router->post('modern_trader_store_info', 'ModernTraderStoreInfoController@addData');
    $router->put('modern_trader_store_info/{id}', 'ModernTraderStoreInfoController@updateData');
    $router->delete('modern_trader_store_info/{id}', 'ModernTraderStoreInfoController@deleteData');

    // invest history info
    $router->get('invest_history_info','InvestHistoryInfoController@index');
    $router->get('invest_history_info/{id}','InvestHistoryInfoController@getData');
    $router->get('invest_history_info/user_id/{id}','InvestHistoryInfoController@getDataByUser');
    $router->post('invest_history_info', 'InvestHistoryInfoController@addData');
    $router->put('invest_history_info/{id}', 'InvestHistoryInfoController@updateData');
    $router->delete('invest_history_info/{id}', 'InvestHistoryInfoController@deleteData');

    // import cost type
    $router->get('import_cost_type','ImportCostTypeController@index');
    
    //PlantDiseasesCountryDataFeederInfo
    $router->get('PlantDiseasesCountryDataFeederInfo','PlantDiseasesCountryDataFeederInfoController@index');
    $router->get('PlantDiseasesCountryDataFeederInfo/{id}','PlantDiseasesCountryDataFeederInfoController@getData');
    $router->get('PlantDiseasesCountryDataFeederInfo/user_id/{id}','PlantDiseasesCountryDataFeederInfoController@getDataByUser');
    $router->post('PlantDiseasesCountryDataFeederInfo', 'PlantDiseasesCountryDataFeederInfoController@addData');
    $router->put('PlantDiseasesCountryDataFeederInfo/{id}', 'PlantDiseasesCountryDataFeederInfoController@updateData');
    $router->delete('PlantDiseasesCountryDataFeederInfo/{id}', 'PlantDiseasesCountryDataFeederInfoController@deleteData');
    
    //CompetitiveCountryDataFeederInfo
    $router->get('CompetitiveCountryDataFeederInfo','CompetitiveCountryDataFeederInfoController@index');
    $router->get('CompetitiveCountryDataFeederInfo/{id}','CompetitiveCountryDataFeederInfoController@getData');
    $router->get('CompetitiveCountryDataFeederInfo/user_id/{id}','CompetitiveCountryDataFeederInfoController@getDataByUser');
    $router->post('CompetitiveCountryDataFeederInfo', 'CompetitiveCountryDataFeederInfoController@addData');
    $router->put('CompetitiveCountryDataFeederInfo/{id}', 'CompetitiveCountryDataFeederInfoController@updateData');
    $router->delete('CompetitiveCountryDataFeederInfo/{id}', 'CompetitiveCountryDataFeederInfoController@deleteData');

    // inspection_crop_info
    $router->get('inspection_crop_info','InspectionCropInfoController@index');
    $router->get('inspection_crop_info/{id}','InspectionCropInfoController@getData');
    $router->get('inspection_crop_info/user_id/{id}','InspectionCropInfoController@getDataByUser');
    $router->post('inspection_crop_info', 'InspectionCropInfoController@addData');
    $router->put('inspection_crop_info/{id}', 'InspectionCropInfoController@updateData');
    $router->delete('inspection_crop_info/{id}', 'InspectionCropInfoController@deleteData');

    // Manufacturer Material Info
    $router->get('manufacturer_material_info','ManufacturerMaterialInfoController@index');
    $router->get('manufacturer_material_info/{id}','ManufacturerMaterialInfoController@getData');
    $router->get('manufacturer_material_info/user_id/{id}','ManufacturerMaterialInfoController@getDataByUser');
    $router->post('manufacturer_material_info', 'ManufacturerMaterialInfoController@addData');
    $router->put('manufacturer_material_info/{id}', 'ManufacturerMaterialInfoController@updateData');
    $router->delete('manufacturer_material_info/{id}', 'ManufacturerMaterialInfoController@deleteData');

    // farmer_user_cultivated_area_info
    $router->post('farmer_user_cultivated_area_info/upload/file', 'FarmerUserCultivatedAreaInfoController@uploadFile');

    // farmer_user_gap_standard_info
    $router->post('farmer_user_gap_standard_info/upload/file', 'FarmerUserGapStandardInfoController@uploadFile');

    // farmer_user_organic_standard_info
    $router->post('farmer_user_organic_standard_info/upload/file', 'FarmerUserOrganicStandardInfoController@uploadFile');

    // farmer_user_international_standard_info
    $router->post('farmer_user_international_standard_info/upload/file', 'FarmerUserInternationalStandardInfoController@uploadFile');

    // market_retailer_shop_info
    $router->post('market_retailer_shop_info/upload/file', 'MarketRetailerShopInfoController@uploadFile');

    // news info
    $router->get('news_info','NewsInfoController@index');
    $router->get('news_info/page','NewsInfoController@getPage');
    $router->get('news_info/count','NewsInfoController@getCount');
    $router->get('news_info/{id}','NewsInfoController@getData');
    $router->post('news_info', 'NewsInfoController@addData');
    $router->put('news_info/{id}', 'NewsInfoController@updateData');
    $router->delete('news_info/{id}', 'NewsInfoController@deleteData');

    // investment map
    $router->get('investment_map', 'InvestorInterestInfoController@getInvestmentMap');

    // Report problem
    $router->get('report_problem_info', 'ReportProblemInfoController@index');
    $router->get('report_problem_info/{id}','ReportProblemInfoController@getData');
    $router->post('report_problem_info', 'ReportProblemInfoController@uploadFile');
    $router->delete('report_problem_info/{id}', 'ReportProblemInfoController@deleteData');
    
    // Chart type
    $router->get('chart_type','ChartTypeController@index');
    
    // Chart data by user type id
    $router->get('user_type_chart_data/user_type/{id}','UserTypeChartDataController@getByUserType');
    
    // Chart info
    $router->get('chart_info','ChartInfoController@index');
    $router->get('chart_info/{id}','ChartInfoController@getData');
    $router->get('chart_info/user_id/{user_id}','ChartInfoController@getDataByUser');
    $router->post('chart_info', 'ChartInfoController@addData');
    $router->put('chart_info/{id}', 'ChartInfoController@updateData');
    $router->delete('chart_info/{id}', 'ChartInfoController@deleteData');  
    
    // Chart data item info
    $router->get('chart_data_item_info','ChartDataItemInfoController@index');
    $router->get('chart_data_item_info/{id}','ChartDataItemInfoController@getData');
    $router->get('chart_data_item_info/chart_info/{chart_info_id}','ChartDataItemInfoController@getDataByChartInfoId');
    $router->post('chart_data_item_info', 'ChartDataItemInfoController@setDataItem');
    $router->delete('chart_data_item_info/{id}', 'ChartDataItemInfoController@deleteData'); 
    
    // Report controller
    $router->get('report/data','ReportController@getDataList');
    $router->get('report/user/{id}','ReportController@getDataListByUserId');

});
