<?php

/* administrativoBundle:Default:registrodocente.html.twig */
class __TwigTemplate_673bd0c0618999d3a4e4900da33eb080f7f0075a1bf5bdc663ac62aad2c4235c extends Twig_Template
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
        echo "estudiante";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Registro de un nuevo docente";
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
        echo $this->env->getExtension('routing')->getPath("docente_registro");
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
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "cedula"), 'label', array("label" => "Número de cédula:"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "cedula"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "cedula"), 'widget', array("attr" => array("autocomplete" => "off")));
        echo "
                  ";
        // line 19
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "nombre"), 'row', array("attr" => array("autocomplete" => "off")));
        echo "
                  ";
        // line 20
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "apellido"), 'row', array("attr" => array("autocomplete" => "off")));
        echo "
                  ";
        // line 21
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "direccion"), 'label', array("label" => "Dirección"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "direccion"), 'widget', array("attr" => array("autocomplete" => "off")));
        echo "                                    
                  ";
        // line 22
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "telefonofijo"), 'row');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "telefonofijo"), 'widget', array("attr" => array("autocomplete" => "off")));
        echo "
                  ";
        // line 23
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "celular"), 'row', array("attr" => array("autocomplete" => "off")));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'errors');
        echo "                  
                  ";
        // line 24
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'label', array("label" => "Correo:"));
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'errors');
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "email"), 'widget', array("attr" => array("autocomplete" => "off")));
        echo "                  
                  ";
        // line 25
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getAttribute((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), "trabajoanterior"), 'row', array("attr" => array("autocomplete" => "off")));
        echo "                  
              </fieldset>   
         ";
        // line 27
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock((isset($context["formulario"]) ? $context["formulario"] : $this->getContext($context, "formulario")), 'rest');
        echo "                   
          <input class=\"boton\" type=\"submit\" value=\"Guardar\" />
</form>


";
    }

    // line 34
    public function block_aside($context, array $blocks = array())
    {
        // line 35
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
";
    }

    public function getTemplateName()
    {
        return "administrativoBundle:Default:registrodocente.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  315 => 110,  281 => 95,  709 => 347,  707 => 346,  702 => 344,  693 => 339,  682 => 335,  668 => 327,  664 => 325,  657 => 323,  653 => 322,  650 => 321,  646 => 319,  644 => 318,  630 => 315,  627 => 314,  623 => 313,  616 => 309,  612 => 308,  604 => 306,  582 => 289,  578 => 287,  570 => 285,  566 => 284,  563 => 283,  559 => 282,  552 => 278,  529 => 261,  523 => 257,  516 => 255,  512 => 254,  509 => 253,  505 => 251,  498 => 248,  491 => 246,  484 => 242,  464 => 228,  458 => 224,  450 => 222,  447 => 221,  443 => 220,  408 => 193,  401 => 191,  394 => 189,  388 => 186,  346 => 161,  342 => 159,  334 => 157,  288 => 129,  395 => 175,  392 => 174,  386 => 170,  378 => 167,  375 => 166,  361 => 156,  330 => 156,  327 => 155,  323 => 154,  295 => 124,  291 => 97,  284 => 127,  277 => 94,  271 => 115,  261 => 113,  257 => 112,  250 => 110,  231 => 101,  397 => 190,  390 => 187,  377 => 141,  370 => 138,  352 => 132,  348 => 150,  344 => 149,  335 => 145,  331 => 127,  316 => 150,  304 => 118,  289 => 111,  262 => 89,  244 => 91,  129 => 38,  326 => 118,  324 => 123,  320 => 111,  317 => 115,  306 => 109,  296 => 116,  282 => 95,  249 => 81,  210 => 70,  705 => 153,  703 => 152,  699 => 343,  696 => 150,  688 => 337,  685 => 336,  679 => 140,  675 => 139,  672 => 138,  656 => 125,  640 => 317,  634 => 316,  626 => 122,  614 => 121,  608 => 307,  605 => 119,  589 => 118,  583 => 117,  573 => 116,  562 => 114,  556 => 113,  548 => 277,  544 => 111,  527 => 109,  518 => 102,  502 => 101,  496 => 100,  488 => 99,  476 => 98,  470 => 97,  467 => 96,  451 => 95,  445 => 94,  424 => 91,  418 => 90,  410 => 89,  406 => 88,  389 => 86,  380 => 183,  358 => 77,  350 => 76,  338 => 129,  332 => 74,  313 => 72,  307 => 106,  297 => 70,  286 => 110,  280 => 119,  272 => 92,  251 => 63,  200 => 73,  207 => 122,  248 => 92,  233 => 139,  218 => 74,  174 => 53,  222 => 85,  212 => 81,  197 => 72,  180 => 67,  23 => 3,  245 => 107,  525 => 165,  520 => 162,  507 => 160,  503 => 250,  495 => 247,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 197,  411 => 127,  403 => 125,  400 => 177,  383 => 123,  376 => 182,  372 => 118,  364 => 176,  356 => 133,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 73,  308 => 119,  302 => 89,  279 => 83,  276 => 125,  270 => 80,  267 => 114,  265 => 99,  259 => 77,  239 => 142,  232 => 76,  228 => 75,  216 => 67,  192 => 76,  113 => 32,  137 => 49,  70 => 17,  185 => 64,  172 => 63,  190 => 70,  184 => 74,  181 => 67,  175 => 60,  165 => 66,  153 => 52,  150 => 56,  127 => 49,  124 => 35,  114 => 44,  76 => 18,  236 => 77,  226 => 87,  223 => 73,  205 => 82,  202 => 69,  191 => 76,  155 => 61,  84 => 22,  97 => 22,  81 => 20,  34 => 4,  213 => 70,  206 => 52,  195 => 113,  186 => 58,  178 => 66,  170 => 52,  167 => 64,  161 => 49,  146 => 52,  134 => 50,  104 => 28,  100 => 24,  65 => 19,  300 => 117,  293 => 103,  290 => 86,  256 => 95,  253 => 85,  242 => 78,  225 => 78,  215 => 71,  211 => 86,  198 => 80,  194 => 73,  188 => 75,  160 => 62,  152 => 43,  148 => 59,  126 => 35,  118 => 33,  110 => 42,  90 => 22,  77 => 19,  58 => 12,  53 => 11,  480 => 241,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 215,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 178,  398 => 129,  393 => 126,  387 => 122,  384 => 185,  381 => 168,  379 => 119,  374 => 140,  368 => 177,  365 => 111,  362 => 110,  360 => 134,  355 => 152,  341 => 148,  337 => 146,  322 => 101,  314 => 99,  312 => 109,  309 => 110,  305 => 95,  298 => 100,  294 => 133,  285 => 96,  283 => 88,  278 => 104,  268 => 91,  264 => 90,  258 => 87,  252 => 93,  247 => 84,  241 => 77,  229 => 79,  220 => 54,  214 => 78,  177 => 101,  169 => 57,  140 => 50,  132 => 52,  128 => 38,  107 => 42,  61 => 14,  273 => 124,  269 => 123,  254 => 151,  243 => 106,  240 => 90,  238 => 80,  235 => 104,  230 => 81,  227 => 76,  224 => 99,  221 => 80,  219 => 72,  217 => 95,  208 => 80,  204 => 79,  179 => 55,  159 => 66,  143 => 53,  135 => 38,  119 => 33,  102 => 30,  71 => 18,  67 => 29,  63 => 16,  59 => 14,  38 => 5,  94 => 29,  89 => 23,  85 => 21,  75 => 19,  68 => 16,  56 => 12,  87 => 28,  21 => 2,  26 => 6,  93 => 29,  88 => 28,  78 => 21,  46 => 9,  27 => 4,  44 => 7,  31 => 4,  28 => 5,  201 => 71,  196 => 74,  183 => 56,  171 => 64,  166 => 51,  163 => 67,  158 => 62,  156 => 53,  151 => 55,  142 => 46,  138 => 56,  136 => 51,  121 => 34,  117 => 45,  105 => 39,  91 => 29,  62 => 15,  49 => 10,  24 => 1,  25 => 4,  19 => 1,  79 => 20,  72 => 20,  69 => 25,  47 => 8,  40 => 6,  37 => 6,  22 => 2,  246 => 134,  157 => 61,  145 => 40,  139 => 45,  131 => 37,  123 => 46,  120 => 45,  115 => 44,  111 => 27,  108 => 42,  101 => 38,  98 => 32,  96 => 31,  83 => 21,  74 => 21,  66 => 16,  55 => 12,  52 => 10,  50 => 9,  43 => 8,  41 => 12,  35 => 9,  32 => 4,  29 => 9,  209 => 68,  203 => 66,  199 => 61,  193 => 58,  189 => 110,  187 => 57,  182 => 63,  176 => 65,  173 => 70,  168 => 63,  164 => 50,  162 => 53,  154 => 60,  149 => 53,  147 => 58,  144 => 57,  141 => 52,  133 => 49,  130 => 38,  125 => 37,  122 => 34,  116 => 32,  112 => 44,  109 => 41,  106 => 25,  103 => 40,  99 => 35,  95 => 23,  92 => 33,  86 => 20,  82 => 24,  80 => 21,  73 => 18,  64 => 15,  60 => 13,  57 => 26,  54 => 12,  51 => 11,  48 => 9,  45 => 8,  42 => 9,  39 => 6,  36 => 12,  33 => 4,  30 => 5,);
    }
}
