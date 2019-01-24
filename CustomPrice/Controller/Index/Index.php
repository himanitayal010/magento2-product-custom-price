<?php
namespace Magneto\CustomPrice\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $checkoutSession;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Checkout\Model\Session $checkoutSession
		)
	{
		$this->_checkoutSession = $checkoutSession;
		return parent::__construct($context);
	}

	public function execute()
	{
		$is_warranty = $this->getRequest()->getParam('data');

		$this->_checkoutSession->setIsWarranty($is_warranty);

		return $this->_pageFactory->create();
	}
}
