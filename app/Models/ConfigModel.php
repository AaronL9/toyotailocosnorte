<?php

namespace App\Models;

use CodeIgniter\Model;

class ConfigModel extends Model
{
    protected $table            = 'configs';
    protected $primaryKey       = 'config_no';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'config_code',
        'config_label',
        'config_title',
        'config_option',
        'config_value',
        'config_order',
        'config_isshow',
        'config_inactive',
        'config_delete'
    ];

    public function getConfigs()
    {
        $sql = <<<SQL
            SELECT 
                config_no AS id,
                config_code AS code,
                config_title AS title,
                config_value AS value
            FROM configs
            SQL;

        $results = $this->db->query($sql)->getResultObject();

        $data = [];
        foreach ($results as $row) {
            $data[$row->code] = $row;
        }

        return $data;
    }

    public function getContacts()
    {
        $sql = <<<SQL
            SELECT
                config_no AS id,
                config_code AS code,
                config_title AS title,
                config_value AS value
            FROM configs
            WHERE config_label = "Department Contact Numbers";
            SQL;

        return $this->db->query($sql)->getResultObject();
    }
}
