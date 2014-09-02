<?php

/* academicoBundle:Default:listaestudiantesmatriculados.html.twig */
class __TwigTemplate_1cadfca40480b1ce5251ca87a99b888fd1a71859a1b0ffe222e9131d3d69e74b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'id' => array($this, 'block_id'),
            'article' => array($this, 'block_article'),
            'aside' => array($this, 'block_aside'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::frontend.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " INICIO ";
    }

    // line 4
    public function block_id($context, array $blocks = array())
    {
        echo "portada";
    }

    // line 5
    public function block_article($context, array $blocks = array())
    {
        // line 6
        echo "<section id=\"menu_secre\">
    ";
        // line 7
        $this->env->loadTemplate("academicoBundle:Default:menu_secretaria.html.twig")->display($context);
        // line 8
        echo "</section>
<p style=\"color: #0035C7; text-align: center\"><strong>ESTUDIANTES MATRICULADOS: &nbsp;&nbsp;";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["curso"]) ? $context["curso"] : $this->getContext($context, "curso")), "html", null, true);
        echo "</strong></p>
";
        // line 11
        if (((isset($context["sd"]) ? $context["sd"] : $this->getContext($context, "sd")) == 1)) {
            // line 12
            echo "<strong><p>Seccion Diurna:</p></strong>
<div id=\"dt_example\">
    <div id=\"demo\">
        <table class=\"display\" id=\"example\">
            <thead>
                <tr >
                    ";
            // line 19
            echo "                    <th>";
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["diurna"]) ? $context["diurna"] : $this->getContext($context, "diurna")), "Cedula", "e.cedula");
            echo "</th>
                    <th>";
            // line 20
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["diurna"]) ? $context["diurna"] : $this->getContext($context, "diurna")), "Nombre", "e.nombre");
            echo "</th>
                    <th>";
            // line 21
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["diurna"]) ? $context["diurna"] : $this->getContext($context, "diurna")), "Apellido", "e.apellido");
            echo "</th>
                    <th>";
            // line 22
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["diurna"]) ? $context["diurna"] : $this->getContext($context, "diurna")), "Correo", "e.email");
            echo "</th>
                    <th>";
            // line 23
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["diurna"]) ? $context["diurna"] : $this->getContext($context, "diurna")), "Estado", "m.estado");
            echo "</th>
                    <th>";
            // line 24
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["diurna"]) ? $context["diurna"] : $this->getContext($context, "diurna")), "Fecha", "m.fechamatricula");
            echo "</th>
                    <th>Accion</th>
                </tr>
            </thead>
    ";
            // line 28
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["diurna"]) ? $context["diurna"] : $this->getContext($context, "diurna")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["est"]) {
                // line 29
                echo "            <tbody>
                <tr ";
                // line 30
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                    echo "class=\"color\"";
                }
                echo ">
                    ";
                // line 31
                $context["estado"] = $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estado");
                // line 32
                echo "                        ";
                if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 1)) {
                    // line 33
                    echo "                            ";
                    $context["esta"] = "Activo";
                    echo "                                                    
                        ";
                }
                // line 35
                echo "                        ";
                if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 0)) {
                    // line 36
                    echo "                            ";
                    $context["esta"] = "Inactivo";
                    echo "                                                    
                        ";
                }
                // line 38
                echo "                        <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "cedula"), "html", null, true);
                echo "</td>
                        <td>";
                // line 39
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "nombre")), "html", null, true);
                echo "</td>
                        <td>";
                // line 40
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "apellido")), "html", null, true);
                echo "</td>
                        <td>";
                // line 41
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "email")), "html", null, true);
                echo "</td>
                        <td>";
                // line 42
                echo twig_escape_filter($this->env, (isset($context["esta"]) ? $context["esta"] : $this->getContext($context, "esta")), "html", null, true);
                echo "</td>
                        <td>";
                // line 43
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "fechamatricula"), "Y-m-d"), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_matriculado_modificar", array("mid" => $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "id"))), "html", null, true);
                echo "\">&nbsp;&nbsp;&nbsp;<img title=\"Modificar matricula\"  src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/edit.gif"), "html", null, true);
                echo "\"></a></td>
                <tr>
            </tbody>

    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['est'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "        </table>
            <div class=\"paginacion\">
                        ";
            // line 51
            echo $this->env->getExtension('knp_pagination')->render((isset($context["diurna"]) ? $context["diurna"] : $this->getContext($context, "diurna")));
            echo "
                     </div>
    </div>
</div>
<br>
";
        }
        // line 58
        if (((isset($context["sv"]) ? $context["sv"] : $this->getContext($context, "sv")) == 1)) {
            // line 59
            echo "<strong><p>Seccion Vespertina</p></strong>
<div id=\"dt_example\">
    <div id=\"demo\">
        <table class=\"display\" id=\"example\">
            <thead>
                <tr >
                    ";
            // line 66
            echo "                    <th>";
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["vespertina"]) ? $context["vespertina"] : $this->getContext($context, "vespertina")), "Cedula", "e.cedula");
            echo "</th>
                    <th>";
            // line 67
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["vespertina"]) ? $context["vespertina"] : $this->getContext($context, "vespertina")), "Nombre", "e.nombre");
            echo "</th>
                    <th>";
            // line 68
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["vespertina"]) ? $context["vespertina"] : $this->getContext($context, "vespertina")), "Apellido", "e.apellido");
            echo "</th>
                    <th>";
            // line 69
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["vespertina"]) ? $context["vespertina"] : $this->getContext($context, "vespertina")), "Correo", "e.email");
            echo "</th>
                    <th>";
            // line 70
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["vespertina"]) ? $context["vespertina"] : $this->getContext($context, "vespertina")), "Estado", "m.estado");
            echo "</th>
                    <th>";
            // line 71
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["vespertina"]) ? $context["vespertina"] : $this->getContext($context, "vespertina")), "Fecha", "m.fechamatricula");
            echo "</th>
                    <th>Accion</th>
                </tr>
            </thead>
    ";
            // line 75
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["vespertina"]) ? $context["vespertina"] : $this->getContext($context, "vespertina")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["est"]) {
                // line 76
                echo "            <tbody>
                <tr ";
                // line 77
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                    echo "class=\"color\"";
                }
                echo ">
                    ";
                // line 78
                $context["estado"] = $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estado");
                // line 79
                echo "                        ";
                if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 1)) {
                    // line 80
                    echo "                            ";
                    $context["esta"] = "Activo";
                    echo "                                                    
                        ";
                }
                // line 82
                echo "                        ";
                if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 0)) {
                    // line 83
                    echo "                            ";
                    $context["esta"] = "Inactivo";
                    echo "                                                    
                        ";
                }
                // line 85
                echo "                        <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "cedula"), "html", null, true);
                echo "</td>
                        <td>";
                // line 86
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "nombre")), "html", null, true);
                echo "</td>
                        <td>";
                // line 87
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "apellido")), "html", null, true);
                echo "</td>
                        <td>";
                // line 88
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "email")), "html", null, true);
                echo "</td>
                        <td>";
                // line 89
                echo twig_escape_filter($this->env, (isset($context["esta"]) ? $context["esta"] : $this->getContext($context, "esta")), "html", null, true);
                echo "</td><td>";
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "fechamatricula"), "Y-m-d"), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 90
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_matriculado_modificar", array("mid" => $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "id"))), "html", null, true);
                echo "\">&nbsp;&nbsp;&nbsp;<img title=\"Modificar matricula\"  src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/edit.gif"), "html", null, true);
                echo "\"></a></td>
                <tr>
            </tbody>

    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['est'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "        </table>
            <div class=\"paginacion\">
                        ";
            // line 97
            echo $this->env->getExtension('knp_pagination')->render((isset($context["vespertina"]) ? $context["vespertina"] : $this->getContext($context, "vespertina")));
            echo "
                     </div>
    </div>

</div>
<br>
";
        }
        // line 105
        if (((isset($context["sn"]) ? $context["sn"] : $this->getContext($context, "sn")) == 1)) {
            // line 106
            echo "<strong><p>Seccion Noctuna</p></strong>
<div id=\"dt_example\">
    <div id=\"demo\">
        <table class=\"display\" id=\"example\">
            <thead>
                <tr >
                    ";
            // line 113
            echo "                        
                    <th>";
            // line 114
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["nocturna"]) ? $context["nocturna"] : $this->getContext($context, "nocturna")), "Cedula", "e.cedula");
            echo "</th>
                    <th>";
            // line 115
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["nocturna"]) ? $context["nocturna"] : $this->getContext($context, "nocturna")), "Nombre", "e.nombre");
            echo "</th>
                    <th>";
            // line 116
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["nocturna"]) ? $context["nocturna"] : $this->getContext($context, "nocturna")), "Apellido", "e.apellido");
            echo "</th>
                    <th>";
            // line 117
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["nocturna"]) ? $context["nocturna"] : $this->getContext($context, "nocturna")), "Correo", "e.email");
            echo "</th>
                    <th>";
            // line 118
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["nocturna"]) ? $context["nocturna"] : $this->getContext($context, "nocturna")), "Estado", "m.estado");
            echo "</th>
                    <th>";
            // line 119
            echo $this->env->getExtension('knp_pagination')->sortable((isset($context["nocturna"]) ? $context["nocturna"] : $this->getContext($context, "nocturna")), "Fecha", "m.fechamatricula");
            echo "</th>
                    <th>Accion</th>    
                </tr>
            </thead>
    ";
            // line 123
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["nocturna"]) ? $context["nocturna"] : $this->getContext($context, "nocturna")));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["est"]) {
                // line 124
                echo "            <tbody>
                <tr ";
                // line 125
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                    echo "class=\"color\"";
                }
                echo ">
                    ";
                // line 126
                $context["estado"] = $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estado");
                // line 127
                echo "                        ";
                if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 1)) {
                    // line 128
                    echo "                            ";
                    $context["esta"] = "Activo";
                    echo "                                                    
                        ";
                }
                // line 130
                echo "                        ";
                if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 0)) {
                    // line 131
                    echo "                            ";
                    $context["esta"] = "Inactivo";
                    echo "                                                    
                        ";
                }
                // line 133
                echo "                        <td>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "cedula"), "html", null, true);
                echo "</td><td>";
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "nombre")), "html", null, true);
                echo "</td>
                        <td>";
                // line 134
                echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "apellido")), "html", null, true);
                echo "</td>
                        <td>";
                // line 135
                echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "email")), "html", null, true);
                echo "</td>
                        <td>";
                // line 136
                echo twig_escape_filter($this->env, (isset($context["esta"]) ? $context["esta"] : $this->getContext($context, "esta")), "html", null, true);
                echo "</td>
                        <td>";
                // line 137
                echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "fechamatricula"), "Y-m-d"), "html", null, true);
                echo "</td>
                        <td><a href=\"";
                // line 138
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_matriculado_modificar", array("mid" => $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "id"))), "html", null, true);
                echo "\">&nbsp;&nbsp;&nbsp;<img title=\"Modificar matricula\"  src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/edit.gif"), "html", null, true);
                echo "\"></a></td>
                <tr>
            </tbody>

    ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['est'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 143
            echo "        </table>
            <div class=\"paginacion\">
                        ";
            // line 145
            echo $this->env->getExtension('knp_pagination')->render((isset($context["nocturna"]) ? $context["nocturna"] : $this->getContext($context, "nocturna")));
            echo "
                     </div>
    </div>

</div>
<br><br>
";
        }
        // line 152
        echo "
";
    }

    // line 154
    public function block_aside($context, array $blocks = array())
    {
        // line 155
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
        <strong><p align=\"left\">Cursos</p></strong>
    <div id=\"relacionadas\">
        <ul>
    ";
        // line 159
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["niveles"]) ? $context["niveles"] : $this->getContext($context, "niveles")));
        foreach ($context['_seq'] as $context["_key"] => $context["niv"]) {
            // line 160
            echo "                <li><a class=\"boton\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_lista_matriculados_x_secciones", array("nivel" => $this->getAttribute((isset($context["niv"]) ? $context["niv"] : $this->getContext($context, "niv")), "id"), "nivel" => $this->getAttribute((isset($context["niv"]) ? $context["niv"] : $this->getContext($context, "niv")), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["niv"]) ? $context["niv"] : $this->getContext($context, "niv")), "curso")), "html", null, true);
            echo "&nbsp;&nbsp;";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["niv"]) ? $context["niv"] : $this->getContext($context, "niv")), "paralelo")), "html", null, true);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['niv'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 162
        echo "
            </ul>
        </div>
        <a title=\"Cierra la sesión actual\" href=\"";
        // line 165
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:listaestudiantesmatriculados.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 75,  232 => 71,  228 => 70,  216 => 67,  192 => 51,  113 => 29,  137 => 34,  70 => 20,  185 => 50,  172 => 45,  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 70,  153 => 61,  150 => 60,  127 => 33,  124 => 32,  114 => 27,  76 => 25,  236 => 73,  226 => 67,  223 => 66,  205 => 60,  202 => 59,  191 => 51,  155 => 41,  84 => 21,  97 => 26,  81 => 22,  34 => 6,  213 => 62,  206 => 52,  195 => 56,  186 => 58,  178 => 52,  170 => 51,  167 => 44,  161 => 42,  146 => 41,  134 => 33,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 50,  194 => 63,  188 => 49,  160 => 47,  152 => 43,  148 => 43,  126 => 33,  118 => 31,  110 => 31,  90 => 24,  77 => 21,  58 => 11,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 51,  128 => 31,  107 => 36,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 133,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 69,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 42,  143 => 36,  135 => 53,  119 => 28,  102 => 29,  71 => 17,  67 => 17,  63 => 15,  59 => 14,  38 => 4,  94 => 27,  89 => 24,  85 => 23,  75 => 18,  68 => 19,  56 => 13,  87 => 30,  21 => 2,  26 => 6,  93 => 37,  88 => 32,  78 => 21,  46 => 6,  27 => 4,  44 => 6,  31 => 3,  28 => 3,  201 => 58,  196 => 90,  183 => 41,  171 => 74,  166 => 50,  163 => 43,  158 => 62,  156 => 45,  151 => 40,  142 => 38,  138 => 36,  136 => 36,  121 => 46,  117 => 28,  105 => 25,  91 => 22,  62 => 14,  49 => 7,  24 => 1,  25 => 3,  19 => 1,  79 => 22,  72 => 18,  69 => 23,  47 => 7,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 50,  145 => 41,  139 => 40,  131 => 52,  123 => 29,  120 => 43,  115 => 27,  111 => 33,  108 => 33,  101 => 40,  98 => 33,  96 => 28,  83 => 25,  74 => 21,  66 => 19,  55 => 11,  52 => 11,  50 => 8,  43 => 5,  41 => 8,  35 => 4,  32 => 2,  29 => 3,  209 => 82,  203 => 59,  199 => 67,  193 => 62,  189 => 71,  187 => 49,  182 => 49,  176 => 46,  173 => 52,  168 => 72,  164 => 43,  162 => 48,  154 => 67,  149 => 42,  147 => 39,  144 => 42,  141 => 48,  133 => 35,  130 => 41,  125 => 30,  122 => 31,  116 => 30,  112 => 34,  109 => 26,  106 => 30,  103 => 32,  99 => 24,  95 => 37,  92 => 36,  86 => 22,  82 => 29,  80 => 19,  73 => 20,  64 => 16,  60 => 12,  57 => 12,  54 => 9,  51 => 8,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
