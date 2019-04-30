<?php
// src/Controller/HomepageController.php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class HomepageController
{
    public function index()
    {
        return new Response(
            '<html><body>Hello Radenviro</body></html>'
        );
    }
}
