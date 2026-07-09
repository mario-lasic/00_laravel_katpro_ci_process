<?php

    namespace Tests\Feature;

    use App\Models\Category;
    use App\Models\Product;
    use App\Models\User;
    use Illuminate\Foundation\Testing\RefreshDatabase;
    use Tests\TestCase;

    class ProductTest extends TestCase
    {
        /**
         * A basic feature test example.
         */
        use RefreshDatabase;

        public function test_admin_can_see_products_list(): void
        {
            $admin = $this->admin();
            $this->product();
            $response = $this->actingAs($admin)->get('/products');
            $response->assertStatus(200);
            $response->assertSee('MacBook Pro');
        }

        private function admin(): User
        {
            return User::factory()->create([
                'is_admin' => true,
                'datum_rod' => '1990-01-01',
                'placa' => 3000
            ]);
        }

        private function product(): Product
        {
            return Product::create([
                'category_id' => $this->category()->id,
                'naziv' => 'MacBook Pro',
                'opis' => 'Laptop za rad',
                'cijena' => 1299.99,
                'kolicina' => 10,
            ]);
        }

        private function category(): Category
        {
            return Category::create([
                'naziv' => 'Laptopi',
                'opis' => 'Prijenosna Računala'
            ]);
        }

        public function test_user_can_see_products_list(): void
        {
            $user = $this->user();
            $this->product();
            $response = $this->actingAs($user)->get('/products');
            $response->assertStatus(200);
            $response->assertSee('MacBook Pro');
        }

        private function user(): User
        {
            return User::factory()->create([
                'is_admin' => false,
                'datum_rod' => '1990-01-01',
                'placa' => 1000
            ]);
        }

        public function test_admin_can_see_form_to_create_product(): void
        {
            $admin = $this->admin();
            $this->product();
            $response = $this->actingAs($admin)->get('/products/create');
            $response->assertStatus(200);
            $response->assertSee('Unos novog proizvoda');
        }

        public function test_user_cannot_see_form_to_create_product(): void
        {
            $user = $this->user();
            $this->product();
            $response = $this->actingAs($user)->get('/products/create');
            $response->assertStatus(403);
        }

        public function test_admin_can_create_product(): void
        {
            $admin = $this->admin();
            $category = [
                'category_id' => $this->category()->id,
                'naziv' => 'MacBook Pro',
                'opis' => 'Laptop za rad',
                'cijena' => 1299.99,
                'kolicina' => 10,
            ];
            $response = $this->actingAs($admin)->post(route('products.store', $category));

            $response->assertRedirect('/products');
            $this->assertDatabaseHas('products', [
                'naziv' => 'MacBook Pro',
            ]);
            $response->assertSessionHas('success');
        }

        public function test_admin_can_delete_product(): void
        {
            $admin = $this->admin();
            $product = $this->product();
            $response = $this->actingAs($admin)->delete(route('products.destroy', $product));
            $response->assertRedirect('/products');
            $this->assertDatabaseMissing('products', ['naziv' => 'MacBook Pro']);
        }

        public function test_details_page_shows_product_details(): void
        {
            $user = $this->user();
            $product = $this->product();
            $response = $this->get(route('products.show', $product));
            $response->assertStatus(200);
            $response->assertSee('MacBook Pro');
        }


        public function test_search_show_valid_products(): void
        {
            $user = $this->user();
            $this->product();

            $response = $this->actingAs($user)->get(route('products.search', ['search' => 'MacBook']));

            $response->assertStatus(200);
            $response->assertSee('MacBook Pro');
        }

        public function test_validation_dont_allow_empty_price_and_quantity(): void
        {
            $admin = $this->admin();

            $category = [
                'naziv' => 'MacBook Pro',
                'opis' => 'Test opis',
                'cijena' => '',
                'kolicina' => '',
            ];

            $response = $this->actingAs($admin)->post(
                route('products.store'),
                $category
            );

            $response->assertSessionHasErrors(['cijena', 'kolicina']);
            $this->assertDatabaseMissing('products', ['naziv' => 'MacBook Pro']);
            $response->assertStatus(302);
        }

    }
