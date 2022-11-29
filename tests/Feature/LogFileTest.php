<?php

use Tests\TestCase;

class LogFileTest extends TestCase
{

    public function test_log_file ()
    {
        // test homepage relaod
        $response = $this->get('/');

        $response->assertOk();
    }


}