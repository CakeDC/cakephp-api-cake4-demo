<?php
declare(strict_types=1);

namespace External\Service;

use External\Service\Blogs\DemoAction;
use CakeDC\Api\Service\FallbackService;
use CakeDC\Api\Service\Renderer\JsonRenderer;

class BlogsService extends FallbackService
{
    /**
     * @inheritDoc
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->_rendererClass = JsonRenderer::class;
        $this->mapAction(
            'demo',
            DemoAction::class,
            ['method' => ['GET'], 'mapCors' => true, 'path' => 'demo']
        );
    }
}
