<?php
namespace Ebiz\Paparazi\Block;

 
class Paparazi extends \Magento\Framework\View\Element\Template
{
    public function getPaparaziTxt()
    {
        return 'Paparazi is the module';
    }
	
	public function getFormAction()
    {	
        return $this->getUrl('paparazi/index/save');
    }
}