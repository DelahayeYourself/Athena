<?php defined('SYSPATH') OR die('No direct script access.'); ?>

2015-04-04 11:34:33 --- EMERGENCY: ErrorException [ 2048 ]: Only variables should be passed by reference ~ APPPATH/classes/Controller/Athena/Mentions.php [ 46 ] in /home/sam/public_html/athena/application/classes/Controller/Athena/Mentions.php:46
2015-04-04 11:34:33 --- DEBUG: #0 /home/sam/public_html/athena/application/classes/Controller/Athena/Mentions.php(46): Kohana_Core::error_handler(2048, 'Only variables ...', '/home/sam/publi...', 46, Array)
#1 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(84): Controller_Athena_Mentions->action_index()
#2 [internal function]: Kohana_Controller->execute()
#3 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Mentions))
#4 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#5 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#6 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#7 {main} in /home/sam/public_html/athena/application/classes/Controller/Athena/Mentions.php:46
2015-04-04 11:36:57 --- EMERGENCY: ErrorException [ 8 ]: Undefined variable: title ~ APPPATH/views/athena/_shared/master_admin.php [ 4 ] in /home/sam/public_html/athena/application/views/athena/_shared/master_admin.php:4
2015-04-04 11:36:57 --- DEBUG: #0 /home/sam/public_html/athena/application/views/athena/_shared/master_admin.php(4): Kohana_Core::error_handler(8, 'Undefined varia...', '/home/sam/publi...', 4, Array)
#1 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#2 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#3 /home/sam/public_html/athena/system/classes/Kohana/View.php(236): Kohana_View->render()
#4 /home/sam/public_html/athena/application/views/athena/base.php(40): Kohana_View->__toString()
#5 /home/sam/public_html/athena/system/classes/Kohana/View.php(62): include('/home/sam/publi...')
#6 /home/sam/public_html/athena/system/classes/Kohana/View.php(359): Kohana_View::capture('/home/sam/publi...', Array)
#7 /home/sam/public_html/athena/system/classes/Kohana/Controller/Template.php(44): Kohana_View->render()
#8 /home/sam/public_html/athena/system/classes/Kohana/Controller.php(87): Kohana_Controller_Template->after()
#9 [internal function]: Kohana_Controller->execute()
#10 /home/sam/public_html/athena/system/classes/Kohana/Request/Client/Internal.php(97): ReflectionMethod->invoke(Object(Controller_Athena_Mentions))
#11 /home/sam/public_html/athena/system/classes/Kohana/Request/Client.php(114): Kohana_Request_Client_Internal->execute_request(Object(Request), Object(Response))
#12 /home/sam/public_html/athena/system/classes/Kohana/Request.php(997): Kohana_Request_Client->execute(Object(Request))
#13 /home/sam/public_html/athena/index.php(118): Kohana_Request->execute()
#14 {main} in /home/sam/public_html/athena/application/views/athena/_shared/master_admin.php:4
2015-04-04 11:37:17 --- EMERGENCY: ErrorException [ 1 ]: Cannot pass parameter 2 by reference ~ APPPATH/classes/Controller/Athena/Mentions.php [ 47 ] in file:line
2015-04-04 11:37:17 --- DEBUG: #0 [internal function]: Kohana_Core::shutdown_handler()
#1 {main} in file:line