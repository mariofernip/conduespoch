<?php

/* academicoBundle:Default:notasuspenso.html.twig */
class __TwigTemplate_c3d71ccb489bbfec41ee92e742bddfe006bc03b9b05e312c7697fd10cbaa37c5 extends Twig_Template
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
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
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
        echo " NOTAS SUPLETORIOS";
    }

    // line 5
    public function block_id($context, array $blocks = array())
    {
        echo "portada";
    }

    // line 6
    public function block_article($context, array $blocks = array())
    {
        // line 7
        echo "<section id=\"menu_secre\">
    ";
        // line 8
        $this->env->loadTemplate("academicoBundle:Default:menu_docente.html.twig")->display($context);
        // line 9
        echo "</section>    
<div style=\"text-align: center\" >
    <strong style=\"color: #0063DC\">INGRESO NOTAS DE SUPLETORIOS</strong>
</div>

    ";
        // line 14
        if (((isset($context["cod"]) ? $context["cod"] : $this->getContext($context, "cod")) == 1)) {
            // line 15
            echo "    <p style=\"text-align: right\"><a  target=\"_blank\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("docente_reporte_notas_supletorios", array("nid" => $this->getAttribute((isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "id"), "mid" => $this->getAttribute((isset($context["materia"]) ? $context["materia"] : $this->getContext($context, "materia")), "id"))), "html", null, true);
            echo "\" title=\"Imprimir reporte\" ><img  src=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/pdf.gif"), "html", null, true);
            echo "\" alt=\"imprimir\" width=\"30\" height=\"30\" ></a></p>
    <form action=\"";
            // line 16
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("docente_notas_suspenso", array("materia" => $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "id"), "nivel" => $this->getAttribute((isset($context["niv"]) ? $context["niv"] : $this->getContext($context, "niv")), "id"))), "html", null, true);
            echo "\" method=\"post\" ";
            echo             // line 17
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
            echo " >
        ";
            // line 18
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
            echo "
            
        <div id=\"dt_example\">
                <table class=\"display\" id=\"example\">
                    <thead>
                        <tr>
                            <th colspan=\"4\">NOTAS DE SUSPLETORIOS</th>                     
                            
                        </tr>
                        <tr>
                            <th>Sección / Cédula / Estudiante</th>                     
                            <th>Suspenso</th>
                            <th>Promedio final</th>
                            <th>Equivalencia</th>
                        </tr>
                        </thead>        
                     <tbody>
                    ";
            // line 35
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "evaest"));
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
            foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
                // line 36
                echo "                    
                        <tr ";
                // line 37
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                    echo " class=\"color\" ";
                }
                echo ">
                            <td style=\"text-align: left; vertical-align: middle\">";
                // line 38
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "matricula"), 'widget', array("attr" => array("disabled" => true)));
                echo "</td>             
                            <td style=\"text-align: center; width: 80px; vertical-align: middle\">";
                // line 39
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "notasuspenso"), 'widget');
                echo "</td> 
                            <td style=\"text-align: center; width: 110px; vertical-align: middle\">";
                // line 40
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "promediofinal"), 'widget');
                echo "</td> 
                            <td style=\"text-align: center; width: 80px; vertical-align: middle\">";
                // line 41
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "equivalencia"), 'widget');
                echo "</td>
                            
                        <tr>
                    <tbody>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['req'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 46
            echo "                </table>
                <div class=\"paginacion\">
                    ";
            // line 48
            echo $this->env->getExtension('knp_pagination')->render((isset($context["evaest"]) ? $context["evaest"] : $this->getContext($context, "evaest")));
            echo "
                </div>                
            </div> 
        <input type=\"submit\" value=\"guardar\" class=\"boton\" >
        ";
            // line 52
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
            echo "
    </form>
    ";
        } else {
            // line 55
            echo "    <strong>No hay registros de estudiantes</strong>
    ";
        }
        // line 57
        echo "    
 
";
    }

    // line 61
    public function block_aside($context, array $blocks = array())
    {
        // line 62
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <p align=\"center\">Materia actual</p>
    <strong style=\"color: #090\">";
        // line 64
        echo twig_escape_filter($this->env, (isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "html", null, true);
        echo "&nbsp;";
        echo twig_escape_filter($this->env, (isset($context["materia"]) ? $context["materia"] : $this->getContext($context, "materia")), "html", null, true);
        echo "</strong>
    <p></p>
    <strong>
        <p align=\"left\">Curso / Materia</p>
    </strong>
    <div id=\"relacionadas\">
        <ul>
    ";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materiasdoc"]) ? $context["materiasdoc"] : $this->getContext($context, "materiasdoc")));
        foreach ($context['_seq'] as $context["_key"] => $context["matdoc"]) {
            // line 72
            echo "                <li><a class=\"boton\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("docente_variable_sesion", array("niv" => $this->getAttribute($this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "nivel"), "id"), "mat" => $this->getAttribute($this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "materia"), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "nivel")), "html", null, true);
            echo "&nbsp;&nbsp;";
            echo twig_escape_filter($this->env, twig_title_string_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "materia"), "nombre")), "html", null, true);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['matdoc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 74
        echo "
            </ul>
        </div>

    <a title=\"Cierra la sesión actual\" href=\"";
        // line 78
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
";
    }

    // line 81
    public function block_javascripts($context, array $blocks = array())
    {
        // line 82
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
";
    }

    // line 84
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 85
        echo "      ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "                 
        ";
        // line 86
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:notasuspenso.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  248 => 86,  233 => 82,  218 => 74,  174 => 57,  222 => 85,  212 => 82,  197 => 74,  180 => 61,  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 70,  228 => 87,  216 => 67,  192 => 57,  113 => 36,  137 => 34,  70 => 22,  185 => 50,  172 => 71,  190 => 80,  184 => 72,  181 => 77,  175 => 75,  165 => 67,  153 => 46,  150 => 60,  127 => 33,  124 => 32,  114 => 27,  76 => 18,  236 => 113,  226 => 66,  223 => 66,  205 => 72,  202 => 82,  191 => 51,  155 => 56,  84 => 21,  97 => 29,  81 => 25,  34 => 4,  213 => 64,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 44,  161 => 42,  146 => 53,  134 => 41,  104 => 36,  100 => 35,  65 => 17,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 59,  194 => 63,  188 => 49,  160 => 57,  152 => 42,  148 => 41,  126 => 39,  118 => 31,  110 => 31,  90 => 23,  77 => 24,  58 => 14,  53 => 9,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 69,  177 => 65,  169 => 51,  140 => 39,  132 => 50,  128 => 44,  107 => 27,  61 => 16,  273 => 96,  269 => 94,  254 => 92,  243 => 85,  240 => 84,  238 => 85,  235 => 74,  230 => 81,  227 => 81,  224 => 78,  221 => 77,  219 => 84,  217 => 63,  208 => 61,  204 => 72,  179 => 50,  159 => 61,  143 => 52,  135 => 47,  119 => 28,  102 => 29,  71 => 16,  67 => 16,  63 => 25,  59 => 15,  38 => 4,  94 => 34,  89 => 27,  85 => 26,  75 => 29,  68 => 20,  56 => 10,  87 => 30,  21 => 2,  26 => 6,  93 => 28,  88 => 34,  78 => 20,  46 => 6,  27 => 4,  44 => 15,  31 => 3,  28 => 1,  201 => 71,  196 => 90,  183 => 62,  171 => 74,  166 => 50,  163 => 43,  158 => 62,  156 => 43,  151 => 40,  142 => 38,  138 => 51,  136 => 36,  121 => 41,  117 => 40,  105 => 37,  91 => 31,  62 => 15,  49 => 7,  24 => 1,  25 => 4,  19 => 1,  79 => 30,  72 => 17,  69 => 16,  47 => 7,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 48,  145 => 57,  139 => 40,  131 => 45,  123 => 36,  120 => 43,  115 => 29,  111 => 28,  108 => 35,  101 => 36,  98 => 30,  96 => 35,  83 => 26,  74 => 20,  66 => 17,  55 => 12,  52 => 10,  50 => 8,  43 => 5,  41 => 12,  35 => 9,  32 => 2,  29 => 1,  209 => 63,  203 => 78,  199 => 81,  193 => 77,  189 => 64,  187 => 49,  182 => 49,  176 => 72,  173 => 52,  168 => 64,  164 => 52,  162 => 62,  154 => 67,  149 => 55,  147 => 43,  144 => 40,  141 => 52,  133 => 35,  130 => 40,  125 => 31,  122 => 38,  116 => 37,  112 => 34,  109 => 38,  106 => 35,  103 => 26,  99 => 25,  95 => 24,  92 => 28,  86 => 22,  82 => 29,  80 => 21,  73 => 23,  64 => 18,  60 => 14,  57 => 14,  54 => 11,  51 => 8,  48 => 7,  45 => 6,  42 => 9,  39 => 5,  36 => 7,  33 => 3,  30 => 5,);
    }
}
