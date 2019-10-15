<?php

return [

    'accessToken' => env('ASANA_TOKEN'), // Asana Access Token

    'workspaceId' => env('ASANA_WORKSPACE_ID'),  // default Asana workspace

    'projectId' => env('ASANA_PROJECT_ID'),  // default Asana project

    'remove_default_follower' => true,  // remove the default follower, person that created the task via the ASANA_TOKEN
];
