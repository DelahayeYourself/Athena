<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-27 10:28:11 --- EMERGENCY: Kohana_Exception [ 0 ]: The _raw_data property does not exist in the Model_User class ~ MODPATH/orm/classes/Kohana/ORM.php [ 687 ] in /home/sam/public_html/GICO/modules/orm/classes/Kohana/ORM.php:603
2015-03-27 10:28:11 --- DEBUG: #0 /home/sam/public_html/GICO/modules/orm/classes/Kohana/ORM.php(603): Kohana_ORM->get('_raw_data')
#1 /home/sam/public_html/GICO/application/classes/Model/User.php(65): Kohana_ORM->__get('_raw_data')
#2 /home/sam/public_html/GICO/modules/orm/classes/Kohana/ORM.php(408): Model_User->rules()
#3 /home/sam/public_html/GICO/modules/orm/classes/Kohana/ORM.php(1269): Kohana_ORM->_validation()
#4 /home/sam/public_html/GICO/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(NULL)
#5 /home/sam/public_html/GICO/modules/orm/classes/Kohana/ORM.php(1421): Kohana_ORM->create(NULL)
#6 /home/sam/public_html/GICO/application/classes/Controller/Gico/Account.php(109): Kohana_ORM->save()
#7 /home/sam/public_html/GICO/system/classes/Kohana/Controller.php(84): Controller_Gico_Account->action_signup()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/sam/public_html/GICO/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Gico_Account))
#10 /home/sam/public_html/GICO/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/sam/public_html/GICO/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/sam/public_html/GICO/index.php(118): Kohana_Request->execute()
#13 {main} in /home/sam/public_html/GICO/modules/orm/classes/Kohana/ORM.php:603
2015-03-27 11:05:14 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 1 for Model_Auth_User::create_user(), called in /home/sam/public_html/GICO/application/classes/Controller/Gico/Account.php on line 110 and defined ~ MODPATH/orm/classes/Model/Auth/User.php [ 161 ] in /home/sam/public_html/GICO/modules/orm/classes/Model/Auth/User.php:161
2015-03-27 11:05:14 --- DEBUG: #0 /home/sam/public_html/GICO/modules/orm/classes/Model/Auth/User.php(161): Kohana_Core::error_handler(2, 'Missing argumen...', '/home/sam/publi...', 161, Array)
#1 /home/sam/public_html/GICO/application/classes/Controller/Gico/Account.php(110): Model_Auth_User->create_user()
#2 /home/sam/public_html/GICO/system/classes/Kohana/Controller.php(84): Controller_Gico_Account->action_signup()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/sam/public_html/GICO/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Gico_Account))
#5 /home/sam/public_html/GICO/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/sam/public_html/GICO/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/sam/public_html/GICO/index.php(118): Kohana_Request->execute()
#8 {main} in /home/sam/public_html/GICO/modules/orm/classes/Model/Auth/User.php:161
2015-03-27 11:05:52 --- EMERGENCY: ErrorException [ 2 ]: Missing argument 2 for Model_Auth_User::create_user(), called in /home/sam/public_html/GICO/application/classes/Controller/Gico/Account.php on line 110 and defined ~ MODPATH/orm/classes/Model/Auth/User.php [ 161 ] in /home/sam/public_html/GICO/modules/orm/classes/Model/Auth/User.php:161
2015-03-27 11:05:52 --- DEBUG: #0 /home/sam/public_html/GICO/modules/orm/classes/Model/Auth/User.php(161): Kohana_Core::error_handler(2, 'Missing argumen...', '/home/sam/publi...', 161, Array)
#1 /home/sam/public_html/GICO/application/classes/Controller/Gico/Account.php(110): Model_Auth_User->create_user(Array)
#2 /home/sam/public_html/GICO/system/classes/Kohana/Controller.php(84): Controller_Gico_Account->action_signup()
#3 [internal function]: Kohana_Controller->execute()
#4 /home/sam/public_html/GICO/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Gico_Account))
#5 /home/sam/public_html/GICO/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#6 /home/sam/public_html/GICO/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#7 /home/sam/public_html/GICO/index.php(118): Kohana_Request->execute()
#8 {main} in /home/sam/public_html/GICO/modules/orm/classes/Model/Auth/User.php:161