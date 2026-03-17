<?php

namespace App\Docs;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: "User Management API",
    version: "1.0.0",
    description: "API for authentication and user management system"
)]

#[OA\Server(
    url: "http://127.0.0.1:8000",
    description: "Local API Server"
)]

#[OA\SecurityScheme(
    securityScheme: "sanctum",
    type: "http",
    scheme: "bearer",
    bearerFormat: "JWT"
)]

class OpenApi {}
