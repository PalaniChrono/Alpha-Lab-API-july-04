<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controller\HomeController;
use App\Http\Controller\CourseController;

Route::get('set', function () {
    Artisan::call('optimize');
    Artisan::call('config:cache');
    Artisan::call('route:cache');
    return "Optimization Cache is set";
});
Route::get('clear', function () {
    Artisan::call('optimize:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    // Artisan::call('composer:autoload');

    return "Optimization Cache is Cleared";
});

//Ecommerce Admin Panel
Route::get('hb', 'UserController@hb');
//HomeBanner

Route::get('/getHomeBanner', 'HomebannerController@getHomeBanner');



//HomeSection
Route::get('/getHomeSection', 'HomeController@getHomeSection');
Route::post('/storeHomeSection', 'HomeController@storeHomeSection');
Route::put('/updateHomeSection', 'HomeController@updateHomeSection');
Route::put('/updateHomeEqpTextOne', 'HomeController@updateHomeEqpTextOne');
Route::put('/updateHomeEqpTextTwo', 'HomeController@updateHomeEqpTextTwo');
Route::put('/updateHomeEqpTextThree', 'HomeController@updateHomeEqpTextThree');
Route::put('/updateHomeEqpTextFour', 'HomeController@updateHomeEqpTextFour');
Route::put('/updateHomeEqpTextFive', 'HomeController@updateHomeEqpTextFive');

Route::put('/updateTestimonyHeader', 'HomeController@updateTestimonyHeader');

Route::post('/storeHomeTestimony', 'HomeController@storeHomeTestimony');
Route::put('/updateHomeTestimony', 'HomeController@updateHomeTestimony');
Route::get('getTestimonyById/{id}', 'HomeController@getTestimonyById');
Route::get('deleteTestimonyById/{id}', 'HomeController@deleteTestimonyById');

//Image Upload
// Route::post('/updateFaqBanner','FaqBannerController@imageUpload');



//Products
Route::get('getProductSection', 'ProductController@getProductSection');
Route::put('updateProductSection', 'ProductController@updateProductSection');

//Faq
Route::get('getAllFaq', 'FaqController@getAllFaq');
Route::get('getFaqByType/{type}', 'FaqController@getFaqByType');
Route::put('updateFaq', 'FaqController@updateFaq');
Route::get('deleteFAQzById/{id}', 'FaqController@deleteFAQzById');
Route::post('storeFaq', 'FaqController@storeFaq');





//Company
Route::get('getCompany', 'CompanyController@getCompany');
Route::put('updateCompany', 'CompanyController@updateCompany');
Route::get('getTeamById/{id}', 'CompanyController@getTestimonyById');

//Teams
Route::post('storeTeams', 'CompanyController@storeTeams');
Route::put('updateTeams', 'CompanyController@updateTeams');
Route::get('deleteTeamsById/{id}', 'CompanyController@deleteTeamsById');

//EquipmentsDetails
Route::get('getBlog', 'BlogController@getBlog');
Route::get('getAllEquipmentsDetails', 'BlogController@getAllEquipmentsDetails'); 
Route::get('getAllEquipment', 'BlogController@getAllEquipment'); 
Route::put('updateBlog', 'BlogController@updateBlog');
Route::put('updateEquipmentsDetails', 'BlogController@updateEquipmentsDetails');
Route::post('storeNewEquipmentsDetails', 'BlogController@storeNewEquipmentsDetails');
Route::get('deleteEquipmentsDetailsById/{id}', 'BlogController@deleteEquipmentsDetailsById');
Route::get('getEquipmentsDetailsById/{id}', 'BlogController@getEquipmentsDetailsById');
Route::get('activateEquipments/{id}', 'BlogController@activateEquipments');
Route::get('deactivateEquipments/{id}', 'BlogController@deactivateEquipments');
Route::get('getSpotLightDetails', 'BlogController@getSpotLightDetails');



//CourseSection
Route::get('/getCourseSection', 'CourseController@getCourseSection');
Route::put('/updateCourseSectionOne','CourseController@updateCourseSectionOne');

//OtherCourseSection
Route::get('/getOtherCourseSection', 'OtherCourseController@getOtherCourseSection');
Route::put('/updateOtherCourseSectionOne','OtherCourseController@updateOtherCourseSectionOne');
Route::put('/updateOtherCourseSectionTwo','OtherCourseController@updateOtherCourseSectionTwo');
Route::put('/updateOtherCourseSectionThree','OtherCourseController@updateOtherCourseSectionThree');

//TrainerSection
Route::get('/getTrainerSection', 'TrainerController@getTrainerSection');
Route::put('/updateTrainerSectionOne','TrainerController@updateTrainerSectionOne');
Route::post('/updateImage','ImageController@imageUpload');


//LashtalkSection
Route::get('/getLashtalkSection', 'LashtalkController@getLashtalkSection');
Route::put('/updateLashtalkSectionOne','LashtalkController@updateLashtalkSectionOne');



//ContactSection
Route::get('/getContactSection', 'ContactController@getContactSection');
Route::put('/updateContactSectionOne','ContactController@updateContactSectionOne');

//Homebanner  
Route::apiResource('HomeBanner', 'HomeBannerController');
Route::get('HomeBannerSwitch/{id}', 'HomeBannerController@HomeBannerSwitch');
Route::post('imageUpdateHomeBanner', 'HomeBannerController@imageUpdateHomeBanner');
Route::get('getAllHomeBanner', 'HomeBannerController@getAllHomeBanner');


//Organization
Route::apiResource('Organization', 'OrganizationController');
Route::get('OrganizationSwitch/{id}', 'OrganizationController@OrganizationSwitch');
Route::post('imageUpdateOrganization', 'OrganizationController@imageUpdateOrganization');
Route::get('getAllOrganization', 'OrganizationController@getAllOrganization');

//WhoWeAre
Route::apiResource('WhoWeAre', 'WhoWeAreController');
Route::get('WhoWeAreSwitch/{id}', 'WhoWeAreController@WhoWeAreSwitch');
Route::post('imageUpdateWhoWeAre', 'WhoWeAreController@imageUpdateWhoWeAre'); 
Route::get('getAllWhoWeAre', 'WhoWeAreController@getAllWhoWeAre');

//Question
Route::apiResource('Question', 'QuestionController');
Route::get('QuestionSwitch/{id}', 'QuestionController@QuestionSwitch');
Route::get('getAllQuestion', 'QuestionController@getAllQuestion');

//test
Route::apiResource('Test', 'TestController');
Route::get('TestSwitch/{id}', 'TestController@TestSwitch');
Route::get('getTestDetails', 'TestController@getTestDetails');
Route::put('updateTest', 'TestController@updateTest');
Route::get('getAllTest', 'TestController@getAllTest');


//FAQBanner
Route::get('getFaqBanner', 'FaqBannerController@getFaqBanner');

//FAQLAb Details
Route::apiResource('FaqLab', 'FaqLabController');
Route::get('FaqLabSwitch/{id}', 'FaqLabController@FaqLabSwitch');
Route::get('getAllFaqLab', 'FaqLabController@getAllFaqLab');


//TestimonyLab
Route::apiResource('TestimonyLab', 'TestimonyLabController');
Route::get('TestimonyLabSwitch/{id}', 'TestimonyLabController@TestimonyLabSwitch');
Route::post('imageUpdateTestimonyLab', 'TestimonyLabController@imageUpdateTestimonyLab');
Route::get('getAllTestimonyLab', 'TestimonyLabController@getAllTestimonyLab');


//SocialMedia
Route::get('getSocialMedia', 'SocialMediaController@getSocialMedia');
Route::put('updateSocialMedia', 'SocialMediaController@updateSocialMedia');


Route::apiResource('ContactUs', 'ContactUsController');





Route::get('/getHomeContent','BumbleHomeCardController@getHomeContent');
Route::put('/updateHomeCard1','BumbleHomeCardController@updateHomeCard1');
Route::put('/updateHomeCard2','BumbleHomeCardController@updateHomeCard2');
Route::put('/updateHomeCard3','BumbleHomeCardController@updateHomeCard3');
Route::put('/updateHomeBanner','BumbleController@BumbleController');
Route::put('/updateHometextarea','BumbleHomeCardController@updateHometextarea');

// gallery
Route::get('/getgallerycontent','gallerycontroller@getgallerycontent');
Route::put('/updateGallery','gallerycontroller@updateGallery');
Route::put('/updateWeddingText','gallerycontroller@updateWeddingText');
Route::put('/updateOutdoorsText','gallerycontroller@updateOutdoorsText');
Route::put('/updateBabywashText','gallerycontroller@updateBabywashText');
Route::put('/updateAllText','gallerycontroller@updateAllText');


// services
Route::get('/getServicescontent','servicesController@getServicescontent');

Route::put('/updateServicestext','servicesController@updateServicestext');

Route::post('/storecareers','careersController@storecareers');
Route::get('/getcareers','careersController@getcareers');
//bookus
Route::post('/storebookus','bookusController@storebookus');
Route::get('/getbookus','bookusController@getbookus');
Route::post('/storehomebookus','bookusController@storehomebookus');
Route::get('/gethomebookus','bookusController@gethomebookus');





//User
Route::post('loginUser', 'UserController@loginUser');

Route::post('upload',[careersController::class,'index']);


Route::group(['middleware' => 'auth:sanctum'], function() {
    //User
    Route::apiResource('user','UserController');
    Route::apiResource('dispatch','DispatchController');

    Route::get('dispatchSwitch/{id}', 'DispatchController@dispatchSwitch');
    // Route::post('loginDispatch', 'DispatchController@loginDispatch');

    Route::get('adminDashboard', 'DashboardController@adminDashboard');

});
