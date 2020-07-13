<?php
return [
    'consumerSecret' => env('GARMIN_SECRET', '6R5SowZAyLeCZmhvUetQN0c7KqA7lQELUhg'),
    'consumerKey' => env('GARMIN_KEY', '9ff10e3b-bb05-405b-8c5d-75a07a55d695'),
    'callbackURL' => env('GARMIN_CALLBACK_URL', 'http://127.0.0.1:8000/garmin-callback/'),
];
