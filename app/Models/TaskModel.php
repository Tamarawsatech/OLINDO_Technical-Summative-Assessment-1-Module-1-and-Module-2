<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class TaskModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $returnType = 'array';
    protected $allowedFields = ['title', 'status', 'task_date', 'created_at'];

    public function getTodayTasks(): array
    {
        return $this->where('task_date', Time::now('Asia/Manila')->toDateString())
            ->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll();
    }

    public function getAllTasks(): array
    {
        return $this->orderBy('task_date', 'ASC')->orderBy('id', 'ASC')->findAll();
    }
}
