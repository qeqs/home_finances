<?php

require_once 'sql/DataBase.php';

require_once 'services/BaseManager.php';
require_once 'services/IncomeManager.php';
require_once 'services/OutcomeManager.php';
require_once 'services/TypeManager.php';
require_once 'services/UserManager.php';
require_once 'services/StatisticService.php';

require_once 'entities/Finance.php';
require_once 'entities/Income.php';
require_once 'entities/Outcome.php';
require_once 'entities/Type.php';
require_once 'entities/User.php';
require_once 'entities/Plans.php';

require_once 'controllers/controller_user.php';

require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';


require_once 'core/route.php';
Route::start();
