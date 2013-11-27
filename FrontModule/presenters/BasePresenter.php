<?php
namespace FrontModule;

use \Nette\Security\User;
use \Nette\Image;

/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends \Nette\Application\UI\Presenter
{
	public function startup()
	{          
    parent::startup();
    
    $this->template->registerHelper('image', function ($id,$obj,$x=null,$y=null) 
    {            
        switch($obj)
        {
          case 'photo':
          {                    
            if(file_exists($fileName = './photo/'.sha1($id.'_orig').'.jpg'))
            {
              $cestaThumb = './photo/thumbs/'.sha1($id.$x.$y).'.jpg';
              if(!file_exists($cestaThumb))                             
              {
                $image = Image::fromFile($fileName);
                
                if($x==null) $x = $image->width;
                if($y==null) $y = $image->height;
                
                $image->resize($x, $y, Image::EXACT);
                $image->save($cestaThumb, 80, Image::JPEG);                                
              }                                             
              return substr($cestaThumb,1);           
            }
            else
            {
              $cestaEmpty = './photo/thumbs/'.sha1('empty'.$x.$y).'.jpg';
              if(!file_exists($cestaEmpty))
              {
              
                if($x==null) $x = $image->width;
                if($y==null) $y = $image->height;              
              
                $image = Image::fromBlank($x, $y, Image::rgb(255, 255, 255));                              
                
                $image->save($cestaEmpty, 80, Image::JPEG);
              }
              return substr($cestaEmpty,1);
            }                                          
          }
          break;
          
          case 'news':
          {                    
            if(file_exists($fileName = './news/'.sha1($id.'_orig').'.jpg'))
            {
              $cestaThumb = './news/thumbs/'.sha1($id.$x.$y).'.jpg';
              if(!file_exists($cestaThumb))                             
              {
                $image = Image::fromFile($fileName);
                
                if($x==null) $x = $image->width;
                if($y==null) $y = $image->height;
                
                $image->resize($x, $y, Image::EXACT);
                $image->save($cestaThumb, 80, Image::JPEG);                                
              }                                             
              return substr($cestaThumb,1);           
            }
            else
            {
              $cestaEmpty = './news/thumbs/'.sha1('empty'.$x.$y).'.jpg';
              if(!file_exists($cestaEmpty))
              {
              
                if($x==null) $x = $image->width;
                if($y==null) $y = $image->height;              
              
                $image = Image::fromBlank($x, $y, Image::rgb(255, 255, 255));                              
                
                $image->save($cestaEmpty, 80, Image::JPEG);
              }
              return substr($cestaEmpty,1);
            }                                          
          }
          break;          
          
          case 'product':
          {             
            if(file_exists($fileName = './eshop/'.sha1($id.'_orig').'.jpg'))
            {            
              $cestaThumb = './eshop/thumbs/'.sha1($id.$x.$y).'.jpg';                
              if(!file_exists($cestaThumb))                             
              {
                $image = Image::fromFile($fileName);
                
                if($x==null) $x = $image->width;
                if($y==null) $y = $image->height;
                
                $image->resize($x, $y, Image::EXACT);
                $image->save($cestaThumb, 80, Image::JPEG);                                
              }                                                           
              return substr($cestaThumb,1);           
            }
            else
            {
              $cestaEmpty = './eshop/thumbs/'.sha1('empty'.$x.$y).'.jpg';              
              if(!file_exists($cestaEmpty))
              {              
                if($x==null) $x = $image->width;
                if($y==null) $y = $image->height;              
              
                $image = Image::fromBlank($x, $y, Image::rgb(255, 255, 255));                              
                
                $image->save($cestaEmpty, 80, Image::JPEG);
              }
              return substr($cestaEmpty,1);
            }                                          
          }
          break;          
        }
    });     
  }
}