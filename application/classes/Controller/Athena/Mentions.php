<?php

defined('SYSPATH') or die('No direct script access.');

/**
 * Controller_Athena_Mentions
 *
 * @extends Controller_Athena_Athena
 * @author Samy Delahaye <samy.delahaye@gmail.com>
 */
class Controller_Athena_Mentions extends Controller_Athena_Athena {

    /**
     * Variable used for page title;
     * 
     * @var String
     */
    public $page_title = 'Mentions';

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

        $mentions_count = ORM::factory('Mention')
                ->count_all();

        $pagination = Pagination::factory(array(
                    'items_per_page' => 10,
                    'total_items' => $mentions_count,
        ));
        $mentions = ORM::factory('Mention')
                ->order_by('id')
                ->limit($pagination->items_per_page)
                ->offset($pagination->offset)
                ->find_all();


        $content = View::factory('athena/mentions/index')
                ->bind('mentions', $mentions)
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
        $mention = ORM::factory('Mention', $id);


        if (HTTP_Request::POST == $this->request->method()) {
            $mention->values($this->request->post());

            try {
                $mention->save();
                if ($id == null) {
                    Notices::add('success', '<b>Félicitations!</b> Mention &laquo; ' . $mention->name . ' &raquo; ajouté avec succès.');
                } else {
                    Notices::add('success', '<b>Félicitations!</b> Mention &laquo; ' . $mention->name . ' &raquo; mis à jour avec succès.');
                }
                $this->redirect(Route::get('mentions')->uri());
            } catch (ORM_Validation_Exception $e) {

                $errors = $e->errors('models');
            }
        }


        $content = View::factory('athena/mentions/form')
                ->bind('mention', $mention)
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
