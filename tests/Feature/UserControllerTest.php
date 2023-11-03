<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_get_users()
    {
        User::query()->truncate();
        User::factory()->count(15)->create();
        $response = $this->get('users');
        $response->assertOk();
        $this->assertTrue(count($response->baseResponse->getOriginalContent()['result']) === 15);
    }

    public function test_get_users_with_name_filter()
    {
        User::query()->truncate();
        User::factory()->create(['name' => 'micheal']);
        User::factory()->create(['name' => 'michella']);
        User::factory()->create(['name' => 'david']);
        User::factory()->create(['name' => 'ali']);
        $response = $this->get('users?name=mich');
        $response->assertOk();
        $this->assertTrue(count($response->baseResponse->getOriginalContent()['result']) === 2);
    }

    public function test_get_users_with_family_filter()
    {
        User::query()->truncate();
        User::factory()->create(['family' => 'hume']);
        User::factory()->create(['family' => 'russel']);
        User::factory()->create(['family' => 'rivers']);
        User::factory()->create(['family' => 'kerr']);
        $response = $this->get('users?family=riv');
        $response->assertOk();
        $this->assertTrue(count($response->baseResponse->getOriginalContent()['result']) === 1);
    }

    public function test_get_users_with_name_and_family_filter()
    {
        User::query()->truncate();
        User::factory()->create(['name' => 'david', 'family' => 'hume']);
        User::factory()->create(['name' => 'bertrand', 'family' => 'russel']);
        $response = $this->get('users?name=dav&family=hu');
        $response->assertOk();
        $this->assertTrue(count($response->baseResponse->getOriginalContent()['result']) === 1);
    }
}
