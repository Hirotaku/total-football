<?php
namespace App\Controller\Component;
use Cake\Controller\Component;
class AppComponent extends Component
{
    /**
     * initialize
     * @author hirosawa
     * @param array $config
     */
    public function initialize(array $config)
    {
        parent::initialize($config);
        $this->controller = $this->_registry->getController();
        $this->modelClass = $this->controller->modelClass;
    }
}