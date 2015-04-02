<?php

/**
 * Kohana_Exception
 * 
 * Kohana_Exception override for rendering error in the base template layout
 * 
 * @extends Kohana_Kohana_Exception
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Kohana_Exception extends Kohana_Kohana_Exception {

    /**
     * Get a Response object representing the exception
     *
     * @uses    Kohana_Exception::text
     * @param   Exception  $e
     * @return  Response
     */
    public static function response(Exception $e) {
        try {
            // Get the exception information
            $class = get_class($e);
            $code = $e->getCode();
            $message = $e->getMessage();
            $file = $e->getFile();
            $line = $e->getLine();
            $trace = $e->getTrace();

            /**
             * HTTP_Exceptions are constructed in the HTTP_Exception::factory()
             * method. We need to remove that entry from the trace and overwrite
             * the variables from above.
             */
            if ($e instanceof HTTP_Exception AND $trace[0]['function'] == 'factory') {
                extract(array_shift($trace));
            }


            if ($e instanceof ErrorException) {
                /**
                 * If XDebug is installed, and this is a fatal error,
                 * use XDebug to generate the stack trace
                 */
                if (function_exists('xdebug_get_function_stack') AND $code == E_ERROR) {
                    $trace = array_slice(array_reverse(xdebug_get_function_stack()), 4);

                    foreach ($trace as & $frame) {
                        /**
                         * XDebug pre 2.1.1 doesn't currently set the call type key
                         * http://bugs.xdebug.org/view.php?id=695
                         */
                        if (!isset($frame['type'])) {
                            $frame['type'] = '??';
                        }

                        // Xdebug returns the words 'dynamic' and 'static' instead of using '->' and '::' symbols
                        if ('dynamic' === $frame['type']) {
                            $frame['type'] = '->';
                        } elseif ('static' === $frame['type']) {
                            $frame['type'] = '::';
                        }

                        // XDebug also has a different name for the parameters array
                        if (isset($frame['params']) AND ! isset($frame['args'])) {
                            $frame['args'] = $frame['params'];
                        }
                    }
                }

                if (isset(Kohana_Exception::$php_errors[$code])) {
                    // Use the human-readable error name
                    $code = Kohana_Exception::$php_errors[$code];
                }
            }

            /**
             * The stack trace becomes unmanageable inside PHPUnit.
             *
             * The error view ends up several GB in size, taking
             * serveral minutes to render.
             */
            if (defined('PHPUnit_MAIN_METHOD')) {
                $trace = array_slice($trace, 0, 2);
            }

            // Instantiate the error view.
            // Here we render the custom view error for a beautiful integration in the application
            $content = View::factory('athena/exception/debug', get_defined_vars());
            $view = View::factory('athena/base')->bind('content', $content);

            // Prepare the response object.
            $response = Response::factory();

            // Set the response status
            $response->status(($e instanceof HTTP_Exception) ? $e->getCode() : 500);

            // Set the response headers
            $response->headers('Content-Type', Kohana_Exception::$error_view_content_type . '; charset=' . Kohana::$charset);

            // Set the response body
            $response->body($view->render());
        } catch (Exception $e) {
            /**
             * Things are going badly for us, Lets try to keep things under control by
             * generating a simpler response object.
             */
            $response = Response::factory();
            $response->status(500);
            $response->headers('Content-Type', 'text/plain');
            $response->body(Kohana_Exception::text($e));
        }

        return $response;
    }

}
