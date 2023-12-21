<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Base
{
    use softDeletes;

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
