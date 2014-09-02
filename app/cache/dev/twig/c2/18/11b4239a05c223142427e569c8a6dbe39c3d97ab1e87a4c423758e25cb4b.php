<?php

/* academicoBundle:Default:notasdocente.html.twig */
class __TwigTemplate_c21811b4239a05c223142427e569c8a6dbe39c3d97ab1e87a4c423758e25cb4b extends Twig_Template
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
        echo " NOTAS ";
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
<p style=\"text-align: center ; color: #0035C7; -webkit-animation-play-state: \"><strong>INGRESO DE EVALUACIONES PARCIALES DE: &nbsp;&nbsp; ";
        // line 10
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, (isset($context["codmes"]) ? $context["codmes"] : $this->getContext($context, "codmes"))), "html", null, true);
        echo "</strong></p>
    ";
        // line 11
        if (((isset($context["cod"]) ? $context["cod"] : $this->getContext($context, "cod")) == 1)) {
            // line 12
            echo "    <p><strong>Detalles:</strong></p>
    <ul>
        <li style=\"color: #08C\">Se presenta los estudiantes ordenados por secciones, número de cédula y su nombre</li>
        <li style=\"color: #08C\">Para ingresar una nota atrasada, consulte con el administrador del sistema</li>
            </ul>
    <form action=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("docente_notas_x_materia", array("mesid" => $this->getAttribute((isset($context["codmes"]) ? $context["codmes"] : $this->getContext($context, "codmes")), "id"))), "html", null, true);
            echo "\" method=\"post\" ";
            echo             // line 18
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
            echo " >
        ";
            // line 19
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
            echo "
              <div id=\"dt_example\">
              <table id=\"itsthetable\" >
                    <thead>
                        <tr>
                            <th>Sección / Cédula / Estudiante</th>            
                            <th>Trabajo en grupo</th>
                            <th>Estudio de casos</th>
                            <th>Prueba práctica</th>
                            <th>Prueba teórica</th>
                            <th>Promedio</th>
                        </tr>
                        </thead>        
                     <tbody>
                    ";
            // line 33
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "evaest"));
            foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
                // line 34
                echo "                    
                        <tr >
                            <td style=\"text-align: left; vertical-align: middle\">";
                // line 36
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "materiaasignada"), 'widget', array("attr" => array("disabled" => true)));
                echo "</td>             
                            <td style=\"text-align: center; vertical-align: middle\" >";
                // line 37
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "notatb"), 'widget');
                echo "</td> 
                            <td style=\"text-align: center; vertical-align: middle\">";
                // line 38
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "notaec"), 'widget');
                echo "</td> 
                            <td style=\"text-align: center; vertical-align: middle\">";
                // line 39
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "notapp"), 'widget');
                echo "</td> 
                            <td style=\"text-align: center; vertical-align: middle\">";
                // line 40
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "notapt"), 'widget');
                echo "</td>
                            <td style=\"text-align: center; vertical-align: middle\">";
                // line 41
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "promedio"), 'widget');
                echo "</td>
                        <tr>
                    <tbody>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['req'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 45
            echo "                </table>
                <div class=\"paginacion\">
                    ";
            // line 47
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
            echo "        <h1>No hay estudiantes</h1>
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
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    ";
        // line 86
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 87
        echo " ";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:notasdocente.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  222 => 85,  212 => 82,  197 => 74,  180 => 71,  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 71,  228 => 87,  216 => 67,  192 => 51,  113 => 39,  137 => 34,  70 => 18,  185 => 50,  172 => 71,  190 => 80,  184 => 72,  181 => 77,  175 => 75,  165 => 67,  153 => 57,  150 => 60,  127 => 33,  124 => 32,  114 => 27,  76 => 19,  236 => 113,  226 => 86,  223 => 66,  205 => 60,  202 => 82,  191 => 51,  155 => 56,  84 => 21,  97 => 34,  81 => 22,  34 => 4,  213 => 62,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 51,  167 => 44,  161 => 42,  146 => 53,  134 => 33,  104 => 36,  100 => 35,  65 => 17,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 50,  194 => 63,  188 => 49,  160 => 57,  152 => 55,  148 => 43,  126 => 46,  118 => 31,  110 => 31,  90 => 23,  77 => 23,  58 => 11,  53 => 9,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 50,  128 => 44,  107 => 27,  61 => 16,  273 => 96,  269 => 94,  254 => 92,  243 => 115,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 69,  221 => 77,  219 => 84,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 61,  143 => 52,  135 => 47,  119 => 28,  102 => 29,  71 => 16,  67 => 16,  63 => 25,  59 => 15,  38 => 4,  94 => 34,  89 => 22,  85 => 22,  75 => 29,  68 => 20,  56 => 10,  87 => 30,  21 => 2,  26 => 6,  93 => 33,  88 => 34,  78 => 20,  46 => 8,  27 => 4,  44 => 15,  31 => 5,  28 => 1,  201 => 58,  196 => 90,  183 => 41,  171 => 74,  166 => 50,  163 => 43,  158 => 62,  156 => 45,  151 => 40,  142 => 38,  138 => 51,  136 => 36,  121 => 41,  117 => 40,  105 => 37,  91 => 31,  62 => 12,  49 => 9,  24 => 1,  25 => 4,  19 => 1,  79 => 30,  72 => 18,  69 => 17,  47 => 7,  40 => 6,  37 => 7,  22 => 2,  246 => 134,  157 => 64,  145 => 57,  139 => 40,  131 => 45,  123 => 29,  120 => 43,  115 => 29,  111 => 28,  108 => 35,  101 => 36,  98 => 30,  96 => 26,  83 => 26,  74 => 20,  66 => 17,  55 => 12,  52 => 10,  50 => 8,  43 => 9,  41 => 12,  35 => 9,  32 => 2,  29 => 1,  209 => 81,  203 => 78,  199 => 81,  193 => 77,  189 => 75,  187 => 49,  182 => 49,  176 => 72,  173 => 52,  168 => 64,  164 => 43,  162 => 62,  154 => 67,  149 => 55,  147 => 43,  144 => 42,  141 => 52,  133 => 35,  130 => 41,  125 => 31,  122 => 41,  116 => 30,  112 => 34,  109 => 38,  106 => 30,  103 => 26,  99 => 25,  95 => 24,  92 => 28,  86 => 22,  82 => 29,  80 => 21,  73 => 20,  64 => 19,  60 => 11,  57 => 14,  54 => 11,  51 => 8,  48 => 7,  45 => 6,  42 => 9,  39 => 5,  36 => 7,  33 => 3,  30 => 5,);
    }
}
