<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mautic {
    //$CI =& get_instance();
    //$CI->load->database();
    var $ci;

    private $username = "";
    private $password = "";
    private $hostname = "";
    private $dbname = '';
    private $admin_group_id = '';
    private $admin_group_title = '';
    private $admin_group_name = '';

    public function __construct($params)
    {

        $this->ci =& get_instance();

        $open_emm_url      = $this->ci->config->item('MAUTIC_DATABASE_URL'.'_'.strtoupper(ENV));
        $open_emm_username = $this->ci->config->item('MAUTIC_USERNAME'.'_'.strtoupper(ENV));
        $open_emm_password = $this->ci->config->item('MAUTIC_PASSWORD'.'_'.strtoupper(ENV));
        $open_emm_db       = $this->ci->config->item('MAUTIC_DB'.'_'.strtoupper(ENV)).'_'.$params['admin_group_id'];

        // Do something with $params
        $this->username = $params['username'];
        $this->password = $params['password'];
        $this->hostname = $params['hostname'];
        $this->dbname = $params['dbname'];
        $this->admin_group_id = $params['admin_group_id'];
        $this->admin_group_title = $params['admin_group_title'];


        if (isset($params['admin_group_name']))
            $this->admin_group_name = $params['admin_group_name'];
    }

    function is_existing($group_id){
        $dbhandle = new mysqli($this->hostname, $this->username, $this->password)
          or die("Unable to connect to MySQL");

        $exist = mysqli_select_db($dbhandle, $this->dbname);
        mysqli_close($dbhandle);
        return $exist;
    }

    function create_new_database($group_id, $group_title){
        $dbhandle = new mysqli($this->hostname, $this->username, $this->password)
          or die("Unable to connect to MySQL");

        //create database here
        shell_exec("mysqladmin create ".$this->ci->config->item('MAUTIC_DB'.'_'.strtoupper(ENV)).'_'.$group_id." -u ".$this->ci->config->item('MAUTIC_USERNAME'.'_'.strtoupper(ENV))." -p".$this->ci->config->item('MAUTIC_PASSWORD'.'_'.strtoupper(ENV))." -h ".$this->ci->config->item('MAUTIC_DATABASE_URL'.'_'.strtoupper(ENV)));
        shell_exec("mysql ".$this->ci->config->item('MAUTIC_DB'.'_'.strtoupper(ENV)).'_'.$group_id." < ".$this->ci->config->item('MAUTIC_DB_DUMP'.'_'.strtoupper(ENV))." -u ".$this->ci->config->item('MAUTIC_USERNAME'.'_'.strtoupper(ENV))." -p".$this->ci->config->item('MAUTIC_PASSWORD'.'_'.strtoupper(ENV))." -h ".$this->ci->config->item('MAUTIC_DATABASE_URL'.'_'.strtoupper(ENV)));

        //setup default themes
        $resp = file_get_contents("http://".$this->ci->config->item('MAUTIC_DATABASE_URL'.'_'.strtoupper(ENV))."/defaultthemes.php?groupid=".$group_id);

        return true;
    }

    function get_mailing_list($group_id){
        $dbhandle = new mysqli($this->hostname, $this->username, $this->password)
          or die("Unable to connect to MySQL");

        mysqli_select_db($dbhandle, $this->dbname);
        $query = "select * from lead_lists where is_published = 1";
        $result = mysqli_query($query);


        $rows = array();
        if(@mysqli_num_rows($result))
        {
            while ($row = mysqli_fetch_assoc($result)) {
                $mailing_list_id = $row["id"];
                $shortname = $row["name"];

                $o = new stdClass();
                $o->mailinglist_id = $mailing_list_id;
                $o->shortname = $shortname;
                $rows[] = $o;
            }
        }
        //mysqli_free_result($result);
        mysqli_close($dbhandle);
        return $rows;
    }

    function insert_subscription($group_id, $email, $mailinglist_id, $bindonly = false, $type = 'W', $firstname = '', $lastname = ''){
        $dbhandle = new mysqli($this->hostname, $this->username, $this->password)
              or die("Unable to connect to MySQL");
            //echo "Connected to MySQL<br>";
        mysqli_select_db($dbhandle, $this->dbname);

        if($bindonly == false){
            $query = "select * from `leads` where email = '".$email."';";
            $result = mysqli_query($query, $dbhandle);

            if(@mysqli_num_rows($result))
            {
                return 0;
            }

            $query = "insert into `leads` (email, is_published, date_added, date_identified) values ('".$email."',1, now(), now());";
            mysqli_query($query, $dbhandle);
            $customer_id = mysqli_insert_id($dbhandle);
        }else{
            $query = "select * from `leads` where email = '".$email."';";
            $result = mysqli_query($query, $dbhandle);

            if(@mysqli_num_rows($result))
            {
                $row = mysqli_fetch_assoc($result);

                $customer_id = $row['id'];
            }
            else{
                $query = "insert into `leads` (email, is_published, date_added, date_identified, firstname, lastname) values ('".$email."',1, now(), now(), '".$firstname."', '".$lastname."');";
                mysqli_query($query, $dbhandle);
                $customer_id = mysqli_insert_id($dbhandle);
            }
        }

        $query = "select * from `lead_lists_leads` where lead_id = ".$customer_id." and leadlist_id = ".$mailinglist_id.";";
        $result = mysqli_query($query, $dbhandle);

        if(@mysqli_num_rows($result))
        {

        }
        else{
            $query = "insert into `lead_lists_leads` (leadlist_id, lead_id, date_added, manually_removed, manually_added) values (".$mailinglist_id.",".$customer_id.", now(), 0, 1);";
            mysqli_query($query, $dbhandle);
        }

        mysqli_close($dbhandle);

        return $customer_id;
    }
}
