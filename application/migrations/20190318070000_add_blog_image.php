<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Group_setting_general extends CI_Migration {

        function __construct()
        {
          parent::__construct();
          $groupdb = $this->load->database('group', TRUE);
          $this->myforge = $this->load->dbforge($groupdb, TRUE);
        }

        public function up()
        {
              $fields = array(
                'blog_id' => array('type' => 'INT(11)'),
                'file_upload_id' => array('type' => 'INT(11)'),
                'caption' => array('type' => 'VARCHAR(255)'),
                'order' => array('type' => 'INT(11)'),
              );

              $this->myforge->add_field($fields);

              $this->dbforge->add_key('blog_image_id', TRUE);

              $this->dbforge->create_table('blog_images');
        }

        public function down()
        {
            $this->dbforge->drop_table('blog_images');
        }
}
