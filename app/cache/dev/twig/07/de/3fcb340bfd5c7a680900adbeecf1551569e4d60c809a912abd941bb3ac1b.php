<?php

/* administrativoBundle:Default:menu_admin.html.twig */
class __TwigTemplate_07de3fcb340bfd5c7a680900adbeecf1551569e4d60c809a912abd941bb3ac1b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<span class=\"preload1\"></span>
<span class=\"preload2\"></span>
";
        // line 3
        $context["rol"] = "admin";
        // line 4
        echo "<ul id=\"nave\">
    <li class=\"top\"><a href=\"";
        // line 5
        echo $this->env->getExtension('routing')->getPath("admin_portada");
        echo "\" class=\"top_link\">INCIO</a></li>
    <li class=\"top\"><a id=\"products\" class=\"top_link\">PERIODO</a>        
        <ul class=\"sub\">
            <li>
                <a  href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("periodo_registro");
        echo "\" class=\"fly\"><img src=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/add.gif"), "html", null, true);
        echo "\">&nbsp;Nuevo</a>                              
            </li>                
            <li><a href=\"\" class=\"fly\">Modificar actual</a></li>
            <li><a  class=\"fly\">Ver</a>
                <ul>
                    <li>
                        <a  href=\"\" class=\"fly\">Actual</a>                        
                    </li>
                    <li>
                        <a  href=\"\" class=\"fly\">Todos</a>                        
                    </li>
                </ul>
            </li>

            <li><strong><a  class=\"fly\">Meses</a></strong>
                <ul>
                    <li>
                        <a  href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("admin_mes_registro");
        echo "\" class=\"fly\">Nuevo</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 29
        echo $this->env->getExtension('routing')->getPath("admin_mes_listar_todos");
        echo "\" class=\"fly\">Ver todos</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 32
        echo $this->env->getExtension('routing')->getPath("admin_mes_modificar_todos");
        echo "\" class=\"fly\">Modificar todos</a>                    
                    </li>
                </ul>
            </li>
            <li><strong><a  class=\"fly\">Días</a><strong>
                <ul>
                    <li>
                        <a  href=\"";
        // line 39
        echo $this->env->getExtension('routing')->getPath("admin_dia_registro");
        echo "\" class=\"fly\">Nuevo</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 42
        echo $this->env->getExtension('routing')->getPath("admin_dia_listar_todos");
        echo "\" class=\"fly\">Ver todos</a>                        
                    </li>
                </ul>
            </li>
            <li><strong><a  class=\"fly\">Horas</a><strong>
                <ul>
                    <li>
                        <a  href=\"";
        // line 49
        echo $this->env->getExtension('routing')->getPath("hora_ingresar");
        echo "\" class=\"fly\">Nueva</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 52
        echo $this->env->getExtension('routing')->getPath("hora_modificar");
        echo "\" class=\"fly\">Ver todas</a>                        
                    </li>
                </ul>
            </li>
        </ul>
    </li>
    <li class=\"top\"><a id=\"products\" class=\"top_link\">MATERIAS</a>        
        <ul class=\"sub\">
            <li>
                <a  href=\"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("materia_ingresar");
        echo "\" class=\"fly\">Nueva</a>                
            </li>                
            <li><a  href=\"";
        // line 63
        echo $this->env->getExtension('routing')->getPath("materia_modificar");
        echo "\" class=\"fly\">Ver todas</a>

            </li>
            <li><a  href=\"";
        // line 66
        echo $this->env->getExtension('routing')->getPath("materia_modificar_todos");
        echo "\" class=\"fly\">Modificar todas</a>
                
            </li>
            <li><strong><a  class=\"fly\">Areas</a></strong>
                <ul>
                    <li>
                        <a  href=\"";
        // line 72
        echo $this->env->getExtension('routing')->getPath("area_ingresar");
        echo "\" class=\"fly\">Nueva</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 75
        echo $this->env->getExtension('routing')->getPath("area_modificar");
        echo "\" class=\"fly\">Ver todas</a>                        
                    </li>
                </ul>
            </li>
            <li><strong><a  class=\"fly\">Materias grado</a></strong>
                <ul>
                    <li>
                        <a  href=\"";
        // line 82
        echo $this->env->getExtension('routing')->getPath("admin_materiagrado_registro");
        echo "\" class=\"fly\">Nueva</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 85
        echo $this->env->getExtension('routing')->getPath("admin_materiagrado_listar_todos");
        echo "\" class=\"fly\">Ver todas</a>                        
                    </li>
                </ul>
            </li>
        </ul>
    </li>


    <li class=\"top\"><a id=\"products\" class=\"top_link\">CURSOS</a>        
        <ul class=\"sub\">
            <li><strong><a  class=\"fly\">Paralelo</a></strong>
                <ul>
                    <li>
                        <a  href=\"";
        // line 98
        echo $this->env->getExtension('routing')->getPath("admin_paralelo_registro");
        echo "\" class=\"fly\">Nuevo</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 101
        echo $this->env->getExtension('routing')->getPath("admin_paralelo_listar_todos");
        echo "\" class=\"fly\">Ver todos</a>                        
                    </li>

                </ul>
            </li>            

            <li><strong><a  class=\"fly\">Curso</a></strong>
                <ul>
                    <li>
                        <a  href=\"";
        // line 110
        echo $this->env->getExtension('routing')->getPath("admin_nivel_registro");
        echo "\" class=\"fly\">Nuevo</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 113
        echo $this->env->getExtension('routing')->getPath("admin_nivel_listar_todos");
        echo "\" class=\"fly\">Ver todos</a>                        
                    </li>

                </ul>
            </li>            

            <li><strong> <a  class=\"fly\">Nivel</a></strong>
                <ul>
                    <li>
                        <a  href=\"";
        // line 122
        echo $this->env->getExtension('routing')->getPath("curso_ingresar");
        echo "\" class=\"fly\">Nuevo</a>                        
                    </li>
                    <li>
                        <a  href=\"";
        // line 125
        echo $this->env->getExtension('routing')->getPath("curso_modificar");
        echo "\" class=\"fly\">Ver todos</a>                        
                    </li>

                </ul>
            </li>            

        </ul>
    </li>

    <li class=\"top\"><a id=\"products\" class=\"top_link\">REQUISITOS</a>        
        <ul class=\"sub\">
            <li>
                <a  href=\"";
        // line 137
        echo $this->env->getExtension('routing')->getPath("admin_requisito_registro");
        echo "\" class=\"fly\">Nuevo</a>                
            </li>                
            <li><a  href=\"";
        // line 139
        echo $this->env->getExtension('routing')->getPath("admin_requisito_listar_todos");
        echo "\" class=\"fly\">Ver todos</a>                
            </li>            
            <li>
                <a  href=\"";
        // line 142
        echo $this->env->getExtension('routing')->getPath("admin_requisito_modificar_estados");
        echo "\" class=\"fly\">Modificar todos</a>                        
            </li>
        </ul>
    </li>
    <li class=\"top\"><a id=\"products\" class=\"top_link\">USUARIOS</a>        
        <ul class=\"sub\">
            <li>
                <a  href=\"";
        // line 149
        echo $this->env->getExtension('routing')->getPath("usuario_registro");
        echo "\" class=\"fly\">Nuevo</a>                
            </li>                
            <li><a href=\"";
        // line 151
        echo $this->env->getExtension('routing')->getPath("usuario_modificar");
        echo "\"  class=\"fly\">Ver todos</a>                
            </li>            
            
        </ul>
    </li>
</ul>







";
    }

    public function getTemplateName()
    {
        return "administrativoBundle:Default:menu_admin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  709 => 347,  707 => 346,  702 => 344,  693 => 339,  682 => 335,  668 => 327,  664 => 325,  657 => 323,  653 => 322,  650 => 321,  646 => 319,  644 => 318,  630 => 315,  627 => 314,  623 => 313,  616 => 309,  612 => 308,  604 => 306,  582 => 289,  578 => 287,  570 => 285,  566 => 284,  563 => 283,  559 => 282,  552 => 278,  529 => 261,  523 => 257,  516 => 255,  512 => 254,  509 => 253,  505 => 251,  498 => 248,  491 => 246,  484 => 242,  464 => 228,  458 => 224,  450 => 222,  447 => 221,  443 => 220,  408 => 193,  401 => 191,  394 => 189,  388 => 186,  346 => 161,  342 => 159,  334 => 157,  288 => 129,  395 => 175,  392 => 174,  386 => 170,  378 => 167,  375 => 166,  361 => 156,  330 => 156,  327 => 155,  323 => 154,  295 => 124,  291 => 122,  284 => 127,  277 => 118,  271 => 115,  261 => 113,  257 => 112,  250 => 110,  231 => 101,  397 => 190,  390 => 187,  377 => 141,  370 => 138,  352 => 132,  348 => 150,  344 => 149,  335 => 145,  331 => 127,  316 => 150,  304 => 118,  289 => 111,  262 => 119,  244 => 91,  129 => 48,  326 => 118,  324 => 123,  320 => 122,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 149,  210 => 70,  705 => 153,  703 => 152,  699 => 343,  696 => 150,  688 => 337,  685 => 336,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 317,  634 => 316,  626 => 122,  614 => 121,  608 => 307,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 277,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 183,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 110,  280 => 119,  272 => 66,  251 => 63,  200 => 73,  207 => 122,  248 => 92,  233 => 139,  218 => 74,  174 => 68,  222 => 85,  212 => 81,  197 => 72,  180 => 67,  23 => 3,  245 => 107,  525 => 165,  520 => 162,  507 => 160,  503 => 250,  495 => 247,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 197,  411 => 127,  403 => 125,  400 => 177,  383 => 123,  376 => 182,  372 => 118,  364 => 176,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 125,  270 => 80,  267 => 114,  265 => 99,  259 => 77,  239 => 142,  232 => 88,  228 => 137,  216 => 67,  192 => 76,  113 => 61,  137 => 49,  70 => 17,  185 => 64,  172 => 63,  190 => 70,  184 => 74,  181 => 74,  175 => 60,  165 => 66,  153 => 52,  150 => 51,  127 => 44,  124 => 66,  114 => 32,  76 => 26,  236 => 89,  226 => 87,  223 => 86,  205 => 82,  202 => 69,  191 => 76,  155 => 85,  84 => 31,  97 => 39,  81 => 21,  34 => 4,  213 => 125,  206 => 52,  195 => 113,  186 => 58,  178 => 61,  170 => 59,  167 => 58,  161 => 58,  146 => 54,  134 => 54,  104 => 30,  100 => 29,  65 => 17,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 56,  225 => 78,  215 => 73,  211 => 86,  198 => 80,  194 => 73,  188 => 75,  160 => 62,  152 => 50,  148 => 54,  126 => 47,  118 => 63,  110 => 31,  90 => 33,  77 => 20,  58 => 12,  53 => 11,  480 => 241,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 215,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 178,  398 => 129,  393 => 126,  387 => 122,  384 => 185,  381 => 168,  379 => 119,  374 => 140,  368 => 177,  365 => 111,  362 => 110,  360 => 134,  355 => 152,  341 => 148,  337 => 146,  322 => 101,  314 => 99,  312 => 149,  309 => 110,  305 => 95,  298 => 88,  294 => 133,  285 => 85,  283 => 88,  278 => 104,  268 => 65,  264 => 89,  258 => 96,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 101,  169 => 57,  140 => 50,  132 => 49,  128 => 38,  107 => 34,  61 => 14,  273 => 124,  269 => 123,  254 => 151,  243 => 106,  240 => 90,  238 => 80,  235 => 104,  230 => 81,  227 => 76,  224 => 99,  221 => 80,  219 => 85,  217 => 95,  208 => 80,  204 => 79,  179 => 66,  159 => 66,  143 => 53,  135 => 50,  119 => 45,  102 => 29,  71 => 16,  67 => 29,  63 => 29,  59 => 15,  38 => 4,  94 => 27,  89 => 26,  85 => 42,  75 => 23,  68 => 16,  56 => 12,  87 => 32,  21 => 2,  26 => 6,  93 => 25,  88 => 49,  78 => 24,  46 => 10,  27 => 4,  44 => 5,  31 => 5,  28 => 5,  201 => 71,  196 => 74,  183 => 63,  171 => 98,  166 => 59,  163 => 67,  158 => 57,  156 => 53,  151 => 55,  142 => 44,  138 => 51,  136 => 49,  121 => 36,  117 => 35,  105 => 38,  91 => 29,  62 => 14,  49 => 11,  24 => 1,  25 => 4,  19 => 1,  79 => 39,  72 => 26,  69 => 32,  47 => 6,  40 => 6,  37 => 7,  22 => 2,  246 => 134,  157 => 61,  145 => 52,  139 => 75,  131 => 46,  123 => 46,  120 => 35,  115 => 34,  111 => 39,  108 => 39,  101 => 52,  98 => 34,  96 => 35,  83 => 23,  74 => 19,  66 => 20,  55 => 22,  52 => 8,  50 => 7,  43 => 9,  41 => 12,  35 => 9,  32 => 3,  29 => 9,  209 => 63,  203 => 66,  199 => 81,  193 => 77,  189 => 110,  187 => 69,  182 => 63,  176 => 65,  173 => 70,  168 => 55,  164 => 55,  162 => 53,  154 => 52,  149 => 82,  147 => 54,  144 => 53,  141 => 52,  133 => 72,  130 => 38,  125 => 37,  122 => 36,  116 => 33,  112 => 32,  109 => 33,  106 => 30,  103 => 30,  99 => 28,  95 => 49,  92 => 27,  86 => 21,  82 => 25,  80 => 20,  73 => 19,  64 => 15,  60 => 13,  57 => 26,  54 => 13,  51 => 10,  48 => 9,  45 => 8,  42 => 9,  39 => 6,  36 => 12,  33 => 4,  30 => 5,);
    }
}
