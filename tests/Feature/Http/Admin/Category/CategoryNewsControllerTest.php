<?php

namespace Tests\Feature\Http\Admin\Category;

use Tests\TestCase;

class CategoryNewsControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_Successful_Categories_News_List(): void
    {
        $response = $this->get(route('admin.categories.index'));
        $response->assertSeeText('Список категорий');
        $response->assertStatus(200);
    }

    public function test_Successful_Categories_News_Store(): void
    {
        $testData = [
            'title' => 'Заголовок',
            'description' => 'Описание'
        ];
        $response = $this->post(route('admin.categories.store'), $testData);
        $response->assertStatus(302);
    }
}
