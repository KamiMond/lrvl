<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NewsFormTest extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testFormAddNews(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/create')
                ->type('title', '1')
                ->press('Сохранить')
                ->assertSee('Количество символов в поле Заголовок должно быть больше 2.');
        });
    }

    public function testFormEditNews(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/news/1/edit')
                ->type('title', '1')
                ->press('Изменить')
                ->assertSee('Количество символов в поле Заголовок должно быть больше 2.');
        });
    }
}
