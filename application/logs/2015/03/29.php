<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-03-29 16:21:14 --- EMERGENCY: View_Exception [ 0 ]: The requested view athena/periodes/form could not be found ~ SYSPATH/classes/Kohana/View.php [ 265 ] in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-29 16:21:14 --- DEBUG: #0 /home/sam/public_html/athena/system/classes/Kohana/View.php(145): Kohana_View->set_filename('athena/periodes...')
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(30): Kohana_View->__construct('athena/periodes...', NULL)
#2 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(44): Kohana_View::factory('athena/periodes...')
#3 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_form()
#4 [internal function]: Kohana_Controller->execute()
#5 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#6 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#7 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#8 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#9 {main} in /home/sam/public_html/athena/system/classes/Kohana/View.php:145
2015-03-29 19:06:21 --- EMERGENCY: ErrorException [ 8 ]: A non well formed numeric value encountered ~ APPPATH/classes/Athena/Date.php [ 28 ] in file:line
2015-03-29 19:06:21 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'A non well form...', '/home/sam/publi...', 28, Array)
#1 /home/sam/public_html/athena/application/classes/Athena/Date.php(28): date('d.m.Y H:i', '29.03.2015 19:0...')
#2 /home/sam/public_html/athena/application/classes/Model/Periode.php(62): Athena_Date::fromTimestampToFr('29.03.2015 19:0...')
#3 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(603): Model_Periode->get('date_begin')
#4 /home/sam/public_html/athena/application/classes/Model/Periode.php(52): Kohana_ORM->__get('date_begin')
#5 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(43): Model_Periode->save()
#6 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_form()
#7 [internal function]: Kohana_Controller->execute()
#8 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#9 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2015-03-29 19:16:25 --- EMERGENCY: ErrorException [ 8 ]: A non well formed numeric value encountered ~ APPPATH/classes/Athena/Date.php [ 41 ] in file:line
2015-03-29 19:16:25 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'A non well form...', '/home/sam/publi...', 41, Array)
#1 /home/sam/public_html/athena/application/classes/Athena/Date.php(41): date('m', '29.03.2015 19:1...')
#2 [internal function]: Athena_Date::isValidTimestamp('29.03.2015 19:1...')
#3 /home/sam/public_html/athena/system/classes/Kohana/Validation.php(410): ReflectionMethod->invokeArgs(NULL, Array)
#4 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(1273): Kohana_Validation->check()
#5 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(NULL)
#6 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(1421): Kohana_ORM->create(NULL)
#7 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(43): Kohana_ORM->save()
#8 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_form()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#11 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#14 {main} in file:line
2015-03-29 19:18:16 --- EMERGENCY: ErrorException [ 8 ]: A non well formed numeric value encountered ~ APPPATH/classes/Athena/Date.php [ 41 ] in file:line
2015-03-29 19:18:16 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'A non well form...', '/home/sam/publi...', 41, Array)
#1 /home/sam/public_html/athena/application/classes/Athena/Date.php(41): date('m', '29.03.2015 19:1...')
#2 /home/sam/public_html/athena/application/classes/Model/Periode.php(61): Athena_Date::isValidTimestamp('29.03.2015 19:1...')
#3 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(603): Model_Periode->get('date_begin')
#4 /home/sam/public_html/athena/application/classes/Model/Periode.php(52): Kohana_ORM->__get('date_begin')
#5 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(43): Model_Periode->save()
#6 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_form()
#7 [internal function]: Kohana_Controller->execute()
#8 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#9 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2015-03-29 19:21:09 --- EMERGENCY: ErrorException [ 8 ]: A non well formed numeric value encountered ~ APPPATH/classes/Athena/Date.php [ 28 ] in file:line
2015-03-29 19:21:09 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'A non well form...', '/home/sam/publi...', 28, Array)
#1 /home/sam/public_html/athena/application/classes/Athena/Date.php(28): date('d.m.Y H:i', '29.03.2015 19:2...')
#2 /home/sam/public_html/athena/application/classes/Model/Periode.php(62): Athena_Date::fromTimestampToFr('29.03.2015 19:2...')
#3 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(603): Model_Periode->get('date_begin')
#4 /home/sam/public_html/athena/application/classes/Model/Periode.php(52): Kohana_ORM->__get('date_begin')
#5 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(43): Model_Periode->save()
#6 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_form()
#7 [internal function]: Kohana_Controller->execute()
#8 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#9 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2015-03-29 19:21:18 --- EMERGENCY: ErrorException [ 8 ]: A non well formed numeric value encountered ~ APPPATH/classes/Athena/Date.php [ 28 ] in file:line
2015-03-29 19:21:18 --- DEBUG: #0 [internal function]: Kohana_Core::error_handler(8, 'A non well form...', '/home/sam/publi...', 28, Array)
#1 /home/sam/public_html/athena/application/classes/Athena/Date.php(28): date('d.m.Y H:i', '29.03.2015 19:2...')
#2 /home/sam/public_html/athena/application/classes/Model/Periode.php(62): Athena_Date::fromTimestampToFr('29.03.2015 19:2...')
#3 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(603): Model_Periode->get('date_begin')
#4 /home/sam/public_html/athena/application/classes/Model/Periode.php(52): Kohana_ORM->__get('date_begin')
#5 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(43): Model_Periode->save()
#6 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_form()
#7 [internal function]: Kohana_Controller->execute()
#8 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#9 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#12 {main} in file:line
2015-03-29 19:29:54 --- EMERGENCY: ReflectionException [ 0 ]: Method Model_Periode::IsSuperiorToBeginChoise() does not exist ~ SYSPATH/classes/Kohana/Validation.php [ 407 ] in /home/sam/public_html/athena/system/classes/Kohana/Validation.php:407
2015-03-29 19:29:54 --- DEBUG: #0 /home/sam/public_html/athena/system/classes/Kohana/Validation.php(407): ReflectionMethod->__construct('Model_Periode', 'IsSuperiorToBeg...')
#1 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(1273): Kohana_Validation->check()
#2 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(1302): Kohana_ORM->check(NULL)
#3 /home/sam/public_html/athena/modules/orm/classes/Kohana/ORM.php(1421): Kohana_ORM->create(NULL)
#4 /home/sam/public_html/athena/application/classes/Model/Periode.php(52): Kohana_ORM->save(NULL)
#5 /home/sam/public_html/athena/application/classes/Controller/Athena/Periodes.php(43): Model_Periode->save()
#6 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Periodes->action_form()
#7 [internal function]: Kohana_Controller->execute()
#8 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Periodes))
#9 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#10 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#11 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#12 {main} in /home/sam/public_html/athena/system/classes/Kohana/Validation.php:407