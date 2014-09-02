<?php

/* academicoBundle:Default:examengrado_listamaterias.html.twig */
class __TwigTemplate_57632f4d7d2122d5de5529c241ca86fc9c01b2d24ea456e178231cb1637709ed extends Twig_Template
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
        echo "<section id=\"menu_secre\">
    ";
        // line 7
        $this->env->loadTemplate("academicoBundle:Default:menu_inspector.html.twig")->display($context);
        // line 8
        echo "</section>
<p style=\"text-align: center ; color: #0035C7 \"><strong>INGRESO NOTAS DE EXAMENES DE GRADO</strong></p>
<p><strong>Detalles:</strong></p>
<ul>
    <li style=\"color: #0066ff\">Para proceder al ingreso de las notas de examenes de grado por favor seleccione una materia</li>
</ul>
";
    }

    // line 15
    public function block_aside($context, array $blocks = array())
    {
        echo "    
    <p style=\"text-align: center\">Curso actual:</p>
    <p style=\"text-align: left; color: #090\"><strong>";
        // line 17
        echo twig_escape_filter($this->env, (isset($context["curso"]) ? $context["curso"] : $this->getContext($context, "curso")), "html", null, true);
        echo "</strong></p>
    <strong><p align=\"center\">Materias:</p></strong>
    <div id=\"relacionadas\">
        <ul>
    ";
        // line 21
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listamaterias"]) ? $context["listamaterias"] : $this->getContext($context, "listamaterias")));
        foreach ($context['_seq'] as $context["_key"] => $context["mat"]) {
            // line 22
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
        // line 24
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
        return "academicoBundle:Default:examengrado_listamaterias.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  153 => 61,  150 => 60,  127 => 46,  124 => 45,  114 => 34,  76 => 26,  236 => 73,  226 => 67,  223 => 66,  205 => 60,  202 => 59,  191 => 51,  155 => 43,  84 => 21,  97 => 34,  81 => 30,  34 => 6,  213 => 62,  206 => 62,  195 => 68,  186 => 58,  178 => 52,  170 => 51,  167 => 50,  161 => 48,  146 => 41,  134 => 42,  104 => 40,  100 => 26,  65 => 14,  300 => 124,  293 => 121,  290 => 120,  256 => 89,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 72,  198 => 65,  194 => 63,  188 => 59,  160 => 47,  152 => 43,  148 => 43,  126 => 33,  118 => 31,  110 => 31,  90 => 24,  77 => 17,  58 => 13,  53 => 12,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 112,  365 => 111,  362 => 110,  360 => 109,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 123,  294 => 90,  285 => 89,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 70,  214 => 69,  177 => 65,  169 => 51,  140 => 57,  132 => 51,  128 => 49,  107 => 36,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 133,  240 => 86,  238 => 85,  235 => 74,  230 => 82,  227 => 81,  224 => 71,  221 => 77,  219 => 76,  217 => 63,  208 => 61,  204 => 72,  179 => 69,  159 => 44,  143 => 58,  135 => 53,  119 => 36,  102 => 29,  71 => 17,  67 => 17,  63 => 22,  59 => 14,  38 => 6,  94 => 27,  89 => 24,  85 => 21,  75 => 18,  68 => 15,  56 => 9,  87 => 30,  21 => 2,  26 => 6,  93 => 33,  88 => 32,  78 => 22,  46 => 6,  27 => 4,  44 => 10,  31 => 3,  28 => 3,  201 => 58,  196 => 90,  183 => 57,  171 => 61,  166 => 50,  163 => 45,  158 => 62,  156 => 45,  151 => 63,  142 => 59,  138 => 36,  136 => 39,  121 => 46,  117 => 44,  105 => 40,  91 => 22,  62 => 14,  49 => 7,  24 => 1,  25 => 3,  19 => 1,  79 => 20,  72 => 24,  69 => 23,  47 => 11,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 50,  145 => 41,  139 => 40,  131 => 52,  123 => 37,  120 => 43,  115 => 43,  111 => 33,  108 => 33,  101 => 32,  98 => 33,  96 => 24,  83 => 25,  74 => 21,  66 => 16,  55 => 12,  52 => 8,  50 => 12,  43 => 5,  41 => 8,  35 => 4,  32 => 3,  29 => 3,  209 => 82,  203 => 69,  199 => 67,  193 => 62,  189 => 71,  187 => 49,  182 => 66,  176 => 64,  173 => 52,  168 => 72,  164 => 59,  162 => 48,  154 => 49,  149 => 42,  147 => 44,  144 => 42,  141 => 48,  133 => 50,  130 => 41,  125 => 44,  122 => 32,  116 => 35,  112 => 34,  109 => 41,  106 => 30,  103 => 32,  99 => 38,  95 => 37,  92 => 36,  86 => 31,  82 => 29,  80 => 19,  73 => 16,  64 => 16,  60 => 10,  57 => 12,  54 => 10,  51 => 8,  48 => 6,  45 => 5,  42 => 9,  39 => 4,  36 => 7,  33 => 3,  30 => 5,);
    }
}
