<?php

namespace Tests\Feature\Http\Admin;

use Tests\TestCase;

class NewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Successful_News_List(): void
    {
        $response = $this->get(route('admin.news.index'));
        $response->assertStatus(200);
        $response->assertSeeText('Список новостей');
    }
    public function test_Successful_News_Store(): void
    {
        $testData = [
            'title' => 'Заголовок',
            'author' => 'Иванов И.И.',
            'status' => 'ACTIVE',
            'description' => 'Описание'
        ];
        $response = $this->post(route('admin.news.store'), $testData);
        $response->assertStatus(302);
    }
}
