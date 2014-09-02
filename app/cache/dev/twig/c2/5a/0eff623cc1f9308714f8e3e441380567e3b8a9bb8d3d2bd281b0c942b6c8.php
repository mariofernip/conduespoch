<?php

/* administrativoBundle:Default:listadocentes.html.twig */
class __TwigTemplate_c25a0eff623cc1f9308714f8e3e441380567e3b8a9bb8d3d2bd281b0c942b6c8 extends Twig_Template
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
        echo "<section id=\"menu_admin\">
    ";
        // line 7
        $this->env->loadTemplate("administrativoBundle:Default:menu_admin.html.twig")->display($context);
        // line 8
        echo "</section>
<h3><p align=\"center\">Docentes </p><h3>
";
        // line 11
        if (((isset($context["sd"]) ? $context["sd"] : $this->getContext($context, "sd")) == 1)) {
            // line 12
            echo "<div id=\"dt_example\">
    <div id=\"demo\">
        <table class=\"display\" id=\"example\">
            <thead>
                <tr >
                    <th>";
            // line 17
            echo "Cedula";
            echo "</th>
                    <th>";
            // line 18
            echo "Nombres/Apellidos";
            echo "</th>
                    <th>";
            // line 19
            echo "e-mail";
            echo "</th>                   
                    <th>";
            // line 20
            echo "Estado";
            echo "</th>
                    <th>Accion</th>
                </tr>
            </thead>
    
            <tbody>";
            // line 25
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listadocentes"]) ? $context["listadocentes"] : $this->getContext($context, "listadocentes")));
            foreach ($context['_seq'] as $context["_key"] => $context["doc"]) {
                // line 26
                echo "                <tr>
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "cedula"), "html", null, true);
                echo "</td> 
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "apellido"), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "nombre"), "html", null, true);
                echo "</td>   
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "email"), "html", null, true);
                echo "</td> 
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\">";
                // line 30
                if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "estado") == 1)) {
                    // line 31
                    echo "            <strong>Activo</strong>
        ";
                }
                // line 33
                echo "        ";
                if (($this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "estado") == 0)) {
                    // line 34
                    echo "            <strong>No activo</strong>
        ";
                }
                // line 35
                echo "</td> 
                        <td  ALIGN=\"CENTER\" style=\"vertical-align:middle\"><a  href=\"";
                // line 36
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("docente_modificar_id", array("did" => $this->getAttribute((isset($context["doc"]) ? $context["doc"] : $this->getContext($context, "doc")), "id"))), "html", null, true);
                echo "\"><img title=\"Editar datos\"   src=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("uploads/iconos/edit.gif"), "html", null, true);
                echo "\" ></a></td>
                <tr> 
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['doc'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "            </tbody>

   
        </table>
            
    </div>
</div>
<br>
";
        }
        // line 48
        echo "

";
    }

    // line 51
    public function block_aside($context, array $blocks = array())
    {
        // line 52
        echo "    
    ";
        // line 53
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
     
        <a href=\"";
        // line 55
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\">Cerrar sesión</a>
";
    }

    // line 58
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 59
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

";
        // line 61
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
        // line 62
        echo "
   ";
    }

    public function getTemplateName()
    {
        return "administrativoBundle:Default:listadocentes.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  709 => 347,  707 => 346,  702 => 344,  693 => 339,  682 => 335,  668 => 327,  664 => 325,  657 => 323,  653 => 322,  650 => 321,  646 => 319,  644 => 318,  630 => 315,  627 => 314,  623 => 313,  616 => 309,  612 => 308,  604 => 306,  582 => 289,  578 => 287,  570 => 285,  566 => 284,  563 => 283,  559 => 282,  552 => 278,  529 => 261,  523 => 257,  516 => 255,  512 => 254,  509 => 253,  505 => 251,  498 => 248,  491 => 246,  484 => 242,  464 => 228,  458 => 224,  450 => 222,  447 => 221,  443 => 220,  408 => 193,  401 => 191,  394 => 189,  388 => 186,  346 => 161,  342 => 159,  334 => 157,  288 => 129,  395 => 175,  392 => 174,  386 => 170,  378 => 167,  375 => 166,  361 => 156,  330 => 156,  327 => 155,  323 => 154,  295 => 124,  291 => 122,  284 => 127,  277 => 118,  271 => 115,  261 => 113,  257 => 112,  250 => 110,  231 => 101,  397 => 190,  390 => 187,  377 => 141,  370 => 138,  352 => 132,  348 => 150,  344 => 149,  335 => 145,  331 => 127,  316 => 150,  304 => 118,  289 => 111,  262 => 119,  244 => 91,  129 => 56,  326 => 118,  324 => 123,  320 => 122,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 84,  210 => 70,  705 => 153,  703 => 152,  699 => 343,  696 => 150,  688 => 337,  685 => 336,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 317,  634 => 316,  626 => 122,  614 => 121,  608 => 307,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 277,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 183,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 110,  280 => 119,  272 => 66,  251 => 63,  200 => 78,  207 => 72,  248 => 92,  233 => 82,  218 => 74,  174 => 68,  222 => 85,  212 => 81,  197 => 74,  180 => 73,  23 => 3,  245 => 107,  525 => 165,  520 => 162,  507 => 160,  503 => 250,  495 => 247,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 197,  411 => 127,  403 => 125,  400 => 177,  383 => 123,  376 => 182,  372 => 118,  364 => 176,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 125,  270 => 80,  267 => 114,  265 => 99,  259 => 77,  239 => 103,  232 => 88,  228 => 100,  216 => 67,  192 => 76,  113 => 38,  137 => 49,  70 => 22,  185 => 75,  172 => 56,  190 => 63,  184 => 74,  181 => 74,  175 => 61,  165 => 66,  153 => 52,  150 => 51,  127 => 49,  124 => 46,  114 => 40,  76 => 26,  236 => 89,  226 => 87,  223 => 86,  205 => 82,  202 => 69,  191 => 76,  155 => 61,  84 => 25,  97 => 39,  81 => 29,  34 => 4,  213 => 71,  206 => 52,  195 => 78,  186 => 58,  178 => 73,  170 => 59,  167 => 58,  161 => 55,  146 => 54,  134 => 54,  104 => 41,  100 => 29,  65 => 17,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 56,  225 => 78,  215 => 73,  211 => 86,  198 => 80,  194 => 79,  188 => 75,  160 => 62,  152 => 64,  148 => 59,  126 => 44,  118 => 45,  110 => 37,  90 => 32,  77 => 20,  58 => 12,  53 => 11,  480 => 241,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 215,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 178,  398 => 129,  393 => 126,  387 => 122,  384 => 185,  381 => 168,  379 => 119,  374 => 140,  368 => 177,  365 => 111,  362 => 110,  360 => 134,  355 => 152,  341 => 148,  337 => 146,  322 => 101,  314 => 99,  312 => 149,  309 => 110,  305 => 95,  298 => 88,  294 => 133,  285 => 85,  283 => 88,  278 => 104,  268 => 65,  264 => 89,  258 => 96,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 62,  169 => 48,  140 => 50,  132 => 49,  128 => 46,  107 => 34,  61 => 14,  273 => 124,  269 => 123,  254 => 111,  243 => 106,  240 => 90,  238 => 80,  235 => 104,  230 => 81,  227 => 76,  224 => 99,  221 => 80,  219 => 85,  217 => 95,  208 => 80,  204 => 79,  179 => 50,  159 => 66,  143 => 53,  135 => 55,  119 => 35,  102 => 29,  71 => 16,  67 => 29,  63 => 15,  59 => 15,  38 => 4,  94 => 27,  89 => 26,  85 => 25,  75 => 23,  68 => 16,  56 => 11,  87 => 33,  21 => 2,  26 => 6,  93 => 28,  88 => 49,  78 => 24,  46 => 10,  27 => 4,  44 => 5,  31 => 5,  28 => 1,  201 => 71,  196 => 77,  183 => 60,  171 => 69,  166 => 56,  163 => 67,  158 => 62,  156 => 53,  151 => 57,  142 => 44,  138 => 50,  136 => 49,  121 => 47,  117 => 41,  105 => 36,  91 => 29,  62 => 18,  49 => 11,  24 => 1,  25 => 4,  19 => 1,  79 => 27,  72 => 26,  69 => 18,  47 => 6,  40 => 6,  37 => 7,  22 => 2,  246 => 134,  157 => 61,  145 => 52,  139 => 43,  131 => 47,  123 => 43,  120 => 42,  115 => 34,  111 => 39,  108 => 31,  101 => 52,  98 => 34,  96 => 28,  83 => 23,  74 => 19,  66 => 20,  55 => 22,  52 => 8,  50 => 7,  43 => 9,  41 => 12,  35 => 9,  32 => 3,  29 => 9,  209 => 63,  203 => 66,  199 => 81,  193 => 77,  189 => 64,  187 => 76,  182 => 49,  176 => 72,  173 => 70,  168 => 55,  164 => 54,  162 => 53,  154 => 60,  149 => 59,  147 => 53,  144 => 48,  141 => 59,  133 => 39,  130 => 40,  125 => 55,  122 => 36,  116 => 39,  112 => 33,  109 => 54,  106 => 30,  103 => 30,  99 => 36,  95 => 33,  92 => 27,  86 => 22,  82 => 25,  80 => 24,  73 => 19,  64 => 15,  60 => 26,  57 => 11,  54 => 13,  51 => 12,  48 => 9,  45 => 8,  42 => 9,  39 => 6,  36 => 12,  33 => 4,  30 => 5,);
    }
}
