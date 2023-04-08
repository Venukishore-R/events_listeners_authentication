<?php


	function seedUser()
	{
		DB::table('users')->delete();

        $users = [
        	[
        		'name'=>'Sarvesh',
            	'email'=>'saro@gmail.com',
            	'password'=>'12345678',
        	],
        	[
        		'name'=>'Venukishore',
            	'email'=>'venuvk0304@gmail.com',
            	'password'=>'12345678',	
        	]
        ];

		DB::table('users')->insert($users);

	}