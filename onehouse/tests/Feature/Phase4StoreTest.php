<?php

namespace Tests\Feature;

use App\Models\Profile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class Phase4StoreTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_get_request(): void
    {
        $response = $this->get('/phase4');
        $response->assertStatus(200);
    }

    // HTTP リクエストを作る（POST /phase4）
    public function test_post_request()
    {
        $profile = Profile::factory()->create([
            'id' => 1,
            'user_id' => 1,
        ]);


        $response = $this->post('/phase4', [
            'profile_id' => $profile->id,
            'address' => '123-4567 東京都渋谷区56-4523 5丁目',
            'landarea' => '120',
            'far' => '200',
            'bcr' => '80',
            'floor' => '2',
            'builable_area' => '192',
            'pricePerTsubo' => '80',
        ]);
        $response->assertStatus(302);
        $this->assertDatabaseHas('landlogs', [
            'profile_id' => $profile->id,
            'address' => '123-4567 東京都渋谷区56-4523 5丁目',
            'landarea' => '120',
            'far' => '200',
            'bcr' => '80',
            'floor' => '2',
            'builable_area' => '192',
            'pricePerTsubo' => '80',

        ]);
    }
    // DB にレコードがあるか確認する

    // ession に成功メッセージがあるか確認する


    // 正しいページにリダイレクトされたか確認する

}
