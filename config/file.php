<?php

return [
    'acceptable' => [
        'file'  => [
            'application/pdf'          => 'pdf',
            'application/octet-stream' => '',
            'application/zip'          => 'zip',
            'text/plain'               => 'txt',
            'application/msword' => 'doc',
            'application/vnd.ms-excel' => 'xls',
            'text/csv' => 'csv',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' => 'xlsx',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.template' => 'docx',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document' => 'doc',
        ],

        'image' => [
            'image/png'  => 'png',
            'image/jpeg' => 'jpg',
            'image/gif'  => 'gif',
        ],
    ],
];
