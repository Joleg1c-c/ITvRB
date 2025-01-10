<?php

declare(strict_types = 1);

namespace App\Http\Actions;

use App\Http\Request;
use App\Http\Response;

interface ActionInterface
{
    public function handle(Request $request): Response;
}
