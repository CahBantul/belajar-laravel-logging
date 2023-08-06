<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLoging()
    {
        Log::info("Hello Info");
        Log::warning("Hello warning");
        Log::error("Hello error");
        Log::critical("Hello critical");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info("Hello Info", ["user" => "nozami"]);
        // Log::warning("Hello warning");
        // Log::error("Hello error");
        // Log::critical("Hello critical");

        self::assertTrue(true);
    }
    
    public function testWithContext()
    {
        Log::withContext(["user" => "nozami"]);
        Log::info("Hello Info", );
        Log::warning("Hello warning");
        Log::error("Hello error");
        Log::critical("Hello critical");

        self::assertTrue(true);
    }

    public function testChannel()
    {
        $slackLogger = Log::channel("slack");
        $slackLogger->error("Hello error");
        Log::info("Hello Laravel");

        self::assertTrue(true);
    }

    public function testFileHandler()
    {
        $fileLogger = Log::channel("file");
        $fileLogger->error("Hello error");
        $fileLogger->warning("Hello warning");
        $fileLogger->critical("Hello critical");

        self::assertTrue(true);
    }
}
