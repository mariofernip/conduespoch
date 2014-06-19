<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/hello')) {
            // seguridad_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'seguridad_homepage')), array (  '_controller' => 'Acad\\seguridadBundle\\Controller\\DefaultController::indexAction',));
            }

            // administrativo_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'administrativo_homepage')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::indexAction',));
            }

            // academico_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'academico_homepage')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\DefaultController::indexAction',));
            }

        }

        // _portada
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\DefaultController::portadaAction',  '_route' => '_portada',);
        }

        if (0 === strpos($pathinfo, '/estudiante/re')) {
            // estudiante_registro
            if ($pathinfo === '/estudiante/registro') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::registroEstudianteAction',  '_route' => 'estudiante_registro',);
            }

            // estudiante_requisito
            if ($pathinfo === '/estudiante/requisito') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::requisitoEstudianteAction',  '_route' => 'estudiante_requisito',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
