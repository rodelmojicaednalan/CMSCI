<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Group_setting_tracking_codes extends CI_Migration {

        function __construct()
        {
          parent::__construct();
          $groupdb = $this->load->database('group', TRUE);
          $this->myforge = $this->load->dbforge($groupdb, TRUE);
        }

        public function up()
        {
              $fields = array(
                'group_settings_tracking_code_fbpixel' => array('type' => 'text'),
                'group_settings_tracking_code_googleanalytics' => array('type' => 'text'),
                'group_settings_tracking_code_googletagmanager' => array('type' => 'text'),
                'group_settings_tracking_code_pinterest' => array('type' => 'text'),
                'group_settings_tracking_code_twitter' => array('type' => 'text'),
              );

              $this->myforge->add_column('group_settings', $fields);
        }

        public function down()
        {
                $this->myforge->drop_column('group_settings', 'group_settings_tracking_code_fbpixel');
                $this->myforge->drop_column('group_settings', 'group_settings_tracking_code_googleanalytics');
                $this->myforge->drop_column('group_settings', 'group_settings_tracking_code_googletagmanager');
                $this->myforge->drop_column('group_settings', 'group_settings_tracking_code_pinterest');
                $this->myforge->drop_column('group_settings', 'group_settings_tracking_code_twitter');
        }
}
