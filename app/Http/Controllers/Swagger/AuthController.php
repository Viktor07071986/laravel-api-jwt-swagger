<?php
namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/auth/register",
 *     summary="Регистрация",
 *     tags={"API ALL"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name", type="string", example="name"),
 *                     @OA\Property(property="email", type="string", example="email@email.com"),
 *                     @OA\Property(property="password", type="string", example="password"),
 *                     @OA\Property(property="password_confirmation", type="string", example="password")
 *                 )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User successfully registered"),
 *             @OA\Property (property="user", type="object",
 *                 @OA\Property(property="name", type="string", example="name"),
 *                 @OA\Property(property="email", type="string", example="email@email.com"),
 *                 @OA\Property(property="updated_at", type="string", example="2024-03-31T18:18:06.000000Z"),
 *                 @OA\Property(property="created_at", type="string", example="2024-03-31T18:18:06.000000Z"),
 *                 @OA\Property(property="id", type="integer", example=1)
 *             )
 *         )
 *     )
 * ),
 *
 * @OA\Post(
 *     path="/api/auth/login",
 *     summary="Авторизация",
 *     tags={"API ALL"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="email", type="string", example="test@test.test"),
 *                     @OA\Property(property="password", type="string", example="testtest")
 *                 )
 *             }
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="{{ token }}"),
 *              @OA\Property(property="token_type", type="string", example="bearer"),
 *              @OA\Property(property="expires_in", type="integer", example=3600),
 *              @OA\Property (property="user", type="object",
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="name", type="string", example="name"),
 *                  @OA\Property(property="email", type="string", example="email@email.com"),
 *                  @OA\Property(property="email_verified_at", type="string", example="2024-03-31T18:18:06.000000Z"),
 *                  @OA\Property(property="created_at", type="string", example="2024-03-31T18:18:06.000000Z"),
 *                  @OA\Property(property="updated_at", type="string", example="2024-03-31T18:18:06.000000Z")
 *              )
 *         )
 *     )
 * ),
 *
 * @OA\Post(
 *     path="/api/auth/refresh",
 *     summary="Обновление токена",
 *     tags={"API ALL"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="access_token", type="string", example="{{ token }}"),
 *              @OA\Property(property="token_type", type="string", example="bearer"),
 *              @OA\Property(property="expires_in", type="integer", example=3600),
 *              @OA\Property (property="user", type="object",
 *                  @OA\Property(property="id", type="integer", example=1),
 *                  @OA\Property(property="name", type="string", example="name"),
 *                  @OA\Property(property="email", type="string", example="email@email.com"),
 *                  @OA\Property(property="email_verified_at", type="string", example="2024-03-31T18:18:06.000000Z"),
 *                  @OA\Property(property="created_at", type="string", example="2024-03-31T18:18:06.000000Z"),
 *                  @OA\Property(property="updated_at", type="string", example="2024-03-31T18:18:06.000000Z")
 *              )
 *         )
 *     )
 * ),
 *
 * @OA\Get(
 *     path="/api/auth/user-profile",
 *     summary="Информация о пользователе",
 *     tags={"API ALL"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="id", type="integer", example=1),
 *             @OA\Property(property="name", type="string", example="name"),
 *             @OA\Property(property="email", type="string", example="email@email.com"),
 *             @OA\Property(property="email_verified_at", type="string", example="2024-03-31T18:18:06.000000Z"),
 *             @OA\Property(property="created_at", type="string", example="2024-03-31T18:18:06.000000Z"),
 *             @OA\Property(property="updated_at", type="string", example="2024-03-31T18:18:06.000000Z")
 *         )
 *     )
 * ),
 *
 * @OA\Post(
 *     path="/api/auth/logout",
 *     summary="Выход",
 *     tags={"API ALL"},
 *     security={{ "bearerAuth": {} }},
 *     @OA\Response(
 *         response=200,
 *         description="Ok",
 *         @OA\JsonContent(
 *             @OA\Property(property="message", type="string", example="User successfully signed out")
 *         )
 *     )
 * )
 *
 */

class AuthController extends Controller {

}
