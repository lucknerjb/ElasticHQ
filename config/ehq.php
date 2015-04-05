<?php

return [
   'perms' => [
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
   ],

   'group_perms' => [
      'admin' => [
         'ALL'
      ],
      'read-only' => [
         'CLUSTERS.LIST',
         'INDICES.LIST',
         'SETTINGS.LIST',
         'REST.CUSTOM_QUERY.GET',
         'REST.RAW_API.CLUSTER.HEALTH',
         'REST.RAW_API.CLUSTER.STATE',
         'REST.RAW_API.CLUSTER.SETTINGS',
         'REST.RAW_API.CLUSTER.PING',
         'REST.RAW_API.NODES.INFO',
         'REST.RAW_API.NODES.STATS',
         'REST.RAW_API.NODES.CPU_THREADS',
         'REST.RAW_API.NODES.WAIT_THREADS',
         'REST.RAW_API.NODES.BLOCK_THREADS',
         'REST.RAW_API.INDICES.ALIASES',
         'REST.RAW_API.INDICES.SETTINGS',
         'REST.RAW_API.INDICES.STATS',
         'REST.RAW_API.INDICES.STATUS',
         'REST.RAW_API.INDICES.SEGMENTS',
         'REST.RAW_API.INDICES.MAPPINGS'
      ]
   ]
];
