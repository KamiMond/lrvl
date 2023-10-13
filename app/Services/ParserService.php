<?php

namespace App\Services;

use App\Enums\News\Status;
use App\Http\Controllers\SocialProviderController;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use App\Services\Interfaces\ParserInterface;
use Illuminate\View\View;
use Laravel\Socialite\Contracts\User as SocialUser;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserService implements ParserInterface
{
    private string $link;

    public function setLink(string $link): ParserInterface
    {
        $this->link = $link;
        return $this;
    }

    public function saveParseData(): void
    {
        $parser = XmlParser::load($this->link);

        $data = $parser->parse([
            'title' => [
                'uses' => 'channel.title',
            ],
            'link' => [
                'uses' => 'channel.link',
            ],
            'description' => [
                'uses' => 'channel.description',
            ],
            'author' => [
                'uses' => 'channel.author',
            ],
            'content' => [
                'uses' => 'content:encoded',
            ],
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title,content:encoded,link,author,description,pubDate,category,enclosure::url]'
            ],
        ]);
        foreach ($data['news'] as $news) {

            $categories = Category::all();
            if ($categories->contains('title', '=', $news['category'])) {
                $cat = Category::query()
                    ->where('title', '=', $news['category'])->first();
            } else {
                $cat = Category::create([
                    'title' => $news['category'],
                    'description' => $news['title']
                ]);
            }

            News::query()->firstOrCreate([
                'title' => $news['title'],
                'description' => $news['description'],
                'img' => $news['enclosure::url'],
                'category_id' => $cat->id,
                'status' => Status::ACTIVE->value,
                'author' => $news['author']
            ]);
        }
    }
}
