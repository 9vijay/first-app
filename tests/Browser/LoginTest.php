<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $user = User::factory()->create([
            'email' => 'vijayp@gmail.com',
        ]);
 
        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'password')
                    ->press('Login')
                    ->assertPathIs('/profile');
        });
    }
    public function testRegister()
    {
        $this->browse(function ($browser) {
            $browser->visit('/registration')
               // ->clickLink('registration')
                ->value('#name', 'Ravisharma')
                ->value('#email', 'ravi@gmail.com')
                ->value('#password', 'ravi1234')
                ->value('#password_confirmation', 'ravi1234')
                //->click('button[type="submit"]')
                ->press('Register')
                ->assertPathIs('/login');
        });
     }

    public function testUserSeeProfile()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(7))
                ->visit('/profile')
                ->assertPathIs('/profile');
        });
    }
    public function resize()
    {
        $this->browse(function (Browser $browser) {
            $browser->resize(1024, 768);
        });
    }
   
}
