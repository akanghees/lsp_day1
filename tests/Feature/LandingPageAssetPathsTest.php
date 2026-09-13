<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageAssetPathsTest extends TestCase
{
    public function test_landing_page_scripts_use_landing_page_asset_paths(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);

        $html = $response->getContent();

        $this->assertStringContainsString('/landing-page/assets/js/owl-carousel.js', $html);
        $this->assertStringContainsString('/landing-page/assets/js/animation.js', $html);
        $this->assertStringContainsString('/landing-page/assets/js/imagesloaded.js', $html);
        $this->assertStringContainsString('/landing-page/assets/js/popup.js', $html);
        $this->assertStringContainsString('/landing-page/assets/js/custom.js', $html);
    }
}
