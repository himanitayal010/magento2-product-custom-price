<?php

    namespace Magneto\CustomPrice\Observer;
 
    use Magento\Framework\Event\ObserverInterface;
    use Magento\Framework\App\RequestInterface;
 
    class CustomPrice implements ObserverInterface
    {

	protected $checkoutSession;

	public function __construct(
		\Magento\Framework\App\Action\Context $context, 
		\Magento\Checkout\Model\Session $checkoutSession) {
        $this->_checkoutSession = $checkoutSession;
    }

        public function execute(\Magento\Framework\Event\Observer $observer) {
		if($this->_checkoutSession->getIsWarranty() == 'is_warranty'){
			$item = $observer->getEvent()->getData('quote_item');         
            $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
			$price = $item->getProduct()->getPrice();
            $price = 10 + $price; //set your price here
            $item->setCustomPrice($price);
            $item->setOriginalCustomPrice($price);
            $item->getProduct()->setIsSuperMode(true);
		}
            
        }
 
    }
