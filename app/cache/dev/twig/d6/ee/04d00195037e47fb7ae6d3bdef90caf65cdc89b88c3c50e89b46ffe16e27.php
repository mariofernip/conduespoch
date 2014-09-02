<?php

/* academicoBundle:Default:listaestudiantesinscritos.html.twig */
class __TwigTemplate_d6ee04d00195037e47fb7ae6d3bdef90caf65cdc89b88c3c50e89b46ffe16e27 extends Twig_Template
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
<p style=\"color: #0035C7; text-align: center\"><strong>ESTUDIANTES INSCRITOS</strong></p>
 ";
        // line 11
        echo "<div id=\"dt_example\">
    <div id=\"demo\">
        <div class=\"count\">
            ";
        // line 15
        echo "            </div>
            <table class=\"display\" id=\"example\">
                <thead>
                    <tr>
                        <th>";
        // line 19
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Cedula", "e.cedula");
        echo "</th>
                        <th";
        // line 20
        if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "isSorted", array(0 => "e.nombre"), "method")) {
            echo " class=\"sorted\"";
        }
        echo ">";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Nombre", "e.nombre");
        echo "</th>                            
                        <th";
        // line 21
        if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "isSorted", array(0 => "e.email"), "method")) {
            echo " class=\"sorted\"";
        }
        echo ">";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Correo", "e.email");
        echo "</th>
                        <th ";
        // line 22
        if ($this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "isSorted", array(0 => "i.estado"), "method")) {
            echo " class=\"sorted\"";
        }
        echo ">";
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")), "Estado", "i.estado");
        echo "</th>
                        <th>Acciones</th>
                        </tr>
                    </thead>
                   ";
        // line 26
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
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
            // line 27
            echo "                    <tbody>
                        <tr ";
            // line 28
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                echo "class=\"color\"";
            }
            echo ">
                    ";
            // line 29
            $context["estado"] = $this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estado");
            // line 30
            echo "                        ";
            if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 1)) {
                // line 31
                echo "                            ";
                $context["esta"] = "Activo";
                echo "                                                    
                        ";
            }
            // line 33
            echo "                        ";
            if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 0)) {
                // line 34
                echo "                            ";
                $context["esta"] = "Inactivo";
                echo "                                                    
                        ";
            }
            // line 36
            echo "                                <td>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "cedula"), "html", null, true);
            echo "</td><td>";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "nombre")), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "apellido")), "html", null, true);
            echo "</td><td>";
            echo twig_escape_filter($this->env, twig_lower_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "email")), "html", null, true);
            echo "</td><td>";
            echo twig_escape_filter($this->env, (isset($context["esta"]) ? $context["esta"] : $this->getContext($context, "esta")), "html", null, true);
            echo "</td><td>&nbsp;&nbsp;<a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_modificar_datos", array("cedula" => $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "cedula"))), "html", null, true);
            echo "\"><img title=\"Editar datos\"  src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/edit.gif"), "html", null, true);
            echo "\"></a>&nbsp;&nbsp<samp>     <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_requisito", array("cedula" => $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "cedula"))), "html", null, true);
            echo "\"><img   title=\"Ver requisitos\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/list.gif"), "html", null, true);
            echo "\"></a></samp>&nbsp;&nbsp;&nbsp;<span><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("estudiante_matricula", array("cedula" => $this->getAttribute($this->getAttribute((isset($context["est"]) ? $context["est"] : $this->getContext($context, "est")), "estudiante"), "cedula"))), "html", null, true);
            echo "\"><img   title=\"Matricular\" src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/mat.gif"), "html", null, true);
            echo "\"></a></span></td>
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
        // line 41
        echo "                    </table>

                    <div class=\"paginacion\">
                        ";
        // line 44
        echo $this->env->getExtension('knp_pagination')->render((isset($context["pagination"]) ? $context["pagination"] : $this->getContext($context, "pagination")));
        echo "
                     </div>
               </div>

<br><br>
";
    }

    // line 50
    public function block_aside($context, array $blocks = array())
    {
        // line 51
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <a title=\"Cierra la sesión actual\" href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:listaestudiantesinscritos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  137 => 34,  70 => 20,  185 => 50,  172 => 45,  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 70,  153 => 61,  150 => 60,  127 => 46,  124 => 49,  114 => 27,  76 => 25,  236 => 73,  226 => 67,  223 => 66,  205 => 60,  202 => 59,  191 => 51,  155 => 43,  84 => 21,  97 => 26,  81 => 30,  34 => 6,  213 => 62,  206 => 52,  195 => 56,  186 => 58,  178 => 52,  170 => 51,  167 => 44,  161 => 42,  146 => 41,  134 => 33,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 120,  256 => 89,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 72,  198 => 50,  194 => 63,  188 => 44,  160 => 47,  152 => 43,  148 => 43,  126 => 33,  118 => 31,  110 => 31,  90 => 24,  77 => 17,  58 => 13,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 123,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 70,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 51,  128 => 31,  107 => 36,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 133,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 44,  143 => 36,  135 => 53,  119 => 28,  102 => 29,  71 => 17,  67 => 17,  63 => 15,  59 => 14,  38 => 4,  94 => 27,  89 => 24,  85 => 21,  75 => 18,  68 => 17,  56 => 13,  87 => 30,  21 => 2,  26 => 6,  93 => 37,  88 => 32,  78 => 21,  46 => 6,  27 => 4,  44 => 6,  31 => 3,  28 => 3,  201 => 51,  196 => 90,  183 => 41,  171 => 74,  166 => 50,  163 => 45,  158 => 62,  156 => 45,  151 => 35,  142 => 59,  138 => 36,  136 => 56,  121 => 46,  117 => 28,  105 => 25,  91 => 22,  62 => 14,  49 => 7,  24 => 1,  25 => 3,  19 => 1,  79 => 22,  72 => 18,  69 => 23,  47 => 7,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 50,  145 => 41,  139 => 40,  131 => 52,  123 => 29,  120 => 43,  115 => 27,  111 => 33,  108 => 33,  101 => 40,  98 => 33,  96 => 23,  83 => 25,  74 => 21,  66 => 19,  55 => 11,  52 => 11,  50 => 8,  43 => 5,  41 => 8,  35 => 4,  32 => 2,  29 => 3,  209 => 82,  203 => 69,  199 => 67,  193 => 62,  189 => 71,  187 => 49,  182 => 49,  176 => 46,  173 => 52,  168 => 72,  164 => 43,  162 => 48,  154 => 67,  149 => 42,  147 => 33,  144 => 42,  141 => 48,  133 => 55,  130 => 41,  125 => 30,  122 => 32,  116 => 35,  112 => 34,  109 => 26,  106 => 30,  103 => 32,  99 => 24,  95 => 37,  92 => 36,  86 => 22,  82 => 29,  80 => 19,  73 => 16,  64 => 16,  60 => 15,  57 => 12,  54 => 10,  51 => 8,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
