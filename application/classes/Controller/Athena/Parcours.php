<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Parcours
 * 
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Parcours extends Controller_Athena_Athena {

    /**
     * Variable used for page title;
     * 
     * @var String
     */
    public $page_title = 'Parcours';

    /**
     * Array association for actions/role(s)
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

        $parcours_count = ORM::factory('Parcour')
                ->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $parcours_count,
        ));
        $parcours = ORM::factory('Parcour')
                ->order_by('id')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $content = View::factory('athena/parcours/index')
                ->bind('parcours', $parcours)
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
        $parcour = ORM::factory('Parcour', $id);

        $specialites = ORM::factory('Specialite')
                ->order_by('name')
                ->find_all()
                ->as_array('id', 'name');

        if (HTTP_Request::POST == $this->request->method()) {
            $parcour->values($this->request->post());

            try {
                $parcour->save();
                if ($id == null) {
                    Notices::add('success', '<b>Félicitations!</b> Parcours &laquo; ' . $parcour->name . ' &raquo; ajouté avec succès.');
                } else {
                    Notices::add('success', '<b>Félicitations!</b> Parcours &laquo; ' . $parcour->name . ' &raquo; mis à jour avec succès.');
                }
                $this->redirect(Route::get('parcours')->uri());
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('models');
            }
        }



        $content = View::factory('athena/parcours/form')
                ->bind('parcour', $parcour)
                ->bind('specialites', $specialites)
                ->bind('errors', $errors)
                ->render();
        
        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('content', $content)
        );
    }

}
