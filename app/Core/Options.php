<?php

namespace app\Core;

/**
 * Description of Menu
 *
 * @author Jonathan
 */
class Options {
    
    protected static $default = '/biblioteca';
    
    public static function getAll(){
        
        $menus = Session::getValue('menu');
        $mainmenu = self::getSections($menus); 
        $submenu = self::getOptions($menus);
        
        $url = Navegation::getUrl();
        $subMenu = self::getStateOptions($submenu, $url);
        
        $urlArray = explode('/', $url);
        $mainMenu = self::getStateSections($mainmenu, $urlArray[0]);
        if(!self::validate($mainMenu)){
            $mainMenu = self::setDefault($mainMenu);
        }
        
        return ['mainmenu' => $mainMenu, 'submenu' => $subMenu];
        
    }
    
    
    private static function getStateSections($mainmenu, $url){
        foreach ($mainmenu as $menu) {
            switch ('/'.$url) {
                case $menu->getUrl():
                    $menu->setEstado('visible');
                    break;

                case $menu->getUrl().'Add':
                    $menu->setEstado('visible');
                    break;

                case $menu->getUrl().'Edit':
                    $menu->setEstado('visible');
                    break;

                case $menu->getUrl().'Detail':
                    $menu->setEstado('visible');
                    break;
                
                default:
                    $menu->setEstado('hidden'); 
                    break;
            }
        }    
        return $mainmenu;
        
    }
    
    
    private static function getSections($menus){
        
        $mainmenu = [];
        foreach ($menus as $menu) {
            if(is_null($menu->getIdPadre()) or $menu->getIdPadre() == 0){
                $mainmenu[] = $menu;
            }
        }
        return $mainmenu;
    }
    
    
    private static function getOptions($menus){
        
        $submenu = [];
        foreach ($menus as $menu) {
            if($menu->getIdPadre() != 0){
                $submenu[] = $menu;
            }
        }
        return $submenu;
    }
    
    
    private static function getStateOptions($submenu, $url){
        
        foreach ($submenu as $menu) {
            switch ('/'.$url) {
                case $menu->getUrl():
                    $menu->setEstado('active');
                    break;

                case $menu->getUrl().'Add':
                    $menu->setEstado('active');
                    break;

                case $menu->getUrl().'Edit':
                    $menu->setEstado('active');
                    break;

                case $menu->getUrl().'Detail':
                    $menu->setEstado('active');
                    break;
                
                default:
                    $menu->setEstado('inactive'); 
                    break;
            }            
            
        }
        
        return $submenu;
        
    }
    
    
    private static function setDefault($mainmenu){
        
        foreach ($mainmenu as $menu) {           
            if($menu->getUrl() == self::$default){
                $menu->setEstado('visible');
            }else{
                $menu->setEstado('hidden'); 
            }
        }
        return $mainmenu;
    }
    
    
    private static function validate($mainmenu){
        
        foreach ($mainmenu as $menu) {          
            if($menu->getEstado() == 'visible'){
                return true;
            }
        }
        return false;
        
    }
    
    
}
?>