<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Laravel\Socialite\Facades\Socialite;

class ServiceController extends Controller
{
//    protected $token = 'EAAYoSYIQ26ABABZC1m6mIMlyRyTrEW3bWGoqmoB70tx6gRF3VkYtjlLqZATZBJzPLy30gAM20J8prZCsBrejQmJUZCH6ir1LkCZBSYhnQZCL8JZAkkzKk5oB8fh5O0SeTLbuRhgC0l3ZAx3monu6AgKY7wgZAt1UZBkxdfFfEr8VcoEFgZDZD';
    protected $token = 'EAAYoSYIQ26ABAN1dgZAp95CDOKD7WyIOMUJ0nBNks7YnAXN8fXVIP1IqxgrUEn7Ib0z4ADvOfTpb1fGdbkcUOtLRhDVSrAnWX0tsZBZAf9bcaC0VcHd7J3v4e7hSIDbhOGZC3fZAfd7akfz1ikw6jyvHkn2tROTPYMLEbhRQ6VVZACzO4YIt9L';
    private $api;

    public function __construct(Facebook $fb)
    {
        $fb->setDefaultAccessToken($this->token);
        $this->api = $fb;
    }

    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->scopes([
            "publish_actions, manage_pages", "publish_pages"])->redirect();
    }

    public function handleProviderFacebookCallback()
    {
        $auth_user = Socialite::driver('facebook')->user();
        dd($auth_user);
    }

    public function profile()
    {
        $params = "first_name,last_name,age_range,gender";

        $user = $this->api->get('/me?fields='.$params)->getGraphUser();

        dd($user);
    }

    public function groups()
    {
        $response = $this->api->get('/729097624127598', $this->token);
        $pages = $response->getGraphNode();

        dd($pages);
    }

    public function postGroup(Request $request)
    {
        $groupId = '729097624127598';

        $request = $this->api->post('/' . $groupId . '/feed', array('message' => $request->message));
        $post = $request->getGraphNode();

        print_r($post);
    }
}
