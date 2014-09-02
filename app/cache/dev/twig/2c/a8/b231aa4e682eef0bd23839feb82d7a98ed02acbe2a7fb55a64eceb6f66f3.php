<?php

/* administrativoBundle:Default:configuracion_actual.html.twig */
class __TwigTemplate_2ca8b231aa4e682eef0bd23839feb82d7a98ed02acbe2a7fb55a64eceb6f66f3 extends Twig_Template
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
    public function block_title($context, array $blocks = array())
    {
        echo " Perfil de Admin ";
    }

    // line 5
    public function block_id($context, array $blocks = array())
    {
        echo "portada";
    }

    // line 7
    public function block_article($context, array $blocks = array())
    {
        // line 8
        echo "<section id=\"menu_admin\">
    ";
        // line 9
        $this->env->loadTemplate("administrativoBundle:Default:menu_admin.html.twig")->display($context);
        // line 10
        echo "</section>

<p style=\"text-align: center ; color: #0035C7 \"><strong>INFORMACION DEL PERIODO ACTUAL</strong></p><br>


<strong>    
    <h2>Materias</h2>
    <br>
</strong>
<div id=\"materias\">
    <div id=\"materias_table\">
        <table class=\"display\" id=\"m_table\">
            <thead>
                <tr>
                    <th>";
        // line 24
        echo "Nombre";
        echo "</th>
                    <th>";
        // line 25
        echo "Area";
        echo "</th>
                    <th>";
        // line 26
        echo "Numero Horas";
        echo "</th> 
                    <th>";
        // line 27
        echo "Descripcion";
        echo "</th> 
                    <th>";
        // line 28
        echo "Estado";
        echo "</th>                                         
                </tr>
            </thead>

            <tbody>";
        // line 32
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            // line 33
            echo "                <tr>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "nombre"), "html", null, true);
            echo "</td>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 35
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "area"), "html", null, true);
            echo "</td>                        
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 36
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "numerocreditos"), "html", null, true);
            echo "</td>
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "descripcion"), "html", null, true);
            echo "</td>                        
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 38
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "estado") == 1)) {
                // line 39
                echo "                        <strong>Activo</strong>
        ";
            }
            // line 41
            echo "        ";
            if (($this->getAttribute((isset($context["mat"]) ? $context["mat"] : $this->getContext($context, "mat")), "estado") == 0)) {
                // line 42
                echo "                        <strong>No activo</strong>
        ";
            }
            // line 43
            echo "</td>
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "            </tbody>    
        </table>
                <p class=\"big\" align=\"right\"><a href=\"";
        // line 47
        echo $this->env->getExtension('routing')->getPath("materia_ingresar");
        echo "\"><img title=\"Agregar nuevo\"   src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>


</div>

<hr>    

<strong>    
    <h2>Requisitos</h2>
    <br>
</strong>
<div id=\"requisitos\">
    <div id=\"requisitos_table\">
        <table class=\"display\" id=\"r_table\">
            <thead>
                <tr >
                    <th>";
        // line 65
        echo "Descripcion";
        echo "</th>                   
                    <th>";
        // line 66
        echo "Estado";
        echo "</th>

                </tr>
            </thead>

            <tbody>";
        // line 71
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listarequisitos"]) ? $context["listarequisitos"] : $this->getContext($context, "listarequisitos")));
        foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
            // line 72
            echo "                <tr>

                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 74
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "descripcion"), "html", null, true);
            echo "</td>   
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 75
            if (($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "estado") == 1)) {
                // line 76
                echo "                        <strong>Activo</strong>
        ";
            }
            // line 78
            echo "        ";
            if (($this->getAttribute((isset($context["req"]) ? $context["req"] : $this->getContext($context, "req")), "estado") == 0)) {
                // line 79
                echo "                        <strong>No activo</strong>
        ";
            }
            // line 80
            echo "</td>                      
                </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['req'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        echo "            </tbody>


        </table>
                <p class=\"big\" align=\"right\"><a href=\"\"><img title=\"Agregar nuevo\"   src=\"";
        // line 86
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
    </div>
</div>
<hr>



<div class=\"contenido\" id=\"dias\">
    <div class=\"columna-derecha\" id=\"dias_table\">
    <strong>    
        <h2>Docente</h2>
        <br>
    </strong>
            <table class=\"display\" id=\"d_table\">
                <thead>
                    <tr>
                        <th>";
        // line 103
        echo "Cedula";
        echo "</th>
                        <th>";
        // line 104
        echo "Nombres/Apellidos";
        echo "</th>
                        <th>";
        // line 105
        echo "e-mail";
        echo "</th>                   
                        <th>";
        // line 106
        echo "Estado";
        echo "</th>                                       
                    </tr>
                </thead>

                <tbody>";
        // line 110
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listadocentes"]) ? $context["listadocentes"] : $this->getContext($context, "listadocentes")));
        foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
            // line 111
            echo "                    <tr>
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 112
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "cedula"), "html", null, true);
            echo "</td> 
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 113
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "apellido"), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "nombre"), "html", null, true);
            echo "</td>   
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 114
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "email"), "html", null, true);
            echo "</td> 
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 115
            if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "estado") == 1)) {
                // line 116
                echo "                            <strong>Activo</strong>
        ";
            }
            // line 118
            echo "        ";
            if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "estado") == 0)) {
                // line 119
                echo "                            <strong>No activo</strong>
        ";
            }
            // line 120
            echo "</td>
                    </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 122
        echo "                </tbody>    
            </table>
                <p class=\"big\" align=\"right\"><a href=\"";
        // line 124
        echo $this->env->getExtension('routing')->getPath("docente_ingresar");
        echo "\"><img title=\"Agregar nuevo\"   src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        </div>

    <div class=\"columna-derecha\" id=\"mes_table\">
        <strong>    
            <h2>Meses</h2>
            <br>
        </strong>

        <table class=\"display\" id=\"ms_table\">
            <thead>
                <tr >
                    <th>";
        // line 136
        echo "Nombre";
        echo "</th>
                    <th>";
        // line 137
        echo "Estado";
        echo "</th>
                </tr>
            </thead>

            <tbody>";
        // line 141
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listameses"]) ? $context["listameses"] : $this->getContext($context, "listameses")));
        foreach ($context['_seq'] as $context["_key"] => $context["mes"]) {
            // line 142
            echo "                <tr>                   
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
            // line 143
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["mes"]) ? $context["mes"] : $this->getContext($context, "mes")), "nombre"), "html", null, true);
            echo "</td>                                             
                    <td ALIGN=\"CENTER\" style=\"vertical-align:middle\">
                    ";
            // line 145
            if (($this->getAttribute((isset($context["mes"]) ? $context["mes"] : $this->getContext($context, "mes")), "estado") == 1)) {
                // line 146
                echo "                            <strong>Activo</strong>
                    ";
            }
            // line 148
            echo "                    ";
            if (($this->getAttribute((isset($context["mes"]) ? $context["mes"] : $this->getContext($context, "mes")), "estado") == 0)) {
                // line 149
                echo "                            <strong>No activo</strong>
                    ";
            }
            // line 150
            echo "</td>       
                    </tr>";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mes'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        echo "                </tbody>


            </table>
                <p class=\"big\" align=\"right\"><a href=\"\"><img title=\"Agregar nuevo\"   src=\"";
        // line 156
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\" ></a></p>
        
        </div>
    </div>

<hr>



";
    }

    // line 166
    public function block_aside($context, array $blocks = array())
    {
        // line 167
        echo "
";
        // line 168
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    
<a href=\"";
        // line 170
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">Cerrar sesión</a>
";
    }

    // line 174
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 175
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

";
        // line 177
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 178
        echo "    <style>
            .columna-izquierda{
                text-align:left;
                margin-right:5px;
                padding-left: 80px;
                float:left;
                width:245px;
            }
            .columna-derecha{
                float:right;
                width:245px;
                padding-right: 80px;
            }   
            .contenido{height:auto;overflow:auto}
            
            p.big {
            line-height: 200%;
            }
        </style>
   ";
    }

    public function getTemplateName()
    {
        return "administrativoBundle:Default:configuracion_actual.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  395 => 175,  392 => 174,  386 => 170,  378 => 167,  375 => 166,  361 => 156,  330 => 143,  327 => 142,  323 => 141,  295 => 124,  291 => 122,  284 => 120,  277 => 118,  271 => 115,  261 => 113,  257 => 112,  250 => 110,  231 => 103,  397 => 151,  390 => 146,  377 => 141,  370 => 138,  352 => 132,  348 => 150,  344 => 149,  335 => 145,  331 => 127,  316 => 137,  304 => 118,  289 => 111,  262 => 98,  244 => 91,  129 => 49,  326 => 118,  324 => 123,  320 => 122,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 84,  210 => 70,  705 => 153,  703 => 152,  699 => 151,  696 => 150,  688 => 145,  685 => 144,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 124,  634 => 123,  626 => 122,  614 => 121,  608 => 120,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 112,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 79,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 110,  280 => 119,  272 => 66,  251 => 63,  200 => 78,  207 => 72,  248 => 92,  233 => 82,  218 => 74,  174 => 68,  222 => 85,  212 => 81,  197 => 74,  180 => 62,  23 => 3,  245 => 83,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 177,  383 => 123,  376 => 119,  372 => 118,  364 => 135,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 114,  265 => 99,  259 => 77,  239 => 105,  232 => 88,  228 => 87,  216 => 67,  192 => 76,  113 => 55,  137 => 51,  70 => 22,  185 => 75,  172 => 56,  190 => 63,  184 => 74,  181 => 74,  175 => 49,  165 => 66,  153 => 46,  150 => 47,  127 => 43,  124 => 39,  114 => 38,  76 => 26,  236 => 89,  226 => 87,  223 => 86,  205 => 82,  202 => 69,  191 => 78,  155 => 61,  84 => 28,  97 => 39,  81 => 35,  34 => 4,  213 => 71,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 63,  161 => 65,  146 => 54,  134 => 45,  104 => 30,  100 => 29,  65 => 28,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 56,  225 => 78,  215 => 73,  211 => 86,  198 => 80,  194 => 79,  188 => 75,  160 => 62,  152 => 60,  148 => 45,  126 => 47,  118 => 45,  110 => 37,  90 => 32,  77 => 34,  58 => 12,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 93,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 178,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 168,  379 => 119,  374 => 140,  368 => 137,  365 => 111,  362 => 110,  360 => 134,  355 => 152,  341 => 148,  337 => 146,  322 => 101,  314 => 99,  312 => 136,  309 => 110,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 104,  268 => 65,  264 => 89,  258 => 96,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 72,  169 => 48,  140 => 56,  132 => 49,  128 => 49,  107 => 42,  61 => 15,  273 => 116,  269 => 100,  254 => 111,  243 => 106,  240 => 90,  238 => 80,  235 => 104,  230 => 81,  227 => 76,  224 => 78,  221 => 80,  219 => 85,  217 => 79,  208 => 80,  204 => 79,  179 => 50,  159 => 47,  143 => 53,  135 => 50,  119 => 38,  102 => 35,  71 => 16,  67 => 29,  63 => 15,  59 => 15,  38 => 5,  94 => 33,  89 => 37,  85 => 36,  75 => 23,  68 => 24,  56 => 12,  87 => 32,  21 => 2,  26 => 6,  93 => 38,  88 => 49,  78 => 20,  46 => 23,  27 => 4,  44 => 7,  31 => 3,  28 => 1,  201 => 71,  196 => 77,  183 => 60,  171 => 59,  166 => 56,  163 => 43,  158 => 59,  156 => 51,  151 => 57,  142 => 44,  138 => 47,  136 => 38,  121 => 47,  117 => 36,  105 => 53,  91 => 32,  62 => 19,  49 => 8,  24 => 1,  25 => 4,  19 => 1,  79 => 28,  72 => 25,  69 => 21,  47 => 8,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 51,  145 => 54,  139 => 43,  131 => 41,  123 => 42,  120 => 41,  115 => 46,  111 => 33,  108 => 44,  101 => 52,  98 => 34,  96 => 28,  83 => 24,  74 => 21,  66 => 20,  55 => 22,  52 => 10,  50 => 9,  43 => 6,  41 => 12,  35 => 9,  32 => 4,  29 => 9,  209 => 63,  203 => 66,  199 => 81,  193 => 77,  189 => 64,  187 => 76,  182 => 49,  176 => 72,  173 => 71,  168 => 55,  164 => 54,  162 => 53,  154 => 58,  149 => 59,  147 => 55,  144 => 43,  141 => 52,  133 => 50,  130 => 40,  125 => 48,  122 => 58,  116 => 39,  112 => 45,  109 => 54,  106 => 36,  103 => 39,  99 => 25,  95 => 33,  92 => 27,  86 => 22,  82 => 21,  80 => 27,  73 => 33,  64 => 18,  60 => 26,  57 => 11,  54 => 25,  51 => 21,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 12,  33 => 3,  30 => 5,);
    }
}
