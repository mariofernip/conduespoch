<?php

/* administrativoBundle:Default:modificarhora.html.twig */
class __TwigTemplate_55001a5ff4ea5b793414d34c55c16411d3112b7513f80996e99078a97efe5f74 extends Twig_Template
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
        echo "hora";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Modificar hora";
    }

    // line 8
    public function block_article($context, array $blocks = array())
    {
        // line 9
        echo "<section id=\"menu_admin\">
    ";
        // line 10
        $this->env->loadTemplate("administrativoBundle:Default:menu_admin.html.twig")->display($context);
        // line 11
        echo "</section>
<h1>";
        // line 12
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>

<form action=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("hora_modificar_id", array("hid" => (isset($context["id"]) ? $context["id"] : $this->getContext($context, "id")))), "html", null, true);
        echo "\" method=\"post\" ";
        echo         // line 15
$this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'enctype');
        echo ">
        ";
        // line 16
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'errors');
        echo "
          <fieldset>
                  ";
        // line 18
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "hora_inicio"), 'row', array("attr" => array("autocomplete" => "off")));
        echo "  
                  ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "hora_fin"), 'row', array("attr" => array("autocomplete" => "off")));
        echo "  
                  ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "descripcion"), 'row', array("attr" => array("autocomplete" => "off")));
        echo "  
              </fieldset>   
         ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'rest');
        echo "                   
          <input class=\"boton\" type=\"submit\" value=\"Guardar\" />
</form>


";
    }

    // line 29
    public function block_aside($context, array $blocks = array())
    {
        // line 30
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "administrativoBundle:Default:modificarhora.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  709 => 347,  707 => 346,  702 => 344,  693 => 339,  682 => 335,  668 => 327,  664 => 325,  657 => 323,  653 => 322,  650 => 321,  646 => 319,  644 => 318,  630 => 315,  627 => 314,  623 => 313,  616 => 309,  612 => 308,  604 => 306,  582 => 289,  578 => 287,  570 => 285,  566 => 284,  563 => 283,  559 => 282,  552 => 278,  529 => 261,  523 => 257,  516 => 255,  512 => 254,  509 => 253,  505 => 251,  498 => 248,  491 => 246,  484 => 242,  464 => 228,  458 => 224,  450 => 222,  447 => 221,  443 => 220,  408 => 193,  401 => 191,  394 => 189,  388 => 186,  346 => 161,  342 => 159,  334 => 157,  288 => 129,  395 => 175,  392 => 174,  386 => 170,  378 => 167,  375 => 166,  361 => 156,  330 => 156,  327 => 155,  323 => 154,  295 => 124,  291 => 122,  284 => 127,  277 => 118,  271 => 115,  261 => 113,  257 => 112,  250 => 110,  231 => 101,  397 => 190,  390 => 187,  377 => 141,  370 => 138,  352 => 132,  348 => 150,  344 => 149,  335 => 145,  331 => 127,  316 => 150,  304 => 118,  289 => 111,  262 => 119,  244 => 91,  129 => 47,  326 => 118,  324 => 123,  320 => 122,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 149,  210 => 70,  705 => 153,  703 => 152,  699 => 343,  696 => 150,  688 => 337,  685 => 336,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 317,  634 => 316,  626 => 122,  614 => 121,  608 => 307,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 277,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 183,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 71,  297 => 70,  286 => 110,  280 => 119,  272 => 66,  251 => 63,  200 => 73,  207 => 122,  248 => 92,  233 => 139,  218 => 74,  174 => 68,  222 => 85,  212 => 81,  197 => 72,  180 => 67,  23 => 3,  245 => 107,  525 => 165,  520 => 162,  507 => 160,  503 => 250,  495 => 247,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 197,  411 => 127,  403 => 125,  400 => 177,  383 => 123,  376 => 182,  372 => 118,  364 => 176,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 125,  270 => 80,  267 => 114,  265 => 99,  259 => 77,  239 => 142,  232 => 88,  228 => 137,  216 => 67,  192 => 76,  113 => 61,  137 => 49,  70 => 17,  185 => 64,  172 => 63,  190 => 70,  184 => 74,  181 => 67,  175 => 60,  165 => 66,  153 => 52,  150 => 56,  127 => 47,  124 => 35,  114 => 44,  76 => 20,  236 => 89,  226 => 87,  223 => 86,  205 => 82,  202 => 69,  191 => 76,  155 => 85,  84 => 22,  97 => 30,  81 => 20,  34 => 4,  213 => 125,  206 => 52,  195 => 113,  186 => 58,  178 => 66,  170 => 59,  167 => 58,  161 => 63,  146 => 52,  134 => 54,  104 => 36,  100 => 24,  65 => 19,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 56,  225 => 78,  215 => 73,  211 => 86,  198 => 80,  194 => 73,  188 => 75,  160 => 62,  152 => 50,  148 => 54,  126 => 48,  118 => 44,  110 => 31,  90 => 22,  77 => 19,  58 => 12,  53 => 11,  480 => 241,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 215,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 178,  398 => 129,  393 => 126,  387 => 122,  384 => 185,  381 => 168,  379 => 119,  374 => 140,  368 => 177,  365 => 111,  362 => 110,  360 => 134,  355 => 152,  341 => 148,  337 => 146,  322 => 101,  314 => 99,  312 => 149,  309 => 110,  305 => 95,  298 => 88,  294 => 133,  285 => 85,  283 => 88,  278 => 104,  268 => 65,  264 => 89,  258 => 96,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 101,  169 => 57,  140 => 50,  132 => 50,  128 => 38,  107 => 42,  61 => 14,  273 => 124,  269 => 123,  254 => 151,  243 => 106,  240 => 90,  238 => 80,  235 => 104,  230 => 81,  227 => 76,  224 => 99,  221 => 80,  219 => 85,  217 => 95,  208 => 80,  204 => 79,  179 => 66,  159 => 66,  143 => 53,  135 => 51,  119 => 41,  102 => 36,  71 => 18,  67 => 29,  63 => 29,  59 => 14,  38 => 4,  94 => 29,  89 => 28,  85 => 21,  75 => 19,  68 => 16,  56 => 12,  87 => 29,  21 => 2,  26 => 6,  93 => 29,  88 => 24,  78 => 20,  46 => 9,  27 => 4,  44 => 5,  31 => 4,  28 => 5,  201 => 71,  196 => 74,  183 => 63,  171 => 64,  166 => 59,  163 => 67,  158 => 62,  156 => 53,  151 => 55,  142 => 44,  138 => 51,  136 => 50,  121 => 34,  117 => 45,  105 => 38,  91 => 29,  62 => 15,  49 => 10,  24 => 1,  25 => 4,  19 => 1,  79 => 20,  72 => 19,  69 => 20,  47 => 6,  40 => 6,  37 => 6,  22 => 2,  246 => 134,  157 => 61,  145 => 52,  139 => 50,  131 => 46,  123 => 47,  120 => 35,  115 => 43,  111 => 27,  108 => 41,  101 => 52,  98 => 32,  96 => 35,  83 => 23,  74 => 19,  66 => 16,  55 => 22,  52 => 8,  50 => 7,  43 => 8,  41 => 12,  35 => 9,  32 => 3,  29 => 9,  209 => 63,  203 => 66,  199 => 81,  193 => 77,  189 => 110,  187 => 69,  182 => 63,  176 => 65,  173 => 70,  168 => 63,  164 => 55,  162 => 53,  154 => 52,  149 => 53,  147 => 54,  144 => 53,  141 => 52,  133 => 49,  130 => 38,  125 => 37,  122 => 36,  116 => 33,  112 => 42,  109 => 33,  106 => 25,  103 => 30,  99 => 35,  95 => 23,  92 => 27,  86 => 27,  82 => 25,  80 => 21,  73 => 22,  64 => 15,  60 => 13,  57 => 26,  54 => 12,  51 => 11,  48 => 9,  45 => 8,  42 => 9,  39 => 6,  36 => 12,  33 => 4,  30 => 5,);
    }
}
