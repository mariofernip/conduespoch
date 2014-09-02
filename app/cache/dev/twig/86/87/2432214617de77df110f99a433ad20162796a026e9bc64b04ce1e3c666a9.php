<?php

/* academicoBundle:Default:estudiantematriculado.html.twig */
class __TwigTemplate_86872432214617de77df110f99a433ad20162796a026e9bc64b04ce1e3c666a9 extends Twig_Template
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

    // line 3
    public function block_id($context, array $blocks = array())
    {
        echo "estudiante";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        // line 6
        echo "
";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["mensaje"]) ? $context["mensaje"] : $this->getContext($context, "mensaje")), "html", null, true);
        echo "

";
    }

    // line 11
    public function block_article($context, array $blocks = array())
    {
        // line 12
        echo "
<h1>";
        // line 13
        $this->displayBlock("title", $context, $blocks);
        echo "</h1>







";
    }

    // line 23
    public function block_aside($context, array $blocks = array())
    {
        // line 24
        echo "mensaje
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:estudiantematriculado.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  236 => 73,  226 => 67,  223 => 66,  205 => 60,  202 => 59,  191 => 51,  155 => 43,  84 => 21,  97 => 34,  81 => 30,  34 => 6,  213 => 62,  206 => 62,  195 => 68,  186 => 58,  178 => 52,  170 => 51,  167 => 50,  161 => 48,  146 => 41,  134 => 35,  104 => 32,  100 => 31,  65 => 14,  300 => 124,  293 => 121,  290 => 120,  256 => 89,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 72,  198 => 65,  194 => 63,  188 => 59,  160 => 47,  152 => 43,  148 => 43,  126 => 33,  118 => 31,  110 => 31,  90 => 24,  77 => 17,  58 => 13,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 123,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 70,  214 => 69,  177 => 65,  169 => 51,  140 => 41,  132 => 51,  128 => 49,  107 => 36,  61 => 19,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 44,  143 => 56,  135 => 53,  119 => 38,  102 => 29,  71 => 17,  67 => 16,  63 => 20,  59 => 14,  38 => 6,  94 => 32,  89 => 31,  85 => 11,  75 => 18,  68 => 14,  56 => 13,  87 => 30,  21 => 2,  26 => 6,  93 => 33,  88 => 32,  78 => 21,  46 => 8,  27 => 4,  44 => 8,  31 => 3,  28 => 3,  201 => 58,  196 => 90,  183 => 57,  171 => 61,  166 => 50,  163 => 45,  158 => 67,  156 => 45,  151 => 63,  142 => 59,  138 => 36,  136 => 39,  121 => 46,  117 => 44,  105 => 40,  91 => 27,  62 => 14,  49 => 12,  24 => 1,  25 => 3,  19 => 1,  79 => 19,  72 => 24,  69 => 23,  47 => 9,  40 => 6,  37 => 5,  22 => 2,  246 => 90,  157 => 56,  145 => 41,  139 => 40,  131 => 52,  123 => 47,  120 => 40,  115 => 43,  111 => 37,  108 => 33,  101 => 32,  98 => 33,  96 => 24,  83 => 25,  74 => 6,  66 => 16,  55 => 12,  52 => 13,  50 => 11,  43 => 7,  41 => 8,  35 => 4,  32 => 4,  29 => 3,  209 => 82,  203 => 69,  199 => 67,  193 => 62,  189 => 71,  187 => 49,  182 => 66,  176 => 64,  173 => 52,  168 => 72,  164 => 59,  162 => 48,  154 => 58,  149 => 42,  147 => 58,  144 => 42,  141 => 48,  133 => 55,  130 => 34,  125 => 44,  122 => 32,  116 => 41,  112 => 34,  109 => 34,  106 => 30,  103 => 32,  99 => 31,  95 => 28,  92 => 23,  86 => 31,  82 => 29,  80 => 19,  73 => 16,  64 => 16,  60 => 15,  57 => 12,  54 => 10,  51 => 7,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
