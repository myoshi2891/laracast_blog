<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class MailchimpNewsletter implements Newsletter
{
  public function __construct(protected ApiClient $client)
  {
  }

  public function subscribe(string $email, string $list = null)
  {
    $list ??= config('services.mailchimp.lists.subscribers');

    // $response = $mailchimp->ping->get();
    return $this->client->lists->addListMember($list, [
      'email_address' => $email,
      'status' => 'subscribed'
    ]);
  }

  // protected function client()
  // {
  // $mailchimp = new ApiClient();

  //   return $this->client->setConfig([
  //     'apiKey' => config('services.mailchimp.key'),
  //     'server' => 'us10'
  //   ]);
  // }
}