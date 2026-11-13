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

    public function test_docs_is_a_section_of_administration(): void
    {
        $this->actingAs($this->admin())->get('/administration')->assertSee('Docs');
    }

    public function test_the_dns_guide_is_listed_and_shown(): void
    {
        $this->actingAs($this->admin())->get('/administration/docs')
            ->assertOk()
            ->assertSee('Set up DNS and HTTPS');

        $this->actingAs($this->admin())->get('/administration/docs/dns-setup')
            ->assertOk()
            ->assertSee('dns_cloudflare_api_token');
    }

    public function test_unknown_docs_are_not_found(): void
    {
        $this->actingAs($this->admin())->get('/administration/docs/nope')->assertNotFound();
    }

    public function test_docs_are_for_admins_only(): void
    {
        $this->actingAs(User::factory()->create())->get('/administration/docs')->assertForbidden();
    }

    public function test_after_setup_the_old_address_leads_here(): void
    {
        $this->get('/dns-setup')->assertRedirect('/administration/docs/dns-setup');
    }
}
