<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-28 17:04:26 --- EMERGENCY: View_Exception [ 0 ]: The requested view gico/general/messages/error could not be found ~ SYSPATH/classes/Kohana/View.php [ 265 ] in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-28 17:04:26 --- DEBUG: #0 /home/sam/public_html/athena/system/classes/Kohana/View.php(145): Kohana_View->set_filename('gico/general/me...')
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(30): Kohana_View->__construct('gico/general/me...', NULL)
#2 /home/sam/public_html/athena/application/classes/Athena/Form.php(14): Kohana_View::factory('gico/general/me...')
#3 /home/sam/public_html/athena/application/views/athena/account/signup.php(115): Athena_Form::getErrorMessage(Array, 'email')
#4 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#5 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#6 /home/sam/public_html/athena/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#7 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Account))
#10 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#13 {main} in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-28 17:04:48 --- EMERGENCY: View_Exception [ 0 ]: The requested view gico/general/messages/error could not be found ~ SYSPATH/classes/Kohana/View.php [ 265 ] in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-28 17:04:48 --- DEBUG: #0 /home/sam/public_html/athena/system/classes/Kohana/View.php(145): Kohana_View->set_filename('gico/general/me...')
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(30): Kohana_View->__construct('gico/general/me...', NULL)
#2 /home/sam/public_html/athena/application/classes/Athena/Form.php(14): Kohana_View::factory('gico/general/me...')
#3 /home/sam/public_html/athena/application/views/athena/account/signup.php(115): Athena_Form::getErrorMessage(Array, 'email')
#4 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#5 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#6 /home/sam/public_html/athena/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#7 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#8 [internal function]: Kohana_Controller->execute()
#9 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Account))
#10 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#11 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#12 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#13 {main} in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-28 17:05:39 --- EMERGENCY: View_Exception [ 0 ]: The requested view gico/general/notices could not be found ~ SYSPATH/classes/Kohana/View.php [ 265 ] in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-28 17:05:39 --- DEBUG: #0 /home/sam/public_html/athena/system/classes/Kohana/View.php(145): Kohana_View->set_filename('gico/general/no...')
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(30): Kohana_View->__construct('gico/general/no...', NULL)
#2 /home/sam/public_html/athena/application/views/athena/users/lists.php(7): Kohana_View::factory('gico/general/no...')
#3 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#4 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#5 /home/sam/public_html/athena/application/classes/Controller/Athena/Users.php(45): Kohana_View->render()
#6 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Users->action_lists()
#7 [internal function]: Kohana_Controller->execute()
#8 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Users))
#9 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#12 {main} in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-28 17:21:40 --- EMERGENCY: View_Exception [ 0 ]: The requested view athena/periodes/index could not be found ~ SYSPATH/classes/Kohana/View.php [ 265 ] in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-28 17:21:40 --- DEBUG: #0 /home/sam/public_html/athena/system/classes/Kohana/View.php(145): Kohana_View->set_filename('athena/periodes...')
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(30): Kohana_View->__construct('athena/periodes...', NULL)
#2 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(29): Kohana_View::factory('athena/periodes...')
#3 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_index()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#9 {main} in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-28 17:23:11 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: periodes ~ APPPATH/views/athena/periodes/index.php [ 25 ] in /home/sam/public_html/athena/application/views/athena/periodes/index.php:25
2015-03-28 17:23:11 --- DEBUG: #0 /home/sam/public_html/athena/application/views/athena/periodes/index.php(25): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/sam/publi...', 25, Array)
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#2 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#3 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(32): Kohana_View->render()
#4 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_index()
#5 [internal function]: Kohana_Controller->execute()
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#8 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#9 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#10 {main} in /home/sam/public_html/athena/application/views/athena/periodes/index.php:25