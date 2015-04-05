<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Modules
 * 
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Modules extends Controller_Athena_Athena {

    /**
     * Variable used for page title;
     * 
     * @var String
     */
    public $page_title = 'Modules';

    /**
     * Association for action/role(s)
     * @var array 
     */
    public $assert_auth_actions = array(
        'index' => array('admin'),
        'form' => array('admin'),
    );

    /**
     * action_index
     */
    public function action_index() {

        $modules_count = ORM::factory('Module')
                ->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $modules_count,
        ));
        $modules = ORM::factory('Module')
                ->order_by('id')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $content = View::factory('athena/modules/index')
                ->bind('modules', $modules)
                ->bind('pagination', $pagination)
                ->render();
        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('content', $content)
        );
    }

    /**
     * action_form
     * 
     * For handling create and edit
     */
    public function action_form() {

        $id = $this->request->param('id');
        $module = ORM::factory('Module', $id);

        if (HTTP_Request::POST == $this->request->method()) {
            $module->values($this->request->post());

            try {
                $module->save();
                if ($id == null) {
                    Notices::add('success', '<b>Félicitations!</b> Module &laquo; ' . $module->name . ' &raquo; ajouté avec succès.');
                } else {
                    Notices::add('success', '<b>Félicitations!</b> Module &laquo; ' . $module->name . ' &raquo; mis à jour avec succès.');
                }
                $this->redirect(Route::get('modules')->uri());
            } catch (ORM_Validation_Exception $e) {

                $errors = $e->errors('models');
            }
        }

        $periodes = ORM::factory('Periode')->order_by('name')->find_all()->as_array('id', 'name');

        $content = View::factory('athena/modules/form')
                ->bind('module', $module)
                ->bind('periodes', $periodes)
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
     * 
     * For handling safe remove
     * 
     * @todo: implements the method
     */
    public function action_remove() {
        
    }

}
