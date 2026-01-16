<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Mailer\Bridge\Brevo\Tests\RemoteEvent;

use PHPUnit\Framework\TestCase;
use Symfony\Component\Mailer\Bridge\Brevo\RemoteEvent\BrevoPayloadConverter;

class BrevoPayloadConverterTest extends TestCase
{
    public function testMetadataHeader()
    {
        $converter = new BrevoPayloadConverter();

        $webhook = $converter->convert([
            'id' => 814119,
            'email' => 'example@gmail.com',
            'message-id' => '<202305311328.81899448177@smtp-relay.mailin.fr>',
            'date' => '2023-05-31 15:28:33',
            'tags' => ['tag1', 'tag2'],
            'tag' => '["tag1","tag2"]',
            'event' => 'delivered',
            'subject' => 'Subject Line',
            'sending_ip' => '127.0.0.1',
            'ts_event' => 1685539713,
            'ts' => 1685539713,
            'reason' => 'sent',
            'ts_epoch' => '1685539713018',
            'X-Mailin-custom' => '{"metadata_name":"metadata_value"}',
        ]);

        $this->assertEquals(['metadata_name' => 'metadata_value'], $webhook->getMetadata());
    }
}
