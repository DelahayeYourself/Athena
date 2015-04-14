<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Users
 * 
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Users extends Controller_Athena_Athena {

    /**
     * Variable used for page title;
     * 
     * @var String
     */
    public $page_title = 'Users';

    /**
     * Array Association for actions/roles
     * @var array
     */
    public $assert_auth_actions = array(
        'index' => array('admin'),
        'lists' => array('admin'),
        'add' => array('admin'),
        'view' => array('admin'),
        'update' => array('admin'),
    );

    /**
     * action_lists
     * 
     * List all admin or student user in the athena web application
     */
    public function action_lists() {
        $role_name = $this->request->param('id');
        $letter = $this->request->query('letter');
        if ($role_name == null) {
            $this->redirect(Route::get('dashboard')->uri());
        }
        $role = ORM::factory('Role')
                ->where('name', '=', $role_name)
                ->find();


        $users_count = ($letter == null) ? $role->users->count_all() : $role->users->where('name', 'like', $letter . '%')->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $users_count,
        ));

        $users = $role
                ->users;
        if ($letter != null) {
            $users = $users->where('name', 'like', $letter . '%');
        }
        $users = $users->order_by('name')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $arr_alphas = Athena_String::rangeFromAToZ();

        $content = View::factory('athena/users/lists')
                ->bind('role_name', $role_name)
                ->bind('users', $users)
                ->bind('pagination', $pagination)
                ->render();

        $pre_content = View::factory('athena/users/_list_alphas')
                ->bind('alphas', $arr_alphas)
                ->render();
        $this->page_title = 'Users.lists.' . $role_name;

        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('pre_content', $pre_content)
                        ->bind('content', $content)
        );
    }

    /**
     * action_unlock
     * 
     * List all users that don't have permission to signin into the application
     */
    public function action_unlock() {

        if ($this->request->method() == HTTP_Request::POST) {
            $users_id = $this->request->post('users_id');

            if ($this->request->post('update') != null) {
                if ($users_id != null && count($users_id) > 0) {
                    Model_User::activateArrayAccountId($users_id);
                    Notices::add('success', '<strong>Félicitations!</strong> ' . count($users_id) . ' compte(s) activé(s) avec succès.');
                }
            }

            if ($this->request->post('remove') != null) {
                if ($users_id != null && count($users_id) > 0) {
                    Model_User::removeArrayAccountId($users_id);
                    Notices::add('success', '<strong>Félicitations!</strong> ' . count($users_id) . ' compte(s) activé(s) avec succès.');
                }
            }
        }

        $active_users_ids = ORM::factory('Role')
                ->where('name', '=', 'login')
                ->find()
                ->users
                ->find_all()
                ->as_array('id', 'id');

        $users_count = ORM::factory('User')
                ->where('parcour_id', '!=', null)
                ->and_where('id', 'NOT IN', $active_users_ids)
                ->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $users_count,
        ));

        $users = ORM::factory('User')
                ->where('parcour_id', '!=', null)
                ->and_where('id', 'NOT IN', $active_users_ids)
                ->order_by('name')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();



        $content = View::factory('athena/users/lists_validation')
                ->bind('role_name', $role_name)
                ->bind('users', $users)
                ->bind('pagination', $pagination)
                ->render();

        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('content', $content)
        );
    }

    /**
     * action_index
     * 
     * list all user, used for debug purpose,
     * Should be removed in production
     */
    public function action_index() {

        $page_num = $this->request->param('page', 1);

        $users_count = ORM::factory('User')
                ->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $users_count,
        ));

        $users = ORM::factory('User')
                ->order_by('name')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $content = View::factory('athena/users/index')
                ->bind('users', $users)
                ->bind('pagination', $pagination)
                ->render();

        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('content', $content)
        );
    }

    /**
     * action_add
     */
    public function action_add() {
        $roles = DB::select()
                ->from('roles')
                ->order_by('name')
                ->execute()
                ->as_array('id', 'name');
        $user = ORM::factory('User');
        $rolesUser = array();

        if (HTTP_Request::POST == $this->request->method()) {
            $user->values($this->request->post());

            if ($this->request->post('user_roles') != null)
                $rolesUser = $this->request->post('user_roles');

            try {
                $user->save();
                if ($this->request->post('user_roles') != null) {
                    foreach ($this->request->post('user_roles') as $role_id) {
                        $user->add('roles', ORM::factory('Role', $role_id));
                    }
                }
                $user->save();
                Notices::add('success', '<b>Félicitations!</b> Compte utilisateur ajouté avec succès.');
                $this->redirect(Route::get('users')->uri());
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('models');
            }
        }

        $content = View::factory('athena/users/form')
                ->bind('user', $user)
                ->bind('rolesUser', $rolesUser)
                ->bind('roles', $roles)
                ->bind('errors', $errors)
                ->render();

        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('content', $content)
        );
    }

    /**
     * action_view
     */
    public function action_view() {
        $id = $this->request->param('id');
        $user = ORM::factory('User', $id);

        $content = View::factory('athena/users/view')
                ->bind('user', $user)
                ->render();

        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('content', $content)
        );
    }

    /**
     * action_update
     */
    public function action_update() {
        $user = ORM::factory('User', $this->request->param('id'));

        /**
         * validation objet used for handling a new password set
         */
        $validation_password = Validation::factory($this->request->post())
                ->rule('password', 'not_empty')
                ->rule('password', 'min_length', array(':value', '4'))
                ->rule('password', 'max_length', array(':value', '50'))
        ;

        /**
         * Handle post
         */
        if ($_POST) {

            /**
             * if it's an update of the user's password
             */
            if (isset($_POST['updatePassword'])) {
                $user->values($this->request->post());

                if ($validation_password->check()) {
                    $user->save();
                    Notices::add('success', '<b>Félicitations!</b> Mot de passe de  ' . $user->firstname . ' ' . $user->name . ' mis à jour avec succès.');

                    $this->redirect(Route::get('users')->uri());
                }
            }

            /**
             * Here we update the profil
             */
            if (isset($_POST['updateProfil'])) {

                $user->values($this->request->post());

                try {
                    $user->clearRoles(array('login'));
                    $user->setRolesByAccountType($this->request->post('account_type'));

                    $user->save();
                    Notices::add('success', '<b>Félicitations!</b> Compte utilisateur mis à jour avec succès.');
                    $this->redirect(Route::get('users')->uri());
                } catch (ORM_Validation_Exception $e) {
                    $errors = $e->errors('models');
                }

                $errors = $validation->errors('athena/account');
            }
        }

        $account_type = null;
        if ($user->hasRoleByRoleName('etudiant')) {
            $account_type = 0;
        }
        if ($user->hasRoleByRoleName('admin')) {
            $account_type = 1;
        }

        $account_types = Model_User::arrayAccountTypesI18n();
        $parcours = ORM::factory('Parcour')
                ->order_by('name')
                ->find_all()
                ->as_array('id', 'name');

        $content = View::factory('athena/users/form')
                ->bind('user', $user)
                ->bind('parcours', $parcours)
                ->bind('account_types', $account_types)
                ->bind('account_type', $account_type)
                ->bind('errors', $errors)
                ->render();

        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('content', $content)
        );
    }

    /**
     * action_delete
     */
    public function action_delete() {
        $id = $this->request->param('id');
        $user = ORM::factory('User', $id);
        $user->delete();

        Notices::add('success', '<b>Félicitations!</b> Compte utilisateur supprimé avec succès.');
        $this->redirect(Route::get('users')->uri());
    }

    /**
     * action_toggleactive
     * 
     * Action that toggle the login role for the given user,
     * To handle Activate or deactivate user account button
     */
    public function action_toggleactive() {
        $id = $this->request->param('id');
        $user = ORM::factory('User', $id);
        $role = ORM::factory('Role')->where('name', '=', 'login')->find();

        if ($user->has('roles', $role)) {
            $user->remove('roles', $role);
            Notices::add('success', '<b>Félicitations!</b> Compte utilisateur de &laquo; ' . $user . '&raquo; désactivé avec succès.');
        } else {
            $user->add('roles', $role);
            Notices::add('success', '<b>Félicitations!</b> Compte utilisateur de &laquo; ' . $user . '&raquo; activé avec succès.');
        }

        $this->redirect($this->request->referrer());
    }

    /**
     * Simple method for redirecting to correct action of users.
     * 
     * @param int $account_type
     */
    protected function redirectToCorrectAction($account_type) {
        switch ($account_type) {
            case 0: $this->redirect(Route::get('users')->uri(array('action' => 'lists', 'id' => 'etudiant')));
                break;
            case 1: $this->redirect(Route::get('users')->uri(array('action' => 'lists', 'id' => 'admin')));
                break;
            default : $this->redirect(Route::get('users')->uri(array('action' => 'lists', 'id' => 'etudiant')));
                break;
        }
    }

}
