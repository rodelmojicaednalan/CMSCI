<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Alter_sitedesign extends CI_Migration {

        function __construct()
        {
          parent::__construct();
          $groupdb = $this->load->database('group', TRUE);
          $this->myforge = $this->load->dbforge($groupdb, TRUE);
        }

        public function up()
        {
              $fields = array(
                'link_color' => array('type' => 'VARCHAR', 'constraint' => '50'),
                'visited_link_color' => array('type' => 'VARCHAR', 'constraint' => '50'),
                'active_link_color' => array('type' => 'VARCHAR', 'constraint' => '50'),
                'body_font' => array('type' => 'VARCHAR', 'constraint' => '50'),
                'headline_font' => array('type' => 'VARCHAR', 'constraint' => '50'),
                'published' => array('type' => 'TINYINT', 'constraint' => 1, 'default' => 0)
              );

              $this->myforge->add_column('site_design', $fields);
        }

        public function down()
        {
                $this->myforge->drop_column('site_design', 'link_color');
                $this->myforge->drop_column('site_design', 'visited_link_color');
                $this->myforge->drop_column('site_design', 'active_link_color');
                $this->myforge->drop_column('site_design', 'body_font');
                $this->myforge->drop_column('site_design', 'headline_font');
                $this->myforge->drop_column('site_design', 'published');
        }
}
