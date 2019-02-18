<?php

namespace Tests;

use Faker\Factory;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions;

    protected $faker;
    public function setUp() {
        parent::setUp();
        $this->artisan('migrate:fresh');
        $this->artisan('db:seed');
        $this->faker = Factory::create();
    }
}
