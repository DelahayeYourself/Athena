<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Groupes
 *
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Groupes extends Controller_Athena_Athena {

    /**
     * Variable used for page title;
     * 
     * @var String
     */
    public $page_title = 'Groupes';

    /**
     * Array association for action/role(s)
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

        $groupes_count = ORM::factory('Groupe')
                ->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $groupes_count,
        ));
        $groupes = ORM::factory('Groupe')
                ->order_by('id')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();


        $content = View::factory('athena/groupes/index')
                ->bind('groupes', $groupes)
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
     * 
     */
    public function action_form() {
        $id = $this->request->param('id');
        $groupe = ORM::factory('Groupe', $id);
        $opts_parcours = $groupe->parcours->find_all()->as_array('id', 'id');

        if (HTTP_Request::POST == $this->request->method()) {
            $groupe->values($this->request->post());
            $opts_parcours = ($this->request->post('parcours') != null) ? $this->request->post('parcours') : array();
            try {
                $groupe->save();
                $groupe->setParcours($opts_parcours);

                if ($id == null) {
                    Notices::add('success', '<b>Félicitations!</b> Groupe &laquo; ' . $groupe . ' &raquo; ajouté avec succès.');
                } else {
                    Notices::add('success', '<b>Félicitations!</b> Groupe &laquo; ' . $groupe . ' &raquo; mis à jour avec succès.');
                }
                $this->redirect(Route::get('groupes')->uri());
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('models');
            }
        }

        $options_mandatory = array(0 => __('No'), 1 => __('Yes'));

        $parcours = ORM::factory('Parcour')
                ->order_by('name')
                ->find_all()
                ->as_array('id', 'name');

        $modules = ORM::factory('Module')
                ->order_by('name')
                ->find_all()
                ->as_array('id', 'name');

        $content = View::factory('athena/groupes/form')
                ->bind('groupe', $groupe)
                ->bind('options_mandatory', $options_mandatory)
                ->bind('modules', $modules)
                ->bind('parcours', $parcours)
                ->bind('opts_parcours', $opts_parcours)
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
