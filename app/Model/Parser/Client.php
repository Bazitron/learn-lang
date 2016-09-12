<?php
/**
 * @author     Vasya Zhuryk <vasilichik@gmail.com>
 */

namespace App\Model\Parser;

use Symfony\Component\DomCrawler\Crawler;

class Client
{
    protected $url;

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

    /**
     * @return array
     */
    public function getResult()
    {
        $crawler = new Crawler();
        $crawler->add(file_get_contents($this->url));

        $words = $crawler
            ->filter('table tr')
            ->each(function (Crawler $nodeCrawler) {
                $td = $nodeCrawler->filter('td');

                $enNode = $td->eq(0)->filter('strong');
                $en = $enNode->count() ? $enNode->text() : '';

                $ukNode = $td->eq(1)->filter('p');
                $uk = $ukNode->count() ? $ukNode->text() : '';

                return [
                    'en'    => $en,
                    'uk'    => preg_replace('/^– /','', $uk)
                ];
            });

        unset($words[0]);

        return $words;
    }
}