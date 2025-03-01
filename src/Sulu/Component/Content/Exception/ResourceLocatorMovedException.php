<?php

/*
 * This file is part of Sulu.
 *
 * (c) Sulu GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Component\Content\Exception;

use Sulu\Component\Rest\Exception\TranslationErrorMessageExceptionInterface;

class ResourceLocatorMovedException extends \Exception implements TranslationErrorMessageExceptionInterface
{
    /**
     * new resource locator after move.
     *
     * @var string
     */
    private $newResourceLocator;

    /**
     * uuid of new path node.
     *
     * @var string
     */
    private $newResourceLocatorUuid;

    public function __construct($newResourceLocator, $newResourceLocatorUuid)
    {
        $this->newResourceLocator = $newResourceLocator;
        $this->newResourceLocatorUuid = $newResourceLocatorUuid;
        parent::__construct(
            \sprintf('Resource Locator was moved to "%s" (%s)', $newResourceLocator, $newResourceLocatorUuid)
        );
    }

    /**
     * @return string
     */
    public function getNewResourceLocator()
    {
        return $this->newResourceLocator;
    }

    /**
     * @return string
     */
    public function getNewResourceLocatorUuid()
    {
        return $this->newResourceLocatorUuid;
    }

    public function getMessageTranslationKey(): string
    {
        return 'sulu_page.resource_locator_was_moved';
    }

    public function getMessageTranslationParameters(): array
    {
        return ['{newResourceLocator}' => $this->newResourceLocator];
    }
}
