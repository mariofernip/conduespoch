<?php

/* academicoBundle:Default:listamateriasxdocentexsusp.html.twig */
class __TwigTemplate_0f9804d1449eef40ede47df37b09cf4334cdeb211eefe698ce3abbce8a8e8622 extends Twig_Template
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

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo " Perfil de docente ";
    }

    // line 6
    public function block_id($context, array $blocks = array())
    {
        echo "portada";
    }

    // line 8
    public function block_article($context, array $blocks = array())
    {
        // line 9
        echo "<section id=\"menu_docente\">
    ";
        // line 10
        $this->env->loadTemplate("academicoBundle:Default:menu_docente.html.twig")->display($context);
        // line 11
        echo "</section>

";
    }

    // line 14
    public function block_aside($context, array $blocks = array())
    {
        // line 15
        echo "

";
        // line 17
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <strong>
        <p align=\"center\"> NOTAS DE SUSPENSO</p>
        <p align=\"left\">Curso / Materia</p>
    </strong>
    <div id=\"relacionadas\">
        <ul>
    ";
        // line 24
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materiasdoc"]) ? $context["materiasdoc"] : $this->getContext($context, "materiasdoc")));
        foreach ($context['_seq'] as $context["_key"] => $context["matdoc"]) {
            // line 25
            echo "                <li><a class=\"boton\" href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("docente_notas_suspenso", array("materia" => $this->getAttribute($this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "materia"), "id"), "nivel" => $this->getAttribute($this->getAttribute((isset($context["matdoc"]) ? $context["matdoc"] : $this->getContext($context, "matdoc")), "nivel"), "id"))), "html", null, true);
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
        // line 27
        echo "
            </ul>
        </div>

";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:listamateriasxdocentexsusp.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 71,  228 => 70,  216 => 67,  192 => 51,  113 => 29,  137 => 34,  70 => 20,  185 => 50,  172 => 71,  190 => 80,  184 => 78,  181 => 77,  175 => 75,  165 => 67,  153 => 61,  150 => 60,  127 => 33,  124 => 32,  114 => 27,  76 => 25,  236 => 113,  226 => 67,  223 => 66,  205 => 60,  202 => 82,  191 => 51,  155 => 41,  84 => 21,  97 => 37,  81 => 22,  34 => 6,  213 => 62,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 51,  167 => 44,  161 => 42,  146 => 41,  134 => 33,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 50,  194 => 63,  188 => 49,  160 => 65,  152 => 43,  148 => 43,  126 => 46,  118 => 31,  110 => 31,  90 => 24,  77 => 21,  58 => 11,  53 => 8,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 50,  128 => 31,  107 => 39,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 115,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 69,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 42,  143 => 36,  135 => 53,  119 => 28,  102 => 29,  71 => 16,  67 => 16,  63 => 15,  59 => 14,  38 => 4,  94 => 27,  89 => 24,  85 => 23,  75 => 18,  68 => 19,  56 => 9,  87 => 30,  21 => 2,  26 => 6,  93 => 35,  88 => 34,  78 => 25,  46 => 9,  27 => 4,  44 => 6,  31 => 5,  28 => 3,  201 => 58,  196 => 90,  183 => 41,  171 => 74,  166 => 50,  163 => 43,  158 => 62,  156 => 45,  151 => 40,  142 => 38,  138 => 53,  136 => 36,  121 => 46,  117 => 28,  105 => 25,  91 => 27,  62 => 14,  49 => 10,  24 => 1,  25 => 3,  19 => 1,  79 => 22,  72 => 18,  69 => 23,  47 => 7,  40 => 6,  37 => 6,  22 => 2,  246 => 134,  157 => 64,  145 => 57,  139 => 40,  131 => 52,  123 => 29,  120 => 43,  115 => 41,  111 => 40,  108 => 33,  101 => 38,  98 => 33,  96 => 26,  83 => 25,  74 => 24,  66 => 15,  55 => 11,  52 => 11,  50 => 8,  43 => 8,  41 => 8,  35 => 4,  32 => 2,  29 => 3,  209 => 82,  203 => 59,  199 => 81,  193 => 77,  189 => 75,  187 => 49,  182 => 49,  176 => 72,  173 => 52,  168 => 72,  164 => 43,  162 => 48,  154 => 67,  149 => 59,  147 => 39,  144 => 42,  141 => 48,  133 => 35,  130 => 41,  125 => 30,  122 => 31,  116 => 30,  112 => 34,  109 => 26,  106 => 30,  103 => 32,  99 => 24,  95 => 37,  92 => 36,  86 => 22,  82 => 29,  80 => 19,  73 => 20,  64 => 17,  60 => 15,  57 => 14,  54 => 9,  51 => 11,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
