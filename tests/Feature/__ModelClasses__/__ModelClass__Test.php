<?php

namespace Tests\Feature\__ModelClasses__\__ModelClass__;

use Tests\AppTestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\__ModelClass__;

class __ModelClass__Test extends AppTestCase
{

    use RefreshDatabase;

    public function test_require_permissions(){
        $auth = $this->newUser([
            'role' => 'authenticated',
        ]);
        $response = $this->actingAs($auth)->get('__modelRoute__');
        $response->assertRedirect('/account');
    }

    public function test_index(){
        $auth = $this->newUser([
            'role' => 'admin',
        ]);
        $__modelVariables__ = factory(__ModelClass__::class,2)->create();
        $response = $this->actingAs($auth)->get('__modelRoute__');
        $response->assertStatus(200);
        foreach($__modelVariables__ as $__modelVariable__){
            $response->assertSee($__modelVariable__->name);
        }
    }

    public function test_create(){
        $auth = $this->newUser([
            'role' => 'admin',
        ]);
        $response = $this->actingAs($auth)->get('__modelRoute__/create');
        $response->assertStatus(200);
    }

    public function test_store(){
        $auth = $this->newUser([
            'role' => 'admin',
        ]);
        $__modelVariable__ = factory(__ModelClass__::class)->make();
        $response = $this->actingAs($auth)->post('__modelRoute__',[
            'name' => $__modelVariable__->name,
        ]);
        $response->assertRedirect('__modelRoute__');
        $created__modelVariable__ = __ModelClass__::where('name',$__modelVariable__->name)->first();
        $this->assertNotNull($created__modelVariable__);
    }

    public function test_show(){
        $auth = $this->newUser([
            'role' => 'admin',
        ]);
        $__modelVariable__ = factory(__ModelClass__::class)->create();
        $response = $this->actingAs($auth)->get('__modelRoute__/'.$__modelVariable__->id);
        $response->assertStatus(200);
    }

    public function test_edit(){
        $auth = $this->newUser([
            'role' => 'admin',
        ]);
        $__modelVariable__ = factory(__ModelClass__::class)->create();
        $response = $this->actingAs($auth)->get('__modelRoute__/'.$__modelVariable__->id.'/edit');
        $response->assertStatus(200);
    }

    public function test_update(){
        $auth = $this->newUser([
            'role' => 'admin',
        ]);
        $__modelVariable__ = factory(__ModelClass__::class)->create();
        $__modelVariable__New = factory(__ModelClass__::class)->make();
        $response = $this->actingAs($auth)->patch('__modelRoute__/'.$__modelVariable__->id,[
            'name' => $__modelVariable__New->name,
        ]);
        $response->assertRedirect('__modelRoute__');
        $updated__modelVariable__ = __ModelClass__::find($__modelVariable__->id);
        $this->assertEquals($__modelVariable__New->name,$updated__modelVariable__->name);
    }

    public function test_delete(){
        $auth = $this->newUser([
            'role' => 'admin',
        ]);
        $__modelVariable__ = factory(__ModelClass__::class)->create();
        $response = $this->actingAs($auth)->delete('__modelRoute__/'.$__modelVariable__->id);
        $response->assertRedirect('__modelRoute__');
        $existing__modelVariable__ = __ModelClass__::find($__modelVariable__->id);
        $this->assertNull($existing__modelVariable__);
    }

}
