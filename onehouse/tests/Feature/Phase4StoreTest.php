<?php

namespace Tests\Feature;

use App\Models\LandLog;
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

    // HTTPリクエストを作る（POST /phase4）
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

        // DB にレコードがあるか確認する
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
        // session に成功メッセージがあるか確認する
        $response->assertSessionHas('success', '登録が完了しました');
    }
    //  削除するDELETE
    public function test_delete_request()
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
        $landlog = LandLog::latest()->first();


        $response = $this->delete("/phase4/{$landlog->id}");
        $response->assertStatus(302);

        $this->assertDatabaseMissing('landlogs', [
            'id' => $landlog->id,
        ]);


        $response->assertSessionHas('success', "{$landlog->address}を削除しました");
    }

    // 更新するPUT

}
