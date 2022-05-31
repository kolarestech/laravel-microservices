<?php

namespace Tests\Feature\Api;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected $endpoint = 'api/categories';
    
    /**
     * obter categorias
     *
     * @return void
     */
    public function test_get_all_categories()
    {   
        $response = $this->getJson($this->endpoint);

        $response->assertStatus(200);
    }

    /**
     * obter categorias
     *
     * @return void
     */
    public function test_error_get_single_category()
    {   
        $category = 50; // fake ID

        $response = $this->getJson($this->endpoint.'/'.$category);
        
        $response->assertStatus(500);
    }

    /**
     * obter categorias
     *
     * @return void
     */
    public function test_get_single_category()
    {   
        $category = Category::factory()->create();

        $response = $this->getJson($this->endpoint.'/'.$category->id);

        $response->assertStatus(200);
    }

    /**
     * obter categorias
     *
     * @return void
     */
    public function test_validation_store_category()
    {   
        $response = $this->postJson($this->endpoint, [
            'title' => '',
            'description' => ''
        ]);

        $response->assertStatus(422);
    }

    /**
     * obter categorias
     *
     * @return void
     */
    public function test_store_category()
    {   
        $response = $this->postJson($this->endpoint, [
            'title' => 'Teste',
            'description' => 'Teste'
        ]);
        
        $response->assertStatus(201);
    }
}
