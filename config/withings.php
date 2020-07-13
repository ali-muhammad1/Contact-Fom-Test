<?php
return [
    'client_ID' => env('WITHINGS_CLIENT_ID', '36c20423abb3a3d516ba0665e84df8835cbf4a1192a8bc946e275e1c65badf3f'),
    'consumerSecret' => env('WITHINGS_CONSUMER_SECRET', 'a77a3cde2f15bf2a6b4fc4adf189b7de3e4ba5f7765cf41d98c98ede1cb6ad1e'),
    'callbackURL' => env('WITHINGS_CALLBACK_URL', 'https://data.gettespo.com/withingscallback'),
];
