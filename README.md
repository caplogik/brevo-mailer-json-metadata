Brevo Bridge
============

Provides Brevo integration for Symfony Mailer with webhook metadata support.

Configuration example:

```env
# SMTP
MAILER_DSN=brevo+smtp://USERNAME:PASSWORD@default

# API
MAILER_DSN=brevo+api://KEY@default
```

where:
 - `KEY` is your Brevo API Key

With API, you can use custom headers.

```php
$params = ['param1' => 'foo', 'param2' => 'bar'];

$email = new Email();
$email
    ->getHeaders()
    ->add(new MetadataHeader('custom_header_1', 'custom_value_1'))
    ->add(new TagHeader('TagInHeaders1'))
    ->add(new TagHeader('TagInHeaders2'))
    ->addTextHeader('sender.ip', '1.2.3.4')
    ->addTextHeader('templateId', 1)
    ->addParameterizedHeader('params', 'params', $params)
    ->addTextHeader('foo', 'bar')
;
```

This example allow you to set:

 * templateId
 * params
 * tags
 * headers
     * sender.ip
     * X-Mailin-Custom

For more information, you can refer to [Brevo API documentation](https://developers.brevo.com/reference/sendtransacemail).
