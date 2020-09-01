<?php

$source_url = './../../../../data/auth.json';
$auth_data = json_decode( file_get_contents( $source_url ), true );

$username = $auth_data['auth']['stats']['id'];
$password = password_hash( $auth_data['auth']['stats']['pw'], 1 );
