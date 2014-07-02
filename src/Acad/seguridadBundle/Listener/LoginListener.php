<?php

namespace Acad\seguridadBundle\Listener;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\Routing\Router;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;


class LoginListener 
{
    
    private $router,$role = null;
          

    public function __construct(Router $router) {
        $this->router=$router;
    } 

    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event) {
        
        $token=$event->getAuthenticationToken();
        $this->role=$token->getUser()->getRol()->getNombre();
    }
    
    public function onKernelResponse(FilterResponseEvent $event) {
        
        if(null!= $this->role){
            $portada = $this->router->generate('portada',array(
               'role'=>  $this->role 
            ));
            
            $event->setResponse(new RedirectResponse($portada));
        }
        
    }

}

?>
