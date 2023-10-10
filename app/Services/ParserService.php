<?php

namespace App\Services;

use App\Http\Controllers\SocialProviderController;
use App\Models\User;
use App\Services\Interfaces\ParserInterface;
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

    public function saveParseData(): array
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
            'image' => [
                'uses' => 'channel.image.url',
            ],
            'news' => [
                'uses' => 'channel.item[title,link,author,description,pubDate,category,enclosure::url]'
            ],
        ]);
        return $data;
    }
}
