<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-04-01 19:03:23 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: errors ~ APPPATH/views/athena/account/login.php [ 116 ] in /home/sam/public_html/athena/application/views/athena/account/login.php:116
2015-04-01 19:03:23 --- DEBUG: #0 /home/sam/public_html/athena/application/views/athena/account/login.php(116): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/sam/publi...', 116, Array)
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#2 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#3 /home/sam/public_html/athena/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Account))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#10 {main} in /home/sam/public_html/athena/application/views/athena/account/login.php:116
2015-04-01 19:03:59 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: errors ~ APPPATH/views/athena/account/login.php [ 116 ] in /home/sam/public_html/athena/application/views/athena/account/login.php:116
2015-04-01 19:03:59 --- DEBUG: #0 /home/sam/public_html/athena/application/views/athena/account/login.php(116): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/sam/publi...', 116, Array)
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#2 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#3 /home/sam/public_html/athena/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Account))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#10 {main} in /home/sam/public_html/athena/application/views/athena/account/login.php:116
2015-04-01 19:04:35 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: errors ~ APPPATH/views/athena/account/login.php [ 116 ] in /home/sam/public_html/athena/application/views/athena/account/login.php:116
2015-04-01 19:04:35 --- DEBUG: #0 /home/sam/public_html/athena/application/views/athena/account/login.php(116): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/sam/publi...', 116, Array)
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#2 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#3 /home/sam/public_html/athena/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#4 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Account))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#10 {main} in /home/sam/public_html/athena/application/views/athena/account/login.php:116
2015-04-01 20:17:11 --- EMERGENCY: View_Exception [ 0 ]: The requested view athena/modules/index could not be found ~ SYSPATH/classes/Kohana/View.php [ 265 ] in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-04-01 20:17:11 --- DEBUG: #0 /home/sam/public_html/athena/system/classes/Kohana/View.php(145): Kohana_View->set_filename('athena/modules/...')
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(30): Kohana_View->__construct('athena/modules/...', NULL)
#2 /home/sam/public_html/athena/application/classes/Controller/Athena/Modules.php(27): Kohana_View::factory('athena/modules/...')
#3 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Modules->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Modules))
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#9 {main} in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-04-01 20:21:58 --- EMERGENCY: View_Exception [ 0 ]: The requested view athena/modules/form could not be found ~ SYSPATH/classes/Kohana/View.php [ 265 ] in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-04-01 20:21:58 --- DEBUG: #0 /home/sam/public_html/athena/system/classes/Kohana/View.php(145): Kohana_View->set_filename('athena/modules/...')
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(30): Kohana_View->__construct('athena/modules/...', NULL)
#2 /home/sam/public_html/athena/application/classes/Controller/Athena/Modules.php(56): Kohana_View::factory('athena/modules/...')
#3 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Modules->action_form()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Modules))
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#9 {main} in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-04-01 20:24:50 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: mention ~ APPPATH/views/athena/modules/form.php [ 27 ] in /home/sam/public_html/athena/application/views/athena/modules/form.php:27
2015-04-01 20:24:50 --- DEBUG: #0 /home/sam/public_html/athena/application/views/athena/modules/form.php(27): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/sam/publi...', 27, Array)
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#2 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#3 /home/sam/public_html/athena/application/classes/Controller/Athena/Modules.php(62): Kohana_View->render()
#4 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Modules->action_form()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Modules))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#10 {main} in /home/sam/public_html/athena/application/views/athena/modules/form.php:27