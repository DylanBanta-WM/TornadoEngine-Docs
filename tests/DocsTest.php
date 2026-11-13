<?php

namespace TornadoEngine\Docs\Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DocsTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['is_admin' => true]);
    }

    public function test_docs_is_in_the_menu_for_people_who_can_read_it(): void
    {
        $this->actingAs($this->admin())->get('/dashboard')->assertSee(route('docs.index'));
        $this->actingAs(User::factory()->create())->get('/dashboard')->assertDontSee(route('docs.index'));
    }

    public function test_the_dns_guide_is_listed_and_shown(): void
    {
        $this->actingAs($this->admin())->get('/docs')
            ->assertOk()
            ->assertSee('Set up DNS and HTTPS');

        $this->actingAs($this->admin())->get('/docs/dns-setup')
            ->assertOk()
            ->assertSee('dns_cloudflare_api_token');
    }

    public function test_unknown_docs_are_not_found(): void
    {
        $this->actingAs($this->admin())->get('/docs/nope')->assertNotFound();
    }

    public function test_docs_need_the_docs_permission(): void
    {
        $this->actingAs(User::factory()->create())->get('/docs')->assertForbidden();
    }

    public function test_after_setup_the_old_address_leads_here(): void
    {
        $this->get('/dns-setup')->assertRedirect('/docs/dns-setup');
    }
}
