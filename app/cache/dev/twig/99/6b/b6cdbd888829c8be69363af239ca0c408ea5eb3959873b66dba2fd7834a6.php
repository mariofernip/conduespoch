<?php

/* academicoBundle:Default:verdocentehorario2.html.twig */
class __TwigTemplate_996bb6cdbd888829c8be69363af239ca0c408ea5eb3959873b66dba2fd7834a6 extends Twig_Template
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
        echo "<section id=\"menu_docente\">
        ";
        // line 7
        $this->env->loadTemplate("academicoBundle:Default:menu_docente.html.twig")->display(array_merge($context, array("mesevac" => (isset($context["mesevac"]) ? $context["mesevac"] : $this->getContext($context, "mesevac")), "listamaterias" => (isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")))));
        // line 8
        echo "</section>
        
";
        // line 11
        echo "
<strong><p>Mi Horario</p></strong>
<div id=\"dt_example\">
    <div id=\"demo\">        
        <table class=\"display\" id=\"example\">
            <thead>   
                <tr>
                    <th colspan=\"6\" ALIGN=\"CENTER\">HORARIO DE CLASES</th>
                </tr>
                <tr>
                    <th colspan=\"6\" ALIGN=\"LEFT\">CÉDULA: ";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "cedula"), "html", null, true);
        echo "    ";
        echo " NOMBRE: ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "nombre"), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["docente"]) ? $context["docente"] : $this->getContext($context, "docente")), "apellido"), "html", null, true);
        echo "</th>
                </tr>
                 <tr >
                    <th>";
        // line 24
        echo "Hora";
        echo "</th>                     
                    <th>";
        // line 25
        echo "Lunes";
        echo "</th> 
                    <th>";
        // line 26
        echo "Martes";
        echo "</th>
                    <th>";
        // line 27
        echo "Miercoles";
        echo "</th>
                    <th>";
        // line 28
        echo "Jueves";
        echo "</th>
                    <th>";
        // line 29
        echo "Viernes";
        echo "</th>
                 
                 </tr>
            </thead>                                        
            <tbody>
                ";
        // line 34
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
        foreach ($context['_seq'] as $context["_key"] => $context["ma"]) {
            echo "  
                <tr>                        
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "hora"), "html", null, true);
            echo "</td>        
                    ";
            // line 38
            echo "                    ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["horarioclase"]) ? $context["horarioclase"] : $this->getContext($context, "horarioclase")));
            foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
                // line 39
                echo "                    
                        ";
                // line 40
                if (($this->getAttribute((isset($context["ma"]) ? $context["ma"] : $this->getContext($context, "ma")), "hora") == $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "hora"))) {
                    echo "                            
                            ";
                    // line 41
                    if ((twig_upper_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia")) == "LUNES")) {
                        echo "                        
                                <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">                   
                                    <strong>
                                        ";
                        // line 44
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                        echo "
                                    </strong>";
                        // line 45
                        echo " ";
                        echo "
                                        ";
                        // line 46
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                        echo " ";
                        echo "
                                        ";
                        // line 47
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                        echo "                                        
                                </td> 
                                
                            ";
                    }
                    // line 51
                    echo "                            ";
                    if ((twig_upper_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia")) == "MARTES")) {
                        echo "                        
                                <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">                   
                                    <strong>
                                        ";
                        // line 54
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                        echo "
                                    </strong>";
                        // line 55
                        echo " ";
                        echo "
                                        ";
                        // line 56
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                        echo " ";
                        echo "
                                        ";
                        // line 57
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                        echo "                                        
                                </td> 
                            ";
                    }
                    // line 60
                    echo "                            ";
                    if ((twig_upper_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia")) == "MIERCOLES")) {
                        echo "                        
                                <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">                   
                                    <strong>
                                        ";
                        // line 63
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                        echo "
                                    </strong>";
                        // line 64
                        echo " ";
                        echo "
                                        ";
                        // line 65
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                        echo " ";
                        echo "
                                        ";
                        // line 66
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                        echo "                                        
                                </td> 
                                
                            ";
                    }
                    // line 70
                    echo "                                
                            ";
                    // line 71
                    if ((twig_upper_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia")) == "JUEVES")) {
                        echo "                        
                                <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">                   
                                    <strong>
                                        ";
                        // line 74
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                        echo "
                                    </strong>";
                        // line 75
                        echo " ";
                        echo "
                                        ";
                        // line 76
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                        echo " ";
                        echo "
                                        ";
                        // line 77
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                        echo "                                        
                                </td> 
                            ";
                    }
                    // line 80
                    echo "                            ";
                    if ((twig_upper_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dia")) == "VIERNES")) {
                        echo "                        
                                <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">                   
                                    <strong>
                                        ";
                        // line 83
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "materia"), "nombre"), "html", null, true);
                        echo "
                                    </strong>";
                        // line 84
                        echo " ";
                        echo "
                                        ";
                        // line 85
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "curso"), "html", null, true);
                        echo " ";
                        echo "
                                        ";
                        // line 86
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "dictadomateria"), "nivel"), "paralelo"), "html", null, true);
                        echo "                                        
                                </td> 
                            ";
                    }
                    // line 89
                    echo "                        ";
                }
                // line 90
                echo "                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 91
            echo "                    
                    
                </tr>    
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ma'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "            </tbody>                                                       
        </table>
    
    </div>
</div>
<br>

";
    }

    // line 103
    public function block_aside($context, array $blocks = array())
    {
        // line 104
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <a title=\"Cierra la sesión actual\" href=\"";
        // line 105
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
";
    }

    // line 109
    public function block_javascripts($context, array $blocks = array())
    {
        // line 110
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

";
    }

    // line 115
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 116
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
         ";
        // line 117
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 118
        echo "
<style>
   
  input[type=\"number\"] {
   width:50px;
}
</style>



   ";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:verdocentehorario2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  326 => 118,  324 => 117,  320 => 116,  317 => 115,  306 => 109,  296 => 104,  282 => 95,  249 => 84,  210 => 70,  705 => 153,  703 => 152,  699 => 151,  696 => 150,  688 => 145,  685 => 144,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 124,  634 => 123,  626 => 122,  614 => 121,  608 => 120,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 112,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 79,  358 => 77,  350 => 76,  338 => 75,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 68,  280 => 67,  272 => 66,  251 => 63,  200 => 52,  207 => 72,  248 => 86,  233 => 82,  218 => 74,  174 => 60,  222 => 85,  212 => 53,  197 => 74,  180 => 62,  23 => 3,  245 => 83,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 78,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 90,  265 => 78,  259 => 77,  239 => 114,  232 => 77,  228 => 87,  216 => 67,  192 => 57,  113 => 38,  137 => 44,  70 => 22,  185 => 50,  172 => 56,  190 => 63,  184 => 72,  181 => 77,  175 => 49,  165 => 54,  153 => 46,  150 => 47,  127 => 40,  124 => 39,  114 => 40,  76 => 27,  236 => 113,  226 => 55,  223 => 75,  205 => 72,  202 => 69,  191 => 50,  155 => 61,  84 => 25,  97 => 29,  81 => 25,  34 => 4,  213 => 71,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 44,  161 => 42,  146 => 54,  134 => 41,  104 => 30,  100 => 29,  65 => 19,  300 => 105,  293 => 103,  290 => 86,  256 => 76,  253 => 85,  242 => 56,  225 => 78,  215 => 73,  211 => 66,  198 => 65,  194 => 64,  188 => 49,  160 => 62,  152 => 60,  148 => 45,  126 => 47,  118 => 45,  110 => 39,  90 => 32,  77 => 23,  58 => 12,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 93,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 110,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 65,  264 => 89,  258 => 86,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 57,  169 => 48,  140 => 56,  132 => 49,  128 => 49,  107 => 42,  61 => 15,  273 => 91,  269 => 94,  254 => 92,  243 => 85,  240 => 84,  238 => 80,  235 => 74,  230 => 81,  227 => 76,  224 => 78,  221 => 80,  219 => 74,  217 => 79,  208 => 61,  204 => 72,  179 => 50,  159 => 47,  143 => 53,  135 => 50,  119 => 38,  102 => 28,  71 => 16,  67 => 16,  63 => 15,  59 => 15,  38 => 6,  94 => 33,  89 => 27,  85 => 26,  75 => 23,  68 => 20,  56 => 12,  87 => 32,  21 => 2,  26 => 6,  93 => 28,  88 => 26,  78 => 20,  46 => 7,  27 => 4,  44 => 8,  31 => 3,  28 => 1,  201 => 71,  196 => 90,  183 => 60,  171 => 59,  166 => 56,  163 => 43,  158 => 62,  156 => 51,  151 => 55,  142 => 44,  138 => 56,  136 => 38,  121 => 46,  117 => 36,  105 => 31,  91 => 31,  62 => 19,  49 => 8,  24 => 1,  25 => 4,  19 => 1,  79 => 28,  72 => 21,  69 => 21,  47 => 9,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 51,  145 => 46,  139 => 43,  131 => 41,  123 => 40,  120 => 43,  115 => 36,  111 => 33,  108 => 34,  101 => 30,  98 => 27,  96 => 28,  83 => 24,  74 => 21,  66 => 20,  55 => 12,  52 => 11,  50 => 10,  43 => 6,  41 => 12,  35 => 9,  32 => 4,  29 => 1,  209 => 63,  203 => 66,  199 => 81,  193 => 77,  189 => 64,  187 => 66,  182 => 49,  176 => 72,  173 => 52,  168 => 55,  164 => 54,  162 => 53,  154 => 60,  149 => 59,  147 => 43,  144 => 43,  141 => 45,  133 => 35,  130 => 40,  125 => 31,  122 => 45,  116 => 37,  112 => 43,  109 => 32,  106 => 29,  103 => 39,  99 => 25,  95 => 23,  92 => 27,  86 => 22,  82 => 21,  80 => 24,  73 => 26,  64 => 18,  60 => 17,  57 => 11,  54 => 11,  51 => 7,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
