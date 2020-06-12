<?php
$app = __DIR__;
require_once "{$app}/../classes/helper-classes/Session.php";
require_once "{$app}/../classes/helper-classes/DependencyInjector.php";
require_once "{$app}/../classes/helper-classes/Config.php";
require_once "{$app}/../classes/helper-classes/Database.php";
require_once "{$app}/../classes/helper-classes/Hash.php";
require_once "{$app}/../classes/helper-classes/TokenHandler.php";
require_once "{$app}/../classes/helper-classes/Util.php";
require_once "{$app}/../classes/helper-classes/ErrorHandler.php";
require_once "{$app}/../classes/helper-classes/Validator.php";

require_once "{$app}/../classes/Category.php";
require_once "{$app}/../classes/Customer.php";
require_once "{$app}/../classes/Product.php";