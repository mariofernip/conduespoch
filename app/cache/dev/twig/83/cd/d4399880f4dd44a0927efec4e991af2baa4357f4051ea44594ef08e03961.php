<?php

/* academicoBundle:Default:portada_docente2.html.twig */
class __TwigTemplate_83cdd4399880f4dd44a0927efec4e991af2baa4357f4051ea44594ef08e03961 extends Twig_Template
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

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Perfil de docente ";
    }

    // line 4
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
<p style=\"text-align: center ; color: #0035C7; -webkit-animation-play-state: \"><strong>BIENVENID@ AL PERFIL DE DOCENTE</strong></p>

";
    }

    // line 13
    public function block_aside($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <p align=\"center\">Materia actual</p>
   <p style=\"text-align: center ; color: #090 \"><strong>";
        // line 16
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "curso"), "nombre")), "html", null, true);
        echo "&nbsp;&nbsp;";
        echo twig_escape_filter($this->env, twig_upper_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["nivel"]) ? $context["nivel"] : $this->getContext($context, "nivel")), "paralelo"), "nombre")), "html", null, true);
        echo "&nbsp;:&nbsp;";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["materia"]) ? $context["materia"] : $this->getContext($context, "materia")), "nombre"), "html", null, true);
        echo "</strong></p>
   <strong><p align=\"left\">Curso / Materia</p></strong>
    <div id=\"relacionadas\">
        <ul>
    ";
        // line 20
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["materiasdoc"]) ? $context["materiasdoc"] : $this->getContext($context, "materiasdoc")));
        foreach ($context['_seq'] as $context["_key"] => $context["matdoc"]) {
            // line 21
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
        // line 23
        echo "
            </ul>
        </div>

    <a title=\"Cierra la sesión actual\" href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
";
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:portada_docente2.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 72,  248 => 86,  233 => 82,  218 => 74,  174 => 60,  222 => 85,  212 => 82,  197 => 74,  180 => 62,  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 70,  228 => 87,  216 => 67,  192 => 57,  113 => 38,  137 => 34,  70 => 17,  185 => 50,  172 => 71,  190 => 80,  184 => 72,  181 => 77,  175 => 75,  165 => 67,  153 => 46,  150 => 47,  127 => 41,  124 => 32,  114 => 35,  76 => 19,  236 => 113,  226 => 66,  223 => 81,  205 => 72,  202 => 69,  191 => 67,  155 => 56,  84 => 21,  97 => 29,  81 => 20,  34 => 4,  213 => 64,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 44,  161 => 42,  146 => 53,  134 => 41,  104 => 30,  100 => 26,  65 => 17,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 59,  194 => 63,  188 => 49,  160 => 57,  152 => 42,  148 => 41,  126 => 39,  118 => 31,  110 => 37,  90 => 23,  77 => 19,  58 => 13,  53 => 11,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 78,  177 => 65,  169 => 51,  140 => 39,  132 => 50,  128 => 44,  107 => 27,  61 => 14,  273 => 96,  269 => 94,  254 => 92,  243 => 85,  240 => 84,  238 => 85,  235 => 74,  230 => 81,  227 => 81,  224 => 78,  221 => 80,  219 => 84,  217 => 79,  208 => 61,  204 => 72,  179 => 50,  159 => 61,  143 => 52,  135 => 47,  119 => 39,  102 => 29,  71 => 16,  67 => 16,  63 => 15,  59 => 15,  38 => 6,  94 => 22,  89 => 23,  85 => 22,  75 => 29,  68 => 17,  56 => 12,  87 => 30,  21 => 2,  26 => 6,  93 => 36,  88 => 34,  78 => 20,  46 => 7,  27 => 4,  44 => 8,  31 => 3,  28 => 1,  201 => 71,  196 => 90,  183 => 62,  171 => 59,  166 => 56,  163 => 43,  158 => 62,  156 => 51,  151 => 40,  142 => 38,  138 => 51,  136 => 36,  121 => 41,  117 => 36,  105 => 37,  91 => 31,  62 => 15,  49 => 8,  24 => 1,  25 => 4,  19 => 1,  79 => 30,  72 => 17,  69 => 19,  47 => 9,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 48,  145 => 57,  139 => 40,  131 => 42,  123 => 40,  120 => 43,  115 => 29,  111 => 28,  108 => 35,  101 => 27,  98 => 27,  96 => 35,  83 => 26,  74 => 18,  66 => 15,  55 => 12,  52 => 11,  50 => 10,  43 => 6,  41 => 12,  35 => 9,  32 => 4,  29 => 1,  209 => 63,  203 => 78,  199 => 81,  193 => 77,  189 => 64,  187 => 66,  182 => 49,  176 => 72,  173 => 52,  168 => 64,  164 => 52,  162 => 54,  154 => 67,  149 => 55,  147 => 43,  144 => 40,  141 => 52,  133 => 35,  130 => 40,  125 => 31,  122 => 38,  116 => 37,  112 => 34,  109 => 32,  106 => 35,  103 => 26,  99 => 25,  95 => 23,  92 => 28,  86 => 22,  82 => 21,  80 => 20,  73 => 19,  64 => 18,  60 => 13,  57 => 12,  54 => 11,  51 => 9,  48 => 9,  45 => 8,  42 => 9,  39 => 6,  36 => 7,  33 => 4,  30 => 5,);
    }
}
