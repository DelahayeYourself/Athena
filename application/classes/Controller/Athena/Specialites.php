<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Specialites
 * 
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Specialites extends Controller_Athena_Athena {

    /**
     * Variable used for page title;
     * 
     * @var String
     */
    public $page_title = 'Specialites';

    /**
     * Array association for actions/roles
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

        $specialites_count = ORM::factory('Specialite')
                ->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $specialites_count,
        ));
        $specialites = ORM::factory('Specialite')
                ->order_by('id')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();

        $content = View::factory('athena/specialites/index')
                ->bind('specialites', $specialites)
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
        $specialite = ORM::factory('Specialite', $id);

        $mentions = ORM::factory('Mention')
                ->order_by('name')
                ->find_all()
                ->as_array('id', 'name');

        if (HTTP_Request::POST == $this->request->method()) {
            $specialite->values($this->request->post());

            try {
                $specialite->save();
                if ($id == null) {
                    Notices::add('success', '<b>Félicitations!</b> Spécialité &laquo; ' . $specialite->name . ' &raquo; ajouté avec succès.');
                } else {
                    Notices::add('success', '<b>Félicitations!</b> Spécialité &laquo; ' . $specialite->name . ' &raquo; mis à jour avec succès.');
                }
                $this->redirect(Route::get('specialites')->uri());
            } catch (ORM_Validation_Exception $e) {
                $errors = $e->errors('models');
            }
        }


        $content = View::factory('athena/specialites/form')
                ->bind('specialite', $specialite)
                ->bind('mentions', $mentions)
                ->bind('errors', $errors)
                ->render();

        $this->_template_content(
                View::factory('athena/_shared/master_admin')
                        ->bind('title', $this->page_title)
                        ->bind('content', $content)
        );
    }

}
