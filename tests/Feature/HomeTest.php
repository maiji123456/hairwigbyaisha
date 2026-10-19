<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{
    public function test_homepage_renders_all_sections(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        foreach (['home', 'shop', 'wax', 'services', 'about', 'gallery', 'testimonials', 'booking', 'contact'] as $id) {
            $response->assertSee('id="' . $id . '"', false);
        }
        $response->assertSee('LuxeHair by Aisha — Luxury Hair You Can Wear', false);
        $response->assertSee('rel="canonical"', false);
        $response->assertSee('embed.tawk.to', false);
    }

    public function test_every_local_asset_on_the_page_exists(): void
    {
        $html = $this->get('/')->getContent();
        preg_match_all('#(?:src|href)="' . preg_quote(url('/'), '#') . '/([^"?]+)#', $html, $m);

        $this->assertNotEmpty($m[1]);
        foreach (array_unique($m[1]) as $path) {
            $this->assertFileExists(public_path($path), "Missing asset: {$path}");
        }
    }

    public function test_robots_and_sitemap(): void
    {
        $this->get('/robots.txt')->assertOk()->assertSee('Sitemap:', false);
        $this->get('/sitemap.xml')->assertOk()->assertSee('<urlset', false);
    }
}
