<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Account
 * 
 * Used for all actions related for managing a user account,
 * Especially signup, login and signin
 * 
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Account extends Controller_Athena_Athena {

    /**
     * Given roles for the actions
     * @var array
     */
    public $assert_auth_actions = array(
        'profil' => array('login'),
    );

    /**
     * action_login
     * 
     * Simple action for auth
     */
    public function action_login() {
        $this->_check_credential();
        $this->template = View::factory('athena/account/login')
                ->bind('errors', $errors);
        
        if (HTTP_Request::POST == $this->request->method()) {

            $post = $this->request->post();
            $object = Validation::factory($this->request->post());
            
            $success = Auth::instance()->login($this->request->post('username'), $this->request->post('password'));

            if ($success) {

                $data = array(
                    'user_id' => Auth::instance()->get_user()->id,
                    'expires' => time() + 43200,
                    'user_agent' => sha1(Request::$user_agent),
                );

                // Create a new autologin token
                $token = ORM::factory('User_Token')
                        ->values($data)
                        ->create();

                // var_dump($token); // null
                // Set the autologin cookie
                Cookie::set('authautologin', $token->token, 43200);


                $this->redirect(Route::get('dashboard')->uri());
            } else {
                $object->error('username', 'login');
                $errors = $object->errors();
            }
        }
    }

    /**
     * action_logout
     * 
     * Action for logout the current logged_in user
     */
    public function action_logout() {
        Auth::instance()->logout();
        $this->redirect(Route::get('account')->uri(array('action' => 'login')));
    }

    /**
     * action_profil
     * 
     * Render the profil page of the current user
     */
    public function action_profil() {
        $user = Auth::instance()->get_user();
        if ($_POST) {
            $post = $this->request->post();
            if (isset($post['updateProfil'])) {
                
                $user->values($this->request->post());
                try{
                    $user->save();
                    Notices::add('success', '<b>Félicitations!</b> Profil mis à jour avec succès.');
                } catch(Validation_Exception $e){
                    $errorsProfil = $e->errors('models');
                }
            }


            if (isset($post['updatePassword'])) {
                $validation = Validation::factory($this->request->post())
                        ->rule('password', 'not_empty')
                        ->rule('newPassword', 'not_empty')
                        ->rule('newPassword', 'min_length', array(':value', '4'))
                        ->rule('newPassword', 'max_length', array(':value', '50'))
                        ->rule('confirmation', 'matches', array(':validation', ':field', 'newPassword'))
                ;



                if ($user->password === Auth::instance()->hash($post['password'])) {
                    if ($validation->check()) {
                        $user->password = $post['newPassword'];
                        $user->save();
                        Notices::add('success', '<b>Félicitations!</b> Mot de passe mis à jour avec succès.');
                    }
                } else {
                    $validation->error('password', 'not');
                }
                $errorsPassword = $validation->errors('athena/account');
            }
        }


        $this->_template_content(View::factory('athena/account/profil')->bind('user', $user)->bind('errorsProfil', $errorsProfil)->bind('errorsPassword', $errorsPassword)->render());
    }

    /**
     * action_signup
     * 
     * Action for handling user subscribtion,
     * Only student can register to this website,
     * Admin user should be create by a user
     * 
     */
    public function action_signup() {
        $this->_check_credential();

        $user = ORM::factory('User');

        if (HTTP_Request::POST == $this->request->method()) {
            $user->values($this->request->post());
            
            try {
                $user->validation();
                $user->save();
                $role = ORM::factory('Role')->where('name', '=', 'etudiant')->find();
                $user->add('roles', $role);

                /**
                 *  @TODO: Email confirmation création compte 
                 */

                Notices::add('success', '<b>Félicitations!</b> Votre compte a été créé avec succès, celui-ci sera activé par un administrateur.');
                $this->redirect(Route::get('login')->uri());
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('models');
            }
        }

        $parcours = ORM::factory('Parcour')
                ->order_by('name')
                ->find_all()
                ->as_array('id', 'name');

        $this->template = View::factory('athena/account/signup')
                ->bind('user', $user)
                ->bind('parcours', $parcours)
                ->bind('errors', $errors);
    }

    /**
     * _check_credential
     * 
     * Check if current user is logged_in, 
     * If logged in return to dashboard 
     * 
     */
    protected function _check_credential() {
        if (Auth::instance()->logged_in()) {
            $this->redirect(Route::get('dashboard')->uri());
        }
    }

}
