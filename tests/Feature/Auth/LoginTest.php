<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    //يمكن للمستخدم التجريبي تسجيل الدخول واستلام الرمز
    public function test_user_can_login_and_receive_token()
{

    $user = User::factory()->create([
        'email' => 'test@example.com',
        'password' => Hash::make('password123'),
    ]);

    $response = $this->postJson('/api/auth/login', [
        'email' => 'test@example.com',
        'password' => 'password123',
    ]);

    $response->assertStatus(200)
        ->assertJsonStructure([
            'success',
            'message',
            'data' => [
                'token',
                'user'
            ]
        ]);
}

//اختبار يمكن للمستخدم المصادق عليه الوصول إلى الملف الشخصي
public function test_authenticated_user_can_access_profile()
{
    $user = User::factory()->create();

    $token = $user->createToken('test-token')->plainTextToken;

    $response = $this->withHeader('Authorization', 'Bearer ' . $token)
        ->getJson('/api/auth/profile');

    $response->assertStatus(200)
        ->assertJson([
            'success' => true
        ]);
}


}
