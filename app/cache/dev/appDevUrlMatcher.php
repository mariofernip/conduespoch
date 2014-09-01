<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // seguridad_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'seguridad_homepage')), array (  '_controller' => 'Acad\\seguridadBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/login')) {
            // usuario_login
            if ($pathinfo === '/login') {
                return array (  '_controller' => 'Acad\\seguridadBundle\\Controller\\DefaultController::loginAction',  '_route' => 'usuario_login',);
            }

            // usuario_login_check
            if ($pathinfo === '/login_check') {
                return array('_route' => 'usuario_login_check');
            }

        }

        // usuario_logout
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'usuario_logout');
            }

            return array('_route' => 'usuario_logout');
        }

        // usuario_registro
        if ($pathinfo === '/admin/usuario/registro') {
            return array (  '_controller' => 'Acad\\seguridadBundle\\Controller\\defaultController::registroAction',  '_route' => 'usuario_registro',);
        }

        // administrativo_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'administrativo_homepage')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/admin')) {
            // docente_registro
            if ($pathinfo === '/admin/docente/registro') {
                return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::registrodocenteAction',  '_route' => 'docente_registro',);
            }

            if (0 === strpos($pathinfo, '/admin/periodo')) {
                // periodo_registro
                if ($pathinfo === '/admin/periodo/registro') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::registroperiodoAction',  '_route' => 'periodo_registro',);
                }

                // periodo_modificar
                if ($pathinfo === '/admin/periodo/modificar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::periodomodificarAction',  '_route' => 'periodo_modificar',);
                }

            }

            // mes_evaluacion
            if (0 === strpos($pathinfo, '/admin/mes/evaluacion') && preg_match('#^/admin/mes/evaluacion/(?P<pid>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'mes_evaluacion')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::mesevaluacionAction',));
            }

            // admin_portada
            if ($pathinfo === '/admin/portada') {
                return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::portadaAction',  '_route' => 'admin_portada',);
            }

            if (0 === strpos($pathinfo, '/admin/mes')) {
                // admin_mes_registro
                if ($pathinfo === '/admin/mes/registro') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::registromesAction',  '_route' => 'admin_mes_registro',);
                }

                // admin_mes_listar_todos
                if ($pathinfo === '/admin/mes/lista') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listatodosmesesAction',  '_route' => 'admin_mes_listar_todos',);
                }

                // admin_mes_modificar
                if (0 === strpos($pathinfo, '/admin/mes/modificar') && preg_match('#^/admin/mes/modificar/(?P<codmes>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_mes_modificar')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::mesmodicarAction',));
                }

                // admin_mes_modificar_todos
                if ($pathinfo === '/admin/mes/cambiar/estados') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::mesmodicartodosAction',  '_route' => 'admin_mes_modificar_todos',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/nivel')) {
                // admin_nivel_registro
                if ($pathinfo === '/admin/nivel/registro') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::nivelregistroAction',  '_route' => 'admin_nivel_registro',);
                }

                // admin_nivel_listar_todos
                if ($pathinfo === '/admin/nivel/lista') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listatodosnivelesAction',  '_route' => 'admin_nivel_listar_todos',);
                }

                // admin_nivel_modificar
                if (0 === strpos($pathinfo, '/admin/nivel/modificar') && preg_match('#^/admin/nivel/modificar/(?P<codnivel>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_nivel_modificar')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::nivelmodicarAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/requisito')) {
                // admin_requisito_registro
                if ($pathinfo === '/admin/requisito/registro') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::requisitoregistroAction',  '_route' => 'admin_requisito_registro',);
                }

                // admin_requisito_listar_todos
                if ($pathinfo === '/admin/requisito/lista') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listatodosrequisitosAction',  '_route' => 'admin_requisito_listar_todos',);
                }

                // admin_requisito_modificar
                if (0 === strpos($pathinfo, '/admin/requisito/modificar') && preg_match('#^/admin/requisito/modificar/(?P<codreq>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_requisito_modificar')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::requisitomodicarAction',));
                }

                // admin_requisito_modificar_estados
                if ($pathinfo === '/admin/requisito/cambiar/estados') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::requisitomodicarestadosAction',  '_route' => 'admin_requisito_modificar_estados',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/area')) {
                // area_ingresar
                if ($pathinfo === '/admin/area/ingresar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::areaIngresarAction',  '_route' => 'area_ingresar',);
                }

                // area_modificar
                if ($pathinfo === '/admin/area/listar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listaareaModificarAction',  '_route' => 'area_modificar',);
                }

                // area_modificar_id
                if (0 === strpos($pathinfo, '/admin/area/modificar') && preg_match('#^/admin/area/modificar/(?P<aid>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'area_modificar_id')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::areaModificarAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/curso')) {
                // curso_ingresar
                if ($pathinfo === '/admin/curso/ingresar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::cursoIngresarAction',  '_route' => 'curso_ingresar',);
                }

                // curso_modificar
                if ($pathinfo === '/admin/curso/listar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listacursoModificarAction',  '_route' => 'curso_modificar',);
                }

                // curso_modificar_id
                if (0 === strpos($pathinfo, '/admin/curso/modificar') && preg_match('#^/admin/curso/modificar/(?P<cid>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'curso_modificar_id')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::cursoModificarAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/docente')) {
                // docente_ingresar
                if ($pathinfo === '/admin/docente/ingresar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::registrodocenteAction',  '_route' => 'docente_ingresar',);
                }

                // docente_modificar
                if ($pathinfo === '/admin/docente/listar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listadocenteModificarAction',  '_route' => 'docente_modificar',);
                }

                // docente_modificar_id
                if (0 === strpos($pathinfo, '/admin/docente/modificar') && preg_match('#^/admin/docente/modificar/(?P<did>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'docente_modificar_id')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::docenteModificarAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/hora')) {
                // hora_ingresar
                if ($pathinfo === '/admin/hora/ingresar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::horaIngresarAction',  '_route' => 'hora_ingresar',);
                }

                // hora_modificar
                if ($pathinfo === '/admin/hora/listar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listahoraModificarAction',  '_route' => 'hora_modificar',);
                }

                // hora_modificar_id
                if (0 === strpos($pathinfo, '/admin/hora/modificar') && preg_match('#^/admin/hora/modificar/(?P<hid>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'hora_modificar_id')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::horaModificarAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/materia')) {
                // materia_ingresar
                if ($pathinfo === '/admin/materia/ingresar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::materiaIngresarAction',  '_route' => 'materia_ingresar',);
                }

                // materia_modificar
                if ($pathinfo === '/admin/materia/listar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listamateriaModificarAction',  '_route' => 'materia_modificar',);
                }

                // materia_modificar_id
                if (0 === strpos($pathinfo, '/admin/materia/modificar') && preg_match('#^/admin/materia/modificar/(?P<mid>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'materia_modificar_id')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::materiaModificarAction',));
                }

                // materia_modificar_todos
                if ($pathinfo === '/admin/materias/modificar/todos') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::materiaModificartodosAction',  '_route' => 'materia_modificar_todos',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/usuario')) {
                // usuario_modificar
                if ($pathinfo === '/admin/usuario/listar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listausuarioModificarAction',  '_route' => 'usuario_modificar',);
                }

                // usuario_modificar_id
                if (0 === strpos($pathinfo, '/admin/usuario/modificar') && preg_match('#^/admin/usuario/modificar/(?P<uid>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'usuario_modificar_id')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::usuarioModificarAction',));
                }

            }

            if (0 === strpos($pathinfo, '/admin/paralelo')) {
                // admin_paralelo_registro
                if ($pathinfo === '/admin/paralelo/registro') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::paraleloregistroAction',  '_route' => 'admin_paralelo_registro',);
                }

                // admin_paralelo_modificar
                if (0 === strpos($pathinfo, '/admin/paralelo/modificar') && preg_match('#^/admin/paralelo/modificar/(?P<codpar>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_paralelo_modificar')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::paralelomodificarAction',));
                }

                // admin_paralelo_listar_todos
                if ($pathinfo === '/admin/paralelo/listar') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listatodosparalelosAction',  '_route' => 'admin_paralelo_listar_todos',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/dias')) {
                // admin_dia_registro
                if ($pathinfo === '/admin/dias/registro') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::diaregistroAction',  '_route' => 'admin_dia_registro',);
                }

                // admin_dia_modificar
                if (0 === strpos($pathinfo, '/admin/dias/modificar') && preg_match('#^/admin/dias/modificar/(?P<coddia>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_dia_modificar')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::diamodificarAction',));
                }

                // admin_dia_listar_todos
                if ($pathinfo === '/admin/dias/lista') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::listartodosdiasAction',  '_route' => 'admin_dia_listar_todos',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/materia/grado')) {
                // admin_materiagrado_registro
                if ($pathinfo === '/admin/materia/grado/registro') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::materiagradoregistrarAction',  '_route' => 'admin_materiagrado_registro',);
                }

                // admin_materiagrado_modificar
                if (0 === strpos($pathinfo, '/admin/materia/grado/modificar') && preg_match('#^/admin/materia/grado/modificar/(?P<codmg>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_materiagrado_modificar')), array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::materiagradomodificarAction',));
                }

                // admin_materiagrado_listar_todos
                if ($pathinfo === '/admin/materia/grado/lista') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::materiagradolistatodosAction',  '_route' => 'admin_materiagrado_listar_todos',);
                }

            }

            if (0 === strpos($pathinfo, '/admin/configuracion')) {
                // admin_configuracion_general
                if ($pathinfo === '/admin/configuracion/general') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::configuraciongeneralAction',  '_route' => 'admin_configuracion_general',);
                }

                // admin_configuracion_actual
                if ($pathinfo === '/admin/configuracion/actual') {
                    return array (  '_controller' => 'Acad\\administrativoBundle\\Controller\\DefaultController::configuracionactualAction',  '_route' => 'admin_configuracion_actual',);
                }

            }

        }

        // academico_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'academico_homepage')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\DefaultController::indexAction',));
        }

        if (0 === strpos($pathinfo, '/secretaria/estudiante')) {
            if (0 === strpos($pathinfo, '/secretaria/estudiante/re')) {
                // estudiante_registro
                if ($pathinfo === '/secretaria/estudiante/registro') {
                    return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::registroEstudianteAction',  '_route' => 'estudiante_registro',);
                }

                // estudiante_requisito
                if (0 === strpos($pathinfo, '/secretaria/estudiante/requisito') && preg_match('#^/secretaria/estudiante/requisito/(?P<cedula>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'estudiante_requisito')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::requisitoEstudianteAction',));
                }

                // estudiante_registro_p
                if (0 === strpos($pathinfo, '/secretaria/estudiante/registro') && preg_match('#^/secretaria/estudiante/registro/(?P<cedula>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'estudiante_registro_p')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::registroEstudiantepAction',));
                }

            }

            // estudiante_busqueda
            if ($pathinfo === '/secretaria/estudiante/consulta/inscripcion') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::buscarEstAction',  '_route' => 'estudiante_busqueda',);
            }

        }

        if (0 === strpos($pathinfo, '/amaterias')) {
            // amaterias_dictadomateria
            if ($pathinfo === '/amaterias/materias') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::dictadomateriaAction',  '_route' => 'amaterias_dictadomateria',);
            }

            // amaterias_lista_materias_asignadas
            if ($pathinfo === '/amaterias/lista/materias-asignadas') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::listadictadomateriaAction',  '_route' => 'amaterias_lista_materias_asignadas',);
            }

            // amaterias_modificar_materias_asignadas
            if (0 === strpos($pathinfo, '/amaterias/modificar/materias-asignadas') && preg_match('#^/amaterias/modificar/materias\\-asignadas/(?P<codm>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'amaterias_modificar_materias_asignadas')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::modificardictadomateriaAction',));
            }

            // amaterias_eliminar_materias_asignadas
            if ($pathinfo === '/amaterias/eliminar/materias-asignadas') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::eliminardictadomateriaAction',  '_route' => 'amaterias_eliminar_materias_asignadas',);
            }

        }

        if (0 === strpos($pathinfo, '/secretaria/estudiante')) {
            // estudiante_matricula
            if (0 === strpos($pathinfo, '/secretaria/estudiante/matricula') && preg_match('#^/secretaria/estudiante/matricula/(?P<cedula>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'estudiante_matricula')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::matriculaEstudianteAction',));
            }

            // estudiante_buscar
            if ($pathinfo === '/secretaria/estudiante/consulta/matricula') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::matriculaBuscarEstudianteAction',  '_route' => 'estudiante_buscar',);
            }

        }

        // docente_notas_x_materia
        if (0 === strpos($pathinfo, '/docente/notas/parciales/lista/estudiantes') && preg_match('#^/docente/notas/parciales/lista/estudiantes/(?P<mesid>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'docente_notas_x_materia')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::notasAction',));
        }

        if (0 === strpos($pathinfo, '/secretaria/estudiante')) {
            // estudiante_lista_inscritos
            if ($pathinfo === '/secretaria/estudiante/lista/inscritos') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::listaestudiantesinscritosAction',  '_route' => 'estudiante_lista_inscritos',);
            }

            // estudiante_modificar_datos
            if (0 === strpos($pathinfo, '/secretaria/estudiante/modificar') && preg_match('#^/secretaria/estudiante/modificar/(?P<cedula>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'estudiante_modificar_datos')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::modificarestudianteAction',));
            }

            // estudiante_lista_matriculados_x_secciones
            if (0 === strpos($pathinfo, '/secretaria/estudiante/lista/matriculados') && preg_match('#^/secretaria/estudiante/lista/matriculados/(?P<nivel>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'estudiante_lista_matriculados_x_secciones')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::listaestudiantesxseccionesAction',));
            }

            // estudiante_matriculado_modificar
            if (0 === strpos($pathinfo, '/secretaria/estudiante/matriculado/modificar') && preg_match('#^/secretaria/estudiante/matriculado/modificar/(?P<mid>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'estudiante_matriculado_modificar')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::modificarmatriculaAction',));
            }

        }

        if (0 === strpos($pathinfo, '/inspector')) {
            // estudiante_lista_matriculados_x_materia_x_secciones
            if (0 === strpos($pathinfo, '/inspector/estudiante/lista/materias') && preg_match('#^/inspector/estudiante/lista/materias/(?P<materias>[^/]++)/(?P<nivel>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'estudiante_lista_matriculados_x_materia_x_secciones')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::listaestudiantesxseccionesmateriaAction',));
            }

            // lista_materia_x_nivel
            if (0 === strpos($pathinfo, '/inspector/lista/materias') && preg_match('#^/inspector/lista/materias/(?P<nivel>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'lista_materia_x_nivel')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::listamateriasxnivelAction',));
            }

        }

        if (0 === strpos($pathinfo, '/docente')) {
            if (0 === strpos($pathinfo, '/docente/notas/suspenso/lista/estudiantes')) {
                // docente_lista_materias_suspenso
                if ($pathinfo === '/docente/notas/suspenso/lista/estudiantes') {
                    return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::notasuspensoAction',  '_route' => 'docente_lista_materias_suspenso',);
                }

                // docente_notas_suspenso
                if ($pathinfo === '/docente/notas/suspenso/lista/estudiantes') {
                    return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::notasuspensoAction',  '_route' => 'docente_notas_suspenso',);
                }

            }

            // docente_variable_sesion
            if (0 === strpos($pathinfo, '/docente/portada') && preg_match('#^/docente/portada/(?P<niv>[^/]++)/(?P<mat>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'docente_variable_sesion')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::sesionportadaAction',));
            }

            // docente_notas_parciales_x_mes
            if (0 === strpos($pathinfo, '/docente/notas/parciales/mes') && preg_match('#^/docente/notas/parciales/mes/(?P<codmes>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'docente_notas_parciales_x_mes')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::notasparcialesxmesAction',));
            }

            // docente_acta_general_calificaciones_estudiantes
            if ($pathinfo === '/docente/acta/general/estudiantes') {
                return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::actageneralcalificacionesestudiantesAction',  '_route' => 'docente_acta_general_calificaciones_estudiantes',);
            }

        }

        // inspector_horario_asignar
        if (0 === strpos($pathinfo, '/inspector/horario-clases/asignar') && preg_match('#^/inspector/horario\\-clases/asignar/(?P<did>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'inspector_horario_asignar')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::horarioclaseAction',));
        }

        // docente_ver_horario
        if ($pathinfo === '/docente/ver/horario/docente') {
            return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::verhorariodocenteAction',  '_route' => 'docente_ver_horario',);
        }

        if (0 === strpos($pathinfo, '/inspector')) {
            // inspector_lista_materiasgrado_x_nivel
            if (0 === strpos($pathinfo, '/inspector/materias/grado/lista') && preg_match('#^/inspector/materias/grado/lista/(?P<codniv>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'inspector_lista_materiasgrado_x_nivel')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::listamateriasgradoAction',));
            }

            // inspector_examengrado_registro_notas
            if (0 === strpos($pathinfo, '/inspector/examenes/grado/notas') && preg_match('#^/inspector/examenes/grado/notas/(?P<codmg>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'inspector_examengrado_registro_notas')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::notasgradoAction',));
            }

        }

        // secretaria_requisito_listar_todos
        if ($pathinfo === '/secretaria/consulta/requisitos/lista') {
            return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::listatodosrequisitosAction',  '_route' => 'secretaria_requisito_listar_todos',);
        }

        // modificar_perfil
        if (preg_match('#^/(?P<rol>[^/]++)/modificar/perfil$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'modificar_perfil')), array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::modificarperfildocenteAction',));
        }

        // acta_general_calificaciones_reporte
        if ($pathinfo === '/docente/acta/general/reporte') {
            return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\defaultController::reporteactageneralcalificacionesestudiantesAction',  '_format' => 'pdf',  '_route' => 'acta_general_calificaciones_reporte',);
        }

        // _portada
        if ($pathinfo === '/inicio') {
            return array (  '_controller' => 'Acad\\academicoBundle\\Controller\\DefaultController::portadaAction',  '_route' => '_portada',);
        }

        // portada
        if (preg_match('#^/(?P<role>[^/]++)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'portada')), array (  '_controller' => 'Acad\\seguridadBundle\\Controller\\DefaultController::portadaAction',  'role' => NULL,));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
