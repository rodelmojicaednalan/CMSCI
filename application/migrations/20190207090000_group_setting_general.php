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
                'group_settings_visibility' => array('type' => 'tinyint'),
                'group_settings_og_title' => array('type' => 'text'),
                'group_settings_og_url' => array('type' => 'text'),
                'group_settings_og_image' => array('type' => 'text'),
                'group_settings_twitter_username' => array('type' => 'text'),
                'group_settings_twitter_author_username' => array('type' => 'text'),
                'group_settings_twitter_image' => array('type' => 'text'),
              );

              $this->myforge->add_column('group_settings', $fields);
        }

        public function down()
        {
                $this->myforge->drop_column('group_settings', 'group_settings_visibility');
                $this->myforge->drop_column('group_settings', 'group_settings_og_title');
                $this->myforge->drop_column('group_settings', 'group_settings_og_url');
                $this->myforge->drop_column('group_settings', 'group_settings_og_image');
                $this->myforge->drop_column('group_settings', 'group_settings_twitter_username');
                $this->myforge->drop_column('group_settings', 'group_settings_twitter_author_username');
                $this->myforge->drop_column('group_settings', 'group_settings_twitter_image');
        }
}
