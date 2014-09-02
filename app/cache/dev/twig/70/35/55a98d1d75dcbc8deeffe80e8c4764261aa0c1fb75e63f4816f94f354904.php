<?php

/* academicoBundle:Default:requisito_listatodos.html.twig */
class __TwigTemplate_703555a98d1d75dcbc8deeffe80e8c4764261aa0c1fb75e63f4816f94f354904 extends Twig_Template
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

    // line 4
    public function block_id($context, array $blocks = array())
    {
        echo "portada";
    }

    // line 6
    public function block_title($context, array $blocks = array())
    {
        echo "Lista de requisitos";
    }

    // line 8
    public function block_article($context, array $blocks = array())
    {
        // line 9
        echo "<section id=\"menu_admin\">
    ";
        // line 10
        $this->env->loadTemplate("academicoBundle:Default:menu_secretaria.html.twig")->display($context);
        // line 11
        echo "</section>
<p style=\"color: #0035C7; text-align: center\"><strong>LISTA DE REQUISITOS</strong></p>
<div id=\"dt_example\">
    <div id=\"demo\">
            <table class=\"display\" id=\"example\" >
                    <thead>
                        <tr>
                            <th colspan=\"3\">PREVIAMENTE REGISTRADOS</th>                                                 
                        <tr>
                            <th>Nombre</th>            
                            <th>Estado</th>
                        </tr>
                        </thead>        
                     <tbody>
                    ";
        // line 25
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lista"]) ? $context["lista"] : $this->getContext($context, "lista")));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            // line 26
            echo "                        ";
            $context["estado"] = $this->getAttribute((isset($context["m"]) ? $context["m"] : $this->getContext($context, "m")), "estado");
            // line 27
            echo "                        ";
            if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 1)) {
                // line 28
                echo "                            ";
                $context["esta"] = "Activo";
                echo "                                                    
                        ";
            }
            // line 30
            echo "                        ";
            if (((isset($context["estado"]) ? $context["estado"] : $this->getContext($context, "estado")) == 0)) {
                // line 31
                echo "                            ";
                $context["esta"] = "Inactivo";
                echo "                                                    
                        ";
            }
            // line 33
            echo "                        <tr >
                            <td>";
            // line 34
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["m"]) ? $context["m"] : $this->getContext($context, "m")), "descripcion"), "html", null, true);
            echo "</td> <td style=\"width: 20px\">";
            echo twig_escape_filter($this->env, (isset($context["esta"]) ? $context["esta"] : $this->getContext($context, "esta")), "html", null, true);
            echo "</td> 
                            
                        <tr>
                    <tbody>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 39
        echo "                </table>
        </div>
    </div>
<br><br>
";
    }

    // line 45
    public function block_aside($context, array $blocks = array())
    {
        // line 46
        echo "    ";
        $this->displayParentBlock("aside", $context, $blocks);
        echo "
    <a title=\"Cierra la sesión actual\" href=\"";
        // line 47
        echo $this->env->getExtension('routing')->getPath("usuario_logout");
        echo "\"><strong>Cerrar sesión</strong></a>
";
    }

    // line 49
    public function block_javascripts($context, array $blocks = array())
    {
        // line 50
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "
    
";
    }

    // line 53
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 54
        echo "      ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "                 
        ";
        // line 55
        $this->env->loadTemplate("academicoBundle:Default:tablecss.html.twig")->display($context);
    }

    public function getTemplateName()
    {
        return "academicoBundle:Default:requisito_listatodos.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 72,  248 => 86,  233 => 82,  218 => 74,  174 => 60,  222 => 85,  212 => 82,  197 => 74,  180 => 62,  23 => 3,  245 => 116,  525 => 165,  520 => 162,  507 => 160,  503 => 159,  495 => 155,  492 => 154,  487 => 152,  477 => 145,  473 => 143,  452 => 138,  448 => 137,  436 => 134,  429 => 133,  420 => 130,  414 => 128,  411 => 127,  403 => 125,  400 => 124,  383 => 123,  376 => 119,  372 => 118,  364 => 116,  356 => 114,  353 => 113,  345 => 106,  343 => 105,  333 => 97,  329 => 95,  308 => 90,  302 => 89,  279 => 83,  276 => 82,  270 => 80,  267 => 79,  265 => 78,  259 => 77,  239 => 114,  232 => 70,  228 => 87,  216 => 67,  192 => 57,  113 => 38,  137 => 34,  70 => 20,  185 => 50,  172 => 71,  190 => 80,  184 => 72,  181 => 77,  175 => 75,  165 => 54,  153 => 46,  150 => 46,  127 => 41,  124 => 33,  114 => 31,  76 => 27,  236 => 113,  226 => 66,  223 => 81,  205 => 72,  202 => 69,  191 => 67,  155 => 61,  84 => 21,  97 => 34,  81 => 26,  34 => 4,  213 => 64,  206 => 52,  195 => 56,  186 => 58,  178 => 73,  170 => 55,  167 => 44,  161 => 42,  146 => 54,  134 => 41,  104 => 30,  100 => 26,  65 => 19,  300 => 124,  293 => 121,  290 => 86,  256 => 76,  253 => 88,  242 => 81,  225 => 78,  215 => 73,  211 => 66,  198 => 59,  194 => 63,  188 => 49,  160 => 62,  152 => 60,  148 => 41,  126 => 47,  118 => 45,  110 => 39,  90 => 32,  77 => 23,  58 => 12,  53 => 11,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 136,  440 => 135,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 131,  413 => 134,  409 => 126,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 116,  368 => 117,  365 => 111,  362 => 110,  360 => 115,  355 => 106,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 97,  305 => 95,  298 => 88,  294 => 87,  285 => 85,  283 => 88,  278 => 86,  268 => 85,  264 => 84,  258 => 81,  252 => 80,  247 => 84,  241 => 77,  229 => 79,  220 => 68,  214 => 78,  177 => 65,  169 => 51,  140 => 56,  132 => 49,  128 => 49,  107 => 42,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 85,  240 => 84,  238 => 85,  235 => 74,  230 => 81,  227 => 81,  224 => 78,  221 => 80,  219 => 84,  217 => 79,  208 => 61,  204 => 72,  179 => 50,  159 => 61,  143 => 53,  135 => 50,  119 => 44,  102 => 28,  71 => 16,  67 => 16,  63 => 15,  59 => 15,  38 => 6,  94 => 33,  89 => 23,  85 => 30,  75 => 23,  68 => 20,  56 => 12,  87 => 32,  21 => 2,  26 => 6,  93 => 33,  88 => 31,  78 => 20,  46 => 7,  27 => 4,  44 => 8,  31 => 3,  28 => 1,  201 => 71,  196 => 90,  183 => 62,  171 => 59,  166 => 56,  163 => 43,  158 => 62,  156 => 51,  151 => 55,  142 => 38,  138 => 56,  136 => 38,  121 => 46,  117 => 36,  105 => 31,  91 => 31,  62 => 19,  49 => 8,  24 => 1,  25 => 4,  19 => 1,  79 => 28,  72 => 21,  69 => 25,  47 => 9,  40 => 6,  37 => 4,  22 => 2,  246 => 134,  157 => 48,  145 => 57,  139 => 40,  131 => 54,  123 => 40,  120 => 43,  115 => 29,  111 => 33,  108 => 35,  101 => 27,  98 => 27,  96 => 28,  83 => 24,  74 => 21,  66 => 20,  55 => 12,  52 => 11,  50 => 10,  43 => 6,  41 => 12,  35 => 9,  32 => 4,  29 => 1,  209 => 63,  203 => 78,  199 => 81,  193 => 77,  189 => 64,  187 => 66,  182 => 49,  176 => 72,  173 => 52,  168 => 64,  164 => 52,  162 => 53,  154 => 60,  149 => 59,  147 => 43,  144 => 43,  141 => 57,  133 => 35,  130 => 40,  125 => 31,  122 => 45,  116 => 37,  112 => 43,  109 => 32,  106 => 29,  103 => 39,  99 => 25,  95 => 23,  92 => 27,  86 => 22,  82 => 21,  80 => 20,  73 => 26,  64 => 18,  60 => 17,  57 => 12,  54 => 11,  51 => 10,  48 => 9,  45 => 8,  42 => 9,  39 => 6,  36 => 7,  33 => 4,  30 => 5,);
    }
}
