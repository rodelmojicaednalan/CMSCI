<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Reset_password_fields extends CI_Migration {

        function __construct()
        {
          parent::__construct();
          $groupdb = $this->load->database('group', TRUE);
          $this->myforge = $this->load->dbforge($groupdb, TRUE);
        }

        public function up()
        {
              $fields = array(
                'user_reset_password_key' => array('type' => 'VARCHAR(64)'),
                'user_reset_password_expiration' => array('type' => 'DATETIME')
              );

              $this->myforge->add_column('user', $fields);
        }

        public function down()
        {
                $this->myforge->drop_column('user', 'user_reset_password_key');
                $this->myforge->drop_column('user', 'user_reset_password_expiration');
        }
}
