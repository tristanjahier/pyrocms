<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_setting_comments_enabled_default extends CI_Migration
{
    public function up()
    {
        if ( $this->db->where('slug', 'comments_enabled_default')->get('settings')->num_rows() == 0 )
        {
            $insert = array(
                'slug' => 'comments_enabled_default',
                'title' => 'Comments Enabled default value',
                'description' => 'Set the default duration while comments are enabled. (Used for instance in blog posts...)',
                'type' => 'select',
                'default' => '3 months',
                'value' => '3 months',
                'options' => 'no=No|1 day=1 day|1 week=1 week|2 weeks=2 weeks|1 month=1 month|3 months=3 months|always=always',
                'is_required' => 1,
                'is_gui' => 1,
                'module' => 'comments',
                'order' => 964
            );

            $this->db->insert('settings', $insert);
        }
    }

    public function down()
    {
        $this->db->where('slug', 'comments_enabled_default')->delete('settings');
    }
}
