<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Psr\Http\Message\UriInterface;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-sitemap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
/*        SitemapGenerator::create('https://guens-education.com')
            ->writeToFile(public_path('sitemap.xml'));*/
        SitemapGenerator::create('https://guens-education.com')
        ->shouldCrawl(function (UriInterface $url) {
            // All pages will be crawled, except the contact page.
            // Links present on the contact page won't be added to the
            // sitemap unless they are present on a crawlable page.

            return strpos($url->getPath(), '/gu8951pkgm74congo321admin/') === false;
        })
            ->writeToFile(public_path('sitemap.xml'));

    }
}
