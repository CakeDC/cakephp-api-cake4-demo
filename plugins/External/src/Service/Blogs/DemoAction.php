<?php
declare(strict_types=1);

namespace External\Service\Blogs;

use Cake\Datasource\ModelAwareTrait;
use CakeDC\Api\Service\Action\CrudAction;

class DemoAction extends CrudAction
{
    use ModelAwareTrait;

    public function execute()
    {
        $this->loadModel('Blogs');

        return [
            'result' => true,
        ];
    }
}
