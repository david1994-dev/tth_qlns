<?php

namespace App\Models;

class Log extends Base
{

    protected $table = 'logs';
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'table',
        'action',
        'record_id',
        'query'
    ];

    const TYPE_ACTION_SELECT = 'select';
    const TYPE_ACTION_INSERT = 'create';
    const TYPE_ACTION_UPDATE = 'update';
    const TYPE_ACTION_DELETE = 'delete';
}
