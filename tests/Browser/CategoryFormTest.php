<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryFormTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testFormAddCategory(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('title', '1')
                ->press('Сохранить')
                ->assertSee('Количество символов в поле Заголовок должно быть больше 2.');
        });
    }

    public function testFormEditNews(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/1/edit')
                ->type('title', '1')
                ->press('Редактировать')
                ->assertSee('Количество символов в поле Заголовок должно быть больше 2.');
        });
    }
}
