<?php

namespace api\controllers;

use api\components\Controller;

class ErrorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'index' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * @api {post} /oauth2/token Oauth 2 Refresh Token
     * @apiVersion 1.0.0
     * @apiName Refresh Token
     * @apiGroup Authentication
     *
     * @apiDescription OAuth2 refresh token endpoint
     *
     *
     *
     * @apiParam    {String}    [refresh_token] Refresh Token
     * @apiParam    {String}    client_id       Client ID of the application
     * @apiParam    {String}    client_secret   Client Secret of the application
     * @apiParam    {String}    grant_type      Allowed values: `refresh_token`
     *
     * @apiParamExample {json} Refresh Token request
     *  {
     *       "grant_type":"refresh_token",
     *       "client_id":"<client_id>",
     *       "client_secret":"<client_secret>",
     *       "refresh_token":"a7f95b9d0ef944c0055dd72a709586c139b320ff"
     *   }
     *
     * @apiSuccessExample Refresh Token response
     *     HTTP/1.1 200 OK
     *     {
     *       "access_token": "64d496c5ccd6e912746b827711d5102e67524dde",
     *       "expires_in": 86400,
     *       "token_type": "Bearer",
     *       "scope": null,
     *       "refresh_token": "1c816754927a03e231bc20828dd00c3e9c6f21f9"
     *     }
     *
     */

    /**
     * @api {post} /oauth2/token Oauth 2 Access Token
     * @apiVersion 1.0.0
     * @apiName Access Token
     * @apiGroup Authentication
     *
     * @apiDescription OAuth2 access token endpoint
     *
     *
     * @apiParam    {String}    client_id       Client ID of the application
     * @apiParam    {String}    client_secret   Client Secret of the application
     * @apiParam    {String}    username        Username of the user i.e. email
     * @apiParam    {String}    password        Password of the user
     * @apiParam    {String}    grant_type      Allowed values: `password`
     *
     * @apiParamExample {json} Access Token request
     *  {
     *       "grant_type":"password",
     *       "client_id":"<client_id>",
     *       "client_secret":"<client_secret>",
     *       "username":"<username>",
     *       "password":"<password>"
     *   }
     *
     * @apiSuccessExample Access Token response
     *     HTTP/1.1 200 OK
     *     {
     *       "access_token": "64d496c5ccd6e912746b827711d5102e67524dde",
     *       "expires_in": 86400,
     *       "token_type": "Bearer",
     *       "scope": null,
     *       "refresh_token": "1c816754927a03e231bc20828dd00c3e9c6f21f9"
     *     }
     *
     */
}
