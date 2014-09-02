<?php

/* academicoBundle:Default:notas_examengrado.html.twig */
class __TwigTemplate_d49b7ec8951c33267a2b29490bdf711cde1332c7dd20f0c8901aae1790f9ca14 extends Twig_Template
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

    // line 4
    public function block_id($context, array $blocks = array())
    {
        echo "requisito";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Notas de grado";
    }

    // line 8
    public function block_article($context, array $blocks = array())
    {
        // line 9
        echo "<section id=\"menu_secre\">
    ";
        // line 10
        $this->env->loadTemplate("academicoBundle:Default:menu_inspector.html.twig")->display($context);
        // line 11
        echo "</section>
<p style=\"text-align: center ; color: #0035C7 \"><strong>INGRESO NOTAS DE GRADO: <label style=\"color: #090\">";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["mg"]) ? $context["mg"] : $this->getContext($context, "mg")), "materiagrado"), "materia"), "html", null, true);
        echo "</label></strong></p>


";
        // line 15
        if (((isset($context["cod"]) ? $context["cod"] : $this->getContext($context, "cod")) == 1)) {
            // line 16
            echo "    
    <form action=\"";
            // line 17
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("inspector_examengrado_registro_notas", array("codmg" => (isset($context["codmg"]) ? $context["codmg"] : $this->getContext($context, "codmg")))), "html", null, true);
            echo "\" method=\"post\" ";
            echo             // line 18
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'enctype');
            echo " >
        ";
            // line 19
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_start');
            echo "
            
        <div id=\"dt_example\">
                <table class=\"display\" id=\"example\">
                    <thead>
                        <tr>
                            <th colspan=\"5\">NOTAS DE GRADO</th>                     
                            
                        </tr>
                        <tr>
                            <th>Sección / Cédula / Estudiante</th>                     
                            <th>Nota </th>
                            <th>Equivalencia</th>
                            <th>Observaciones</th>
                        </tr>
                        </thead>        
                     <tbody>
                    ";
            // line 36
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), "exagrado"));
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
                // line 37
                echo "                    
                        <tr ";
                // line 38
                if (($this->getAttribute((isset($context["loop"]) ? $context["loop"] : $this->getContext($context, "loop")), "index") % 2 == 1)) {
                    echo " class=\"color\" ";
                }
                echo ">
                            <td style=\"vertical-align: middle; text-align: center\">";
                // line 39
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "matricula"), 'widget', array("attr" => array("disabled" => true)));
                echo "</td>             
                            <td style=\"vertical-align: middle; text-align: center\">";
                // line 40
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "nota"), 'widget');
                echo "</td> 
                            <td style=\"vertical-align: middle; text-align: center\">";
                // line 41
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "equivalencia"), 'widget');
                echo "</td>
                            <td style=\"vertical-align: middle; text-align: center\" >";
                // line 42
                echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "descripcion"), 'widget');
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
            // line 47
            echo "                </table>
                
            </div> 
        <input type=\"submit\" value=\"guardar\" class=\"boton\" >
        ";
            // line 51
            echo             $this->env->getExtension('form')->renderer->renderBlock((isset($context["form"]) ? $context["form"] : $this->getContext($context, "form")), 'form_end');
            echo "
    </form>
    ";
        } else {
            // line 54
            echo "    <strong>No hay registros de estudiantes</strong>
    ";
        }
        // line 56
        echo "
";
    }

    // line 59
    public function block_aside($context, array $blocks = array())
    {
        // line 60
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <p style=\"text-align: center\">Curso actual:</p>
    <p style=\"text-align: left; color: #090\"><strong>";
        // line 62
        echo twig_escape_filter($this->env, (isset($context["curso"]) ? $context["curso"] : $this->getContext($context, "curso")), "html", null, true);
        echo "</strong></p>
    <strong><p align=\"center\">Materias:</p></strong>
    <div id=\"relacionadas\">
        <ul>
    ";
        // line 66
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            // line 67
            echo "                <li ><a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("inspector_examengrado_registro_notas", array("codmg" => $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "id"))), "html", null, true);
            echo "\" class=\"boton\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "materia"), "html", null, true);
            echo "<a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        echo "
            </ul>
        </div>
    <a title=\"Cierra la sesión actual\" href=\"";
        // line 72
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
    
";
    }

    // line 78
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 79
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
";
        // line 80
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 81
        echo " ";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:notas_examengrado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 72,  248 => 86,  233 => 82,  218 => 74,  174 => 60,  222 => 85,  212 => 82,  197 => 74,  180 => 62,  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 70,  228 => 87,  216 => 67,  192 => 57,  113 => 38,  137 => 34,  70 => 22,  185 => 50,  172 => 71,  190 => 80,  184 => 72,  181 => 77,  175 => 75,  165 => 67,  153 => 46,  150 => 47,  127 => 41,  124 => 32,  114 => 27,  76 => 18,  236 => 113,  226 => 66,  223 => 81,  205 => 72,  202 => 69,  191 => 67,  155 => 56,  84 => 21,  97 => 29,  81 => 25,  34 => 4,  213 => 64,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 44,  161 => 42,  146 => 53,  134 => 41,  104 => 36,  100 => 35,  65 => 17,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 59,  194 => 63,  188 => 49,  160 => 57,  152 => 42,  148 => 41,  126 => 39,  118 => 31,  110 => 37,  90 => 23,  77 => 24,  58 => 14,  53 => 9,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 78,  177 => 65,  169 => 51,  140 => 39,  132 => 50,  128 => 44,  107 => 27,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 85,  240 => 84,  238 => 85,  235 => 74,  230 => 81,  227 => 81,  224 => 78,  221 => 80,  219 => 84,  217 => 79,  208 => 61,  204 => 72,  179 => 50,  159 => 61,  143 => 52,  135 => 47,  119 => 39,  102 => 29,  71 => 16,  67 => 16,  63 => 16,  59 => 15,  38 => 6,  94 => 34,  89 => 27,  85 => 26,  75 => 29,  68 => 20,  56 => 10,  87 => 30,  21 => 2,  26 => 6,  93 => 36,  88 => 34,  78 => 20,  46 => 6,  27 => 4,  44 => 8,  31 => 3,  28 => 1,  201 => 71,  196 => 90,  183 => 62,  171 => 59,  166 => 56,  163 => 43,  158 => 62,  156 => 51,  151 => 40,  142 => 38,  138 => 51,  136 => 36,  121 => 41,  117 => 40,  105 => 37,  91 => 31,  62 => 15,  49 => 7,  24 => 1,  25 => 4,  19 => 1,  79 => 30,  72 => 17,  69 => 18,  47 => 9,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 48,  145 => 57,  139 => 40,  131 => 42,  123 => 40,  120 => 43,  115 => 29,  111 => 28,  108 => 35,  101 => 36,  98 => 30,  96 => 35,  83 => 26,  74 => 20,  66 => 17,  55 => 12,  52 => 11,  50 => 10,  43 => 5,  41 => 12,  35 => 9,  32 => 4,  29 => 1,  209 => 63,  203 => 78,  199 => 81,  193 => 77,  189 => 64,  187 => 66,  182 => 49,  176 => 72,  173 => 52,  168 => 64,  164 => 52,  162 => 54,  154 => 67,  149 => 55,  147 => 43,  144 => 40,  141 => 52,  133 => 35,  130 => 40,  125 => 31,  122 => 38,  116 => 37,  112 => 34,  109 => 38,  106 => 35,  103 => 26,  99 => 25,  95 => 24,  92 => 28,  86 => 22,  82 => 29,  80 => 21,  73 => 19,  64 => 18,  60 => 14,  57 => 14,  54 => 11,  51 => 8,  48 => 7,  45 => 6,  42 => 9,  39 => 5,  36 => 7,  33 => 3,  30 => 5,);
    }
}
