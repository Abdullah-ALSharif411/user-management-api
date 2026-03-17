<?php

namespace App\Swagger;

use OpenApi\Attributes as OA;


class UserManagementSwagger
{
    // -------------------------------------------
    // Register
    // -------------------------------------------
    #[OA\Post(
        path: "/api/auth/register",
        summary: "User register",
        tags: ["Auth"]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ["name", "email", "password", "password_confirmation", "role"],
            properties: [
                new OA\Property(property: "name", type: "string", example: "John Doe"),
                new OA\Property(property: "email", type: "string", example: "john@example.com"),
                new OA\Property(property: "password", type: "string", example: "password123"),
                new OA\Property(property: "password_confirmation", type: "string", example: "password123"),
                new OA\Property(property: "role", type: "string", example: "Admin")
            ]
        )
    )]
    #[OA\Response(
        response: 201,
        description: "User registered successfully",
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "success", type: "boolean", example: true),
                new OA\Property(property: "message", type: "string", example: "User registered successfully"),
                new OA\Property(property: "data", type: "object", properties: [
                    new OA\Property(property: "user", type: "object", properties: [
                        new OA\Property(property: "id", type: "integer", example: 1),
                        new OA\Property(property: "name", type: "string", example: "John Doe"),
                        new OA\Property(property: "email", type: "string", example: "john@example.com"),
                        new OA\Property(property: "role", type: "string", example: "Admin")
                    ])
                ])
            ]
        )
    )]
    public function Register() {}

    // -------------------------------------------
    // Login
    // -------------------------------------------
    #[OA\Post(
        path: "/api/auth/login",
        summary: "User login",
        tags: ["Auth"]
    )]
    #[OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ["email", "password"],
            properties: [
                new OA\Property(property: "email", type: "string", example: "john@example.com"),
                new OA\Property(property: "password", type: "string", example: "password123")
            ]
        )
    )]
    #[OA\Response(
        response: 200,
        description: "Login successful",
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "success", type: "boolean", example: true),
                new OA\Property(property: "message", type: "string", example: "User login Successfully"),
                new OA\Property(property: "data", type: "object", properties: [
                    new OA\Property(property: "token", type: "string", example: "1|abcd1234token"),
                    new OA\Property(property: "user", type: "object", properties: [
                        new OA\Property(property: "id", type: "integer", example: 1),
                        new OA\Property(property: "name", type: "string", example: "John Doe"),
                        new OA\Property(property: "email", type: "string", example: "john@example.com"),
                        new OA\Property(property: "role", type: "string", example: "Admin")
                    ])
                ])
            ]
        )
    )]
    public function login() {}

    // -------------------------------------------
    // Logout
    // -------------------------------------------
    #[OA\Post(
        path: "/api/auth/logout",
        summary: "User logout",
        tags: ["Auth"],
        security: [["sanctum" => []]]
    )]
    #[OA\Response(
        response: 200,
        description: "Logout successful",
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "success", type: "boolean", example: true),
                new OA\Property(property: "message", type: "string", example: "Logout Successfully"),
                new OA\Property(property: "data", type: "null")
            ]
        )
    )]
    public function logout() {}

    // -------------------------------------------
    // Users list with filters (Admin)
    // -------------------------------------------
    #[OA\Get(
        path: "/api/users",
        summary: "Get users list with filters",
        tags: ["Users"],
        security: [["sanctum" => []]]
    )]
    #[OA\Parameter(name: "name", in: "query", description: "Filter by name", required: false, schema: new OA\Schema(type: "string"))]
    #[OA\Parameter(name: "email", in: "query", description: "Filter by email", required: false, schema: new OA\Schema(type: "string"))]
    #[OA\Parameter(name: "role", in: "query", description: "Filter by role", required: false, schema: new OA\Schema(type: "string", example: "Admin"))]
    #[OA\Response(
        response: 200,
        description: "Users list",
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: "success", type: "boolean", example: true),
                new OA\Property(property: "message", type: "string", example: "Users list"),
                new OA\Property(property: "data", type: "array", items: new OA\Items(
                    type: "object",
                    properties: [
                        new OA\Property(property: "id", type: "integer", example: 1),
                        new OA\Property(property: "name", type: "string", example: "John Doe"),
                        new OA\Property(property: "email", type: "string", example: "john@example.com"),
                        new OA\Property(property: "role", type: "string", example: "Admin")
                    ]
                ))
            ]
        )
    )]
    public function users() {}
}
