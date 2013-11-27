<?php

namespace FrontModule;

class CategoryPresenter extends BasePresenter
{
  private $eshopRepository;      

	public function startup()
	{          
    parent::startup();
            
    $this->eshopRepository = $this->context->eshopRepository;                                                    
	}
    
	public function renderDefault($url)
	{              
    //$this->template->product = $this->eshopRepository->findOneProductByUrl($url);
    //if($this->template->product['id']*1==0) $this->redirect('Category:Default');                      		
	}
}