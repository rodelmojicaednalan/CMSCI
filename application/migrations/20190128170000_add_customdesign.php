<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_customdesign extends CI_Migration {

        function __construct()
        {
          parent::__construct();
          $groupdb = $this->load->database('group', TRUE);
          $this->myforge = $this->load->dbforge($groupdb, TRUE);
        }

        public function up()
        {
              $fields = array(
                'custom_design_style' => array('type' => 'LONGTEXT'),
                'custom_design_published' => array('type' => 'TINYINT', 'constraint' => 1, 'default' => 0)
              );

              $this->myforge->add_column('site_design', $fields);
        }

        public function down()
        {
                $this->myforge->drop_column('site_design', 'custom_design_style');
                $this->myforge->drop_column('site_design', 'custom_design_published');
        }
}
