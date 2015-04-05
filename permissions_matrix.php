<?php

$permissions = [
   'CLUSTERS' => [
      'LIST',
      'MANAGE'
   ],
   'INDICES' => [
      'LIST',
      'MANAGE'
   ],
   'SETTINGS' => [
      'LIST',
      'MANAGE'
   ],
   'SECURITY' => [
      'GROUPS' => [
         'LIST',
         'MANAGE'
      ],
      'USERS' => [
         'LIST',
         'MANAGE'
      ],
      'PERMISSIONS' => [
         'LIST',
         'MANAGE'
      ]
   ],
   'REST' => [
      'CUSTOM_QUERY' => [
         'GET',
         'POST',
         'PUT'
      ],
      'RAW_API' => [
         'CLUSTER' => [
            'HEALTH',
            'STATE',
            'SETTINGS',
            'PING'
         ],
         'NODES' => [
            'INFO',
            'STATS',
            'CPU_THREADS',
            'WAIT_THREADS',
            'BLOCK_THREADS'
         ],
         'INDICES' => [
            'ALIASES',
            'SETTINGS',
            'STATS',
            'STATUS',
            'SEGMENTS',
            'MAPPINGS',
            'REFRESH',
            'FLUSH',
            'OPTIMIZE',
            'CLEAR_CACHE'
         ],
      ]
   ]
];
