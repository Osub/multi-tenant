<?php

namespace Hyn\Tenancy\Tests;

use Illuminate\Contracts\Foundation\Application;

class WebsiteTest extends Test
{

    /**
     * @test
     */
    public function creates_website()
    {
        $this->website->save();

        $this->assertTrue($this->website->exists);
    }

    /**
     * @test
     * @depends creates_website
     */
    public function connect_hostname_to_website()
    {
        $this->website->hostnames()->save($this->hostname);

        $this->assertEquals($this->website->id, $this->hostname->website_id);
    }

    protected function duringSetUp(Application $app)
    {
        $this->setUpWebsites();
        $this->setUpHostnames();
    }
}