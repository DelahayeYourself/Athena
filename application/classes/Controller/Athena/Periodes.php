<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athenna_Periodes
 * 
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Periodes extends Controller_Athena_Athena {

    /**
     * Variable used for page title;
     * 
     * @var String
     */
    public $page_title = 'Periodes';

    /**
     * Array association for actions/roles
     * 
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

        $periodes_count = ORM::factory('Periode')
                ->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $periodes_count
        ));
        $periodes = ORM::factory('Periode')
                ->order_by('id')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $content = View::factory('athena/periodes/index')
                ->bind('periodes', $periodes)
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
     * For handling create & edit
     */
    public function action_form() {
        $id = $this->request->param('id');
        $periode = ORM::factory('Periode', $id);

        if (HTTP_Request::POST == $this->request->method()) {
            $periode->values($this->request->post());

            try {
                $periode->save();
                if ($id == null) {
                    Notices::add('success', '<b>Félicitations!</b> Période &laquo; ' . $periode->name . ' &raquo; ajouté avec succès.');
                } else {
                    Notices::add('success', '<b>Félicitations!</b> Période &laquo; ' . $periode->name . ' &raquo; mise à jour avec succès.');
                }
                $this->redirect(Route::get('periodes')->uri());
            } catch (ORM_Validation_Exception $e) {

                $errors = $e->errors('models');
            }
        }

        $content = View::factory('athena/periodes/form')
                ->bind('periode', $periode)
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
