<?php
declare(strict_types=1);

namespace Citilink\ExpertSenderApi\Enum\SubscribersRequest;

use MyCLabs\Enum\Enum;

/**
 * Matching mode in add/edit subscriber requests
 *
 * @method static MatchingMode EMAIL()
 * @method static MatchingMode CUSTOMER_SUBSCRIBER_ID()
 * @method static MatchingMode ID()
 * @method static MatchingMode PHONE()
 *
 * @author Nikita Sapogov <sapogov.n@citilink.ru>
 */
final class MatchingMode extends Enum
{
    /**
     * Email
     */
    const EMAIL = 'Email';

    /**
     * Custom subscriber ID
     */
    const CUSTOMER_SUBSCRIBER_ID = 'CustomSubscriberId';

    /**
     * Subscriber ID
     */
    const ID = 'Id';

    /**
     * Subscriber's phone
     */
    const PHONE = 'Phone';
}
