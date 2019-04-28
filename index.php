
<?php 

/*==============================
=            Models            =
==============================*/
require_once 'model/GetModel.php';
require_once 'model/SignupModel.php';
require_once 'model/LanguageModel.php';
require_once 'model/UserModel.php';
require_once 'model/SigninModel.php';
require_once 'model/TourModel.php';
require_once 'model/BookingModel.php';
require_once 'model/ReviewModel.php';




/*=====  End of Models  ======*/


/*===================================
=            Controllers            =
===================================*/

require_once 'controller/GetController.php';
require_once 'controller/SignupController.php';
require_once 'controller/LanguageController.php';
require_once 'controller/UserController.php';
require_once 'controller/SigninController.php';
require_once 'controller/TourController.php';
require_once 'controller/BookingController.php';
require_once 'controller/ReviewController.php';


/*=====  End of Controllers  ======*/



$mvc = new GetController();
$mvc -> Get();


 ?>