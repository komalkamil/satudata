<?php

namespace App\Controllers\Backend;

use App\Controllers\BaseController;
use App\Models\ModelLogsdata;

class Logsdata extends  BaseController
{
    protected $ModelLogsdata;
    public function __construct()
    {
        session();
        helper(['form', 'url']);
        $this->ModelLogsdata = new ModelLogsdata();
    }
    public function index($id_data)
    {
        $logs = $this->ModelLogsdata->select('log_data.*, data.nm_data, status.nama_status')
            ->join('data', 'data.id = log_data.id_data', 'inner')
            ->join('status', 'data.id_status = status.id_status', 'inner')
            ->where('log_data.id_data', "$id_data")
            ->findAll();
        $data = [
            'title' => 'Logs data',
            'header' => 'Logs data',
            'logs' => $logs,
            'userData' => session()->get()

        ];
        return view('backend/datas/logdata', $data);
    }
}
