<?php
 
namespace Ebiz\Paparazi\Controller\Index;
 
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\View\Element\Messages;
use \Magento\Framework\Message\ManagerInterface;

 
class Save extends \Magento\Framework\App\Action\Action
{
    protected $_resultPageFactory;
	protected $_messageManager;
    
 
    public function __construct(Context $context, \Magento\Framework\View\Result\PageFactory $resultPageFactory
	,\Magento\Framework\Message\ManagerInterface $messageManager)
    {
        $this->_resultPageFactory = $resultPageFactory;
		$this->_messageManager = $messageManager;
        parent::__construct($context);
    }
	 
    public function execute()
	{
		$post = (array) $this->getRequest()->getPost();
        
		if (!empty($post)) {
          
            $name   = $post['name'];
            $email  = $post['email'];
            $telephone  = $post['telephone'];
            $remark  = $post['comment'];
			
			$this->_resources = \Magento\Framework\App\ObjectManager::getInstance()->get('Magento\Framework\App\ResourceConnection');
			$connection = $this->_resources->getConnection();

			$Table = $this->_resources->getTableName('ebiz_paparazi');
			$sql = "INSERT INTO " . $Table . "(name, email, telephone, remark, status) VALUES ('".$name."', '".$email."','".$telephone."','".$remark."','1')";
			$connection->query($sql);
			
			$this->_messageManager->addSuccess(
                __('Successfully Saved.')
            );
		
        }
		
		$resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setPath('paparazi/index/index');
        return $resultRedirect;
      
    }
}

