<?php

/* academicoBundle:Default:listadictadomateria.html.twig */
class __TwigTemplate_492ab16a5c07c0d75e57e5b5a4817bd0f2996df107dfe9a7172b541f4387037c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::frontend.html.twig");

        $this->blocks = array(
            'id' => array($this, 'block_id'),
            'title' => array($this, 'block_title'),
            'article' => array($this, 'block_article'),
            'aside' => array($this, 'block_aside'),
            'javascripts' => array($this, 'block_javascripts'),
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

    // line 2
    public function block_id($context, array $blocks = array())
    {
        echo "amaterias";
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Materias docente";
    }

    // line 6
    public function block_article($context, array $blocks = array())
    {
        // line 7
        echo "
<h1>";
        // line 8
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>
<br>
    <div id=\"dt_example\">
        <div id=\"demo\">
        <table class=\"display\" id=\"example\">
            <thead>
                <tr>
                    <th>";
        // line 15
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationDM"]) ? $context["paginationDM"] : $this->getContext($context, "paginationDM")), "Cedula", "dm.cedula");
        echo "</th>
                    <th>";
        // line 16
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationDM"]) ? $context["paginationDM"] : $this->getContext($context, "paginationDM")), "Nombre", "dm.nombre");
        echo "</th>
                    <th>";
        // line 17
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationDM"]) ? $context["paginationDM"] : $this->getContext($context, "paginationDM")), "Curso", "dm.curso");
        echo "</th>
                    <th>";
        // line 18
        echo $this->env->getExtension('knp_pagination')->sortable((isset($context["paginationDM"]) ? $context["paginationDM"] : $this->getContext($context, "paginationDM")), "Materia", "dm.materia");
        echo "</th>
                    <th>Accion</th>                    
                </tr>
            </thead>
        ";
        // line 22
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["paginationDM"]) ? $context["paginationDM"] : $this->getContext($context, "paginationDM")));
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
        foreach ($context['_seq'] as $context["_key"] => $context["dm"]) {
            // line 23
            echo "            <tbody>
                <tr ";
            // line 24
            if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                echo "class=\"color\"";
            }
            echo ">
                    <td>";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dm"]) ? $context["dm"] : $this->getContext($context, "dm")), "docente"), "cedula"), "html", null, true);
            echo "</td>
                    <td>";
            // line 26
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dm"]) ? $context["dm"] : $this->getContext($context, "dm")), "docente"), "nombre"), "html", null, true);
            echo "&nbsp;";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dm"]) ? $context["dm"] : $this->getContext($context, "dm")), "docente"), "apellido"), "html", null, true);
            echo "</td>
                    <td>";
            // line 27
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dm"]) ? $context["dm"] : $this->getContext($context, "dm")), "nivel"), "html", null, true);
            echo "</td>
                    <td>";
            // line 28
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["dm"]) ? $context["dm"] : $this->getContext($context, "dm")), "materia"), "nombre"), "html", null, true);
            echo "</td>
                    <td><a href=\"";
            // line 29
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("amaterias_modificar_materias_asignadas", array("codm" => $this->getAttribute((isset($context["dm"]) ? $context["dm"] : $this->getContext($context, "dm")), "id"))), "html", null, true);
            echo "\">&nbsp;&nbsp<img title=\"Modificar materia asignada\"  src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/edit.gif"), "html", null, true);
            echo "\"></a>&nbsp;&nbsp;&nbsp;<a  onclick=\"cargaVentana(";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["dm"]) ? $context["dm"] : $this->getContext($context, "dm")), "id"), "html", null, true);
            echo ");\"><img title=\"Eliminar materia asignada\"  src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/delete.gif"), "html", null, true);
            echo "\"></a></td>
                </tr>
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dm'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </table>
            <div class=\"paginacion\">
              ";
        // line 35
        echo $this->env->getExtension('knp_pagination')->render((isset($context["paginationDM"]) ? $context["paginationDM"] : $this->getContext($context, "paginationDM")));
        echo "
            </div>
        </div>
    </div>
<br>
";
    }

    // line 42
    public function block_aside($context, array $blocks = array())
    {
        // line 43
        echo "    ";
        $context["rol"] = "amaterias";
        // line 44
        echo "        <p align=\"center\"><a class=\"boton\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("portada", array("role" => (isset($context["rol"]) ? $context["rol"] : $this->getContext($context, "rol")))), "html", null, true);
        echo "\">INICIO</a></p>
    ";
        // line 45
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
        <a href=\"";
        // line 46
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">Cerrar sesión</a>
";
    }

    // line 49
    public function block_javascripts($context, array $blocks = array())
    {
        // line 50
        echo "        ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
        <script type=\"text/javascript\">
    
        function cargaVentana(id)
        {
            if (confirm(\"Esta seguro que desea elminar este registro.?\")) {
                window.location= \"";
        // line 56
        echo $this->env->getExtension('routing')->getPath("amaterias_eliminar_materias_asignadas");
        echo "\" + \"?codm=\"+id
            }
        }
    </script>
    
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:listadictadomateria.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  185 => 50,  172 => 45,  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 70,  153 => 61,  150 => 60,  127 => 46,  124 => 49,  114 => 34,  76 => 25,  236 => 73,  226 => 67,  223 => 66,  205 => 60,  202 => 59,  191 => 51,  155 => 43,  84 => 21,  97 => 38,  81 => 30,  34 => 6,  213 => 62,  206 => 62,  195 => 56,  186 => 58,  178 => 52,  170 => 51,  167 => 44,  161 => 42,  146 => 41,  134 => 42,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 120,  256 => 89,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 72,  198 => 65,  194 => 63,  188 => 79,  160 => 47,  152 => 43,  148 => 43,  126 => 33,  118 => 31,  110 => 31,  90 => 24,  77 => 17,  58 => 13,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 123,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 70,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 51,  128 => 49,  107 => 36,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 133,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 44,  143 => 58,  135 => 53,  119 => 28,  102 => 29,  71 => 17,  67 => 17,  63 => 15,  59 => 14,  38 => 4,  94 => 27,  89 => 24,  85 => 21,  75 => 18,  68 => 17,  56 => 13,  87 => 30,  21 => 2,  26 => 6,  93 => 37,  88 => 32,  78 => 22,  46 => 6,  27 => 4,  44 => 6,  31 => 3,  28 => 3,  201 => 58,  196 => 90,  183 => 57,  171 => 74,  166 => 50,  163 => 45,  158 => 62,  156 => 45,  151 => 35,  142 => 59,  138 => 36,  136 => 56,  121 => 46,  117 => 44,  105 => 25,  91 => 22,  62 => 14,  49 => 7,  24 => 1,  25 => 3,  19 => 1,  79 => 22,  72 => 18,  69 => 23,  47 => 7,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 50,  145 => 41,  139 => 40,  131 => 52,  123 => 29,  120 => 43,  115 => 27,  111 => 33,  108 => 33,  101 => 40,  98 => 33,  96 => 23,  83 => 25,  74 => 21,  66 => 16,  55 => 12,  52 => 11,  50 => 8,  43 => 5,  41 => 8,  35 => 4,  32 => 2,  29 => 3,  209 => 82,  203 => 69,  199 => 67,  193 => 62,  189 => 71,  187 => 49,  182 => 49,  176 => 46,  173 => 52,  168 => 72,  164 => 43,  162 => 48,  154 => 67,  149 => 42,  147 => 33,  144 => 42,  141 => 48,  133 => 55,  130 => 41,  125 => 44,  122 => 32,  116 => 35,  112 => 34,  109 => 26,  106 => 30,  103 => 32,  99 => 24,  95 => 37,  92 => 36,  86 => 31,  82 => 29,  80 => 19,  73 => 16,  64 => 16,  60 => 15,  57 => 12,  54 => 10,  51 => 8,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
