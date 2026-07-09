<?php

    namespace Tests\Feature;

    use App\Models\Category;
    use App\Models\User;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;

    class CategoryTest extends TestCase
    {
        /**
         * A basic feature test example.
         */
        use RefreshDatabase;

        public function test_example(): void
        {
            $response = $this->get('/');

            $response->assertStatus(200);
        }

        public function test_admin_can_see_categories_list(): void
        {
            /*
             * Arrange
             */
            $admin = $this->admin();
            Category::create([
                'naziv' => 'Test category',
                'opis' => 'Test description',
            ]);

            /*
             * Act
             */
            $response = $this->actingAs($admin)->get(route('categories.index'));

            /*
             * Assert
             */
            $response->assertStatus(200);
            $response->assertSee('Test category');
        }

        private function admin(): User
        {
            return User::factory()->create([
                'is_admin' => true,
                'datum_rod' => '1990-01-01',
                'placa' => 3000
            ]);
        }

        public function test_user_can_see_categories_list(): void
        {
            $admin = $this->admin();
            Category::create([
                'naziv' => 'Laptopi',
                'opis' => 'Prijenosna računala',
            ]);

            $response = $this->actingAs($admin)->get(route('categories.index'));
            $response->assertStatus(200);
            $response->assertSee('Laptopi');
        }

        public function test_admin_can_create_category(): void
        {
            $admin = $this->admin();
            $response = $this->actingAs($admin)->post(route('categories.store'), [
                'naziv' => 'Test category',
                'opis' => 'Test description',
            ]);

            $response->assertRedirect(route('categories.index'));
            $this->assertDatabaseHas('categories', [
                'naziv' => 'Test category',
            ]);
        }

        public function test_admin_can_update_category(): void
        {
            $admin = $this->admin();
            $category = Category::create([
                'naziv' => 'Test category',
                'opis' => 'Test description',
            ]);
            $response = $this->actingAs($admin)->put(route('categories.update', $category), [
                'naziv' => 'Updated category',
                'opis' => 'Updated description',
            ]);

            $response->assertRedirect(route('categories.index'));
            $this->assertDatabaseHas('categories', [
                'naziv' => 'Updated category',
            ]);
        }

        public function test_user_cannot_create_category(): void
        {
            $user = $this->user();
            $response = $this->actingAs($user)->post(route('categories.store'), [
                'naziv' => 'Test category',
                'opis' => 'Test description',
            ]);
            $response->assertStatus(403);
            $this->assertDatabaseMissing('categories', [
                'naziv' => 'Test category',
            ]);
        }

        private function user(): User
        {
            return User::factory()->create([
                'is_admin' => false,
                'datum_rod' => '1990-01-01',
                'placa' => 3000
            ]);
        }

        public function test_admin_can_delete_category(): void
        {
            $admin = $this->admin();
            $category = Category::create([
                'naziv' => 'Test category',
                'opis' => 'Test description',
            ]);
            $response = $this->actingAs($admin)->delete(route('categories.destroy', $category));
            $response->assertRedirect(route('categories.index'));
            $this->assertDatabaseMissing('categories', ['naziv' => 'Test category']);
        }

        public function test_user_nemoze_obrisati_kategoriju(): void
        {
            $user = $this->user();
            $category = Category::create([
                'naziv' => 'Test category',
                'opis' => 'Test description',
            ]);
            $response = $this->actingAs($user)->delete(route('categories.destroy', $category));
            $response->assertStatus(403);
            $this->assertDatabaseHas('categories', ['naziv' => 'Test category']);
        }

        public function test_validation_dont_allow_empty_naziv(): void
        {
            $admin = $this->admin();
            $response = $this->actingAs($admin)->post(route('categories.store'), [
                'naziv' => '',
                'opis' => 'Test description',
            ]);

            $response->assertSessionHasErrors('naziv');
        }

        public function test_validation_dont_allow_minimal_length_for_naziv(): void
        {
            $admin = $this->admin();
            $response = $this->actingAs($admin)->from(route('categories.create'))->post(route('categories.store'), [
                'naziv' => 'ab',
                'opis' => 'Test description',
            ]);
            $response->assertSessionHasErrors('naziv');
            $this->assertDatabaseMissing('categories', ['naziv' => 'ab']);
        }


        public function test_validacija_opis_nije_obavezan(): void
        {
            $admin = $this->admin();
            $response = $this->actingAs($admin)->post(route('categories.store'), [
                'naziv' => 'Test category',
                'opis' => '',
            ]);
            $response->assertRedirect(route('categories.index'));
            $this->assertDatabaseHas('categories', ['naziv' => 'Test category']);
            $response->assertSessionHasNoErrors();
        }

        public function test_poruka_uspjesnosti_kreiranja_kategorije(): void
        {
            $admin = $this->admin();
            $response = $this->actingAs($admin)->post(route('categories.store'), [
                'naziv' => 'Test category',
                'opis' => 'Test description',
            ]);

            $response->assertRedirect(route('categories.index'));
            $response->assertSessionHas('success');
        }
    }
