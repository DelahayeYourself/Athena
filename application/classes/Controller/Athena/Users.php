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

        $id = $this->request->param('id');
        $user = ORM::factory('User', $id);

        $roles = DB::select()
                ->from('roles')
                ->order_by('name')
                ->execute()
                ->as_array('id', 'name');

        $rolesUser = array();
        foreach ($user->roles->find_all() as $role) {
            array_push($rolesUser, $role->id);
        }


        $validation = Validation::factory($this->request->post())
                ->rule('name', 'not_empty')
                ->rule('name', 'min_length', array(':value', '3'))
                ->rule('name', 'max_length', array(':value', '50'))
                ->rule('firstname', 'not_empty')
                ->rule('firstname', 'min_length', array(':value', '3'))
                ->rule('firstname', 'max_length', array(':value', '50'))
                ->rule('username', 'not_empty')
                ->rule('username', 'min_length', array(':value', '3'))
                ->rule('username', 'max_length', array(':value', '50'))
                ->rule('email', 'not_empty')
                ->rule('email', 'email')
        ;

        $validation_password = Validation::factory($this->request->post())
                ->rule('password', 'not_empty')
                ->rule('password', 'min_length', array(':value', '4'))
                ->rule('password', 'max_length', array(':value', '50'))
        ;

        // Handle post 
        if ($_POST) {

            if (isset($_POST['updatePassword'])) {
                $user->values($this->request->post());

                if ($validation_password->check()) {
                    $user->save();
                    Notices::add('success', '<b>Félicitations!</b> Mot de passe de  ' . $user->firstname . ' ' . $user->name . ' mis à jour avec succès.');
                    $this->redirect(Route::get('users')->uri());
                }
            }

            if (isset($_POST['updateProfil'])) {

                $user->values($this->request->post());
                if ($this->request->post('user_roles') != null)
                    $rolesUser = $this->request->post('user_roles');

                if ($validation->check()) {
                    //$user->save();

                    foreach ($user->roles->find_all() as $role) {
                        $user->remove('roles', $role);
                    }

                    if ($this->request->post('user_roles') != null) {
                        foreach ($this->request->post('user_roles') as $role_id) {
                            $user->add('roles', ORM::factory('Role', $role_id));
                        }
                    }
                    $user->save();
                    Notices::add('success', '<b>Félicitations!</b> Compte utilisateur mis à jour avec succès.');
                    $this->redirect(Route::get('users')->uri());
                }

                $errors = $validation->errors('athena/account');
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
     * action_delete
     */
    public function action_delete() {
        $id = $this->request->param('id');
        $user = ORM::factory('User', $id);
        $user_admin = ORM::factory('role')
                        ->where('name', '=', 'admin')
                        ->find()
                        ->users
                        ->order_by('name')
                        ->find_all()[0];

        $user->delete();

        Notices::add('success', '<b>Félicitations!</b> Compte utilisateur supprimé avec succès.');
        $this->redirect(Route::get('users')->uri());
    }

}
